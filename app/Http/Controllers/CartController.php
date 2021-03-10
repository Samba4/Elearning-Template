<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\CourseUser;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('cart.index', compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $course = Course::find($id);
        if (Auth::user() == true) {
            if (Auth::user()->paidCourses->where('title', $course->title)->count() != 0 || Auth::user()->courses->where('title', $course->title)->count() != 0) {
                return redirect()->back()->with('danger', 'Vous êtes proprietaire ou déjà détendeur de ce cours');
            } else {
                $add = \Cart::session(Auth::user()->id)->add([
                    'id' => $course->id,
                    'name' => $course->title,
                    'price' => $course->price,
                    'quantity' => 1,
                    'associatedModel' => $course,
                ]);
                return redirect()->back()->with('success', 'Votre formation à bien été ajoutée à votre panier');
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::session(Auth::user()->id)->remove($id);
        return redirect()->route('panier')->with('success', 'Produit supprimé');
    }

    public function clear()
    {
        $cart = \Cart::session(Auth::user()->id);
        foreach ($cart->getContent() as $cartItem) {
            $cart->remove($cartItem->id);
        }
        return redirect()->route('panier')->with('success', 'Votre panis à bien été vidé');
    }
}
