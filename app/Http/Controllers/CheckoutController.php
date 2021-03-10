<?php

namespace App\Http\Controllers;

use App\Payment;
use Stripe\Stripe;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Managers\PaymentManager;

class CheckoutController extends Controller
{
    public function __construct(PaymentManager $paymentManager)
    {
        $this->paymentManager = $paymentManager;
    }
    public function index()
    {
        return view('checkout.payment');
    }

    public function charge(Request $request)
    {
        $test = \Stripe\Stripe::setApiKey('sk_test_51IQj11Du6YZb9L1tPPlObEvTYhp09QGAerYLt2ik2Yy8BiTkEltFilkzYT5h0XfpGzAOMHJCPMssplZtSuMHI8Th00BHXsOrJx');

        $cart = \Cart::session(Auth::user()->id);

        $tax = $cart->getTotal() * 0.20;
        $roundedTax = round($tax, 2);

        $commission = $cart->getTotal() * 0.15;
        $roundedCom = round($commission, 2);

        $total = $cart->getTotal();
        $realTotal = $cart->getTotal();


        try {
            $charge = \Stripe\Charge::create([
                'amount' => $cart->getTotal() * 100,
                'currency' => 'EUR',
                'description' => 'Paiement via Kahier',
                'source' => $request->input('stripeToken'),
                'receipt_email' => Auth::user()->email,
            ]);

            foreach (\Cart::getContent() as $item) {
                $instructor_part = $this->paymentManager->getInstructorPart(round($cart->getTotal()));
                $kahier_part = $this->paymentManager->getKahierPart(round($cart->getTotal()));
                $tva = $this->paymentManager->getTVA(round($cart->getTotal()));

                Payment::create([
                    'course_id' => $item->model->id,
                    'amount' => $cart->getTotal(),
                    'instructor_part' => $instructor_part,
                    'kahier_part' => $kahier_part,
                    'tva' => $tva,
                    'email' => Auth::user()->email,
                ]);

                CourseUser::create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $item->model->id,
                ]);
            }
            return redirect()->route('payment.succes')->with('success', 'Paiement accepté');
        } catch (\Stripe\Exception\CardErrorException $error) {
            throw $error;
        }
    }

    public function succes()
    {
        if (!session()->has('success')) {
            return redirect()->route('main.home');
        }
        $order = \Cart::session(Auth::user()->id)->getContent();
        foreach (\Cart::session(Auth::user()->id)->getContent() as $cartItem) {
            \Cart::remove($cartItem->id);
        }
        return view('checkout.success', [
            'order' => $order,
        ]);
    }
}
