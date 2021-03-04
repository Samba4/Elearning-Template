<?php

namespace App\Http\Controllers;

use App\Course;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pricing($id)
    {
        $course = Course::find($id);
        return view('instructor.pricing', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $course = Course::find($id);
        $course->price = $request->input('price');

        $test = \Cart::session(Auth::user()->id)->update($course->id, [
            'price' => $course->price,
        ]);
        $course->save();

        return redirect()->route('instructor.edit', $course->id)->with('success', 'La tarification de votre cours à bien été ajustée.');
    }
}
