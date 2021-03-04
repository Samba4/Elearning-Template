<?php

namespace App\Http\Controllers;

use App\Course;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhishListController extends Controller
{
    public function store($id)
    {
        $course = Course::find($id);
        $souhaits = \Cart::session(Auth::user()->id . '_whislist');
        $souhaits->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course,
        ]);
        return redirect()->back()->with('success', 'Votre formation à bien été ajouté à votre liste de souhaits');
    }

    public function destroy($id)
    {

        \Cart::session(Auth::user()->id . '_whislist')->remove($id);
        return redirect()->route('panier')->with('success', 'Choix supprimé');
    }

    public function toCart($id)
    {
        $course = Course::find($id);
        \Cart::session(Auth::user()->id . '_whislist')->remove($id);
        $add = \Cart::session(Auth::user()->id)->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course,
        ]);
        return redirect()->route('panier')->with('success', 'Votre choix de formation à bien été déplacé au panier.');
    }

    public function toWishList($id)
    {
        $course = Course::find($id);
        \Cart::session(Auth::user()->id)->remove($id);
        $add = \Cart::session(Auth::user()->id . '_whislist')->add([
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'quantity' => 1,
            'associatedModel' => $course,
        ]);
        return redirect()->route('panier')->with('success', 'Votre formation à bien été déplacé dans votre liste de souhaits.');
    }
}
