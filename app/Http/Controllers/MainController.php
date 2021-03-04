<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $suggestions = Course::all()->where('is_published', true)->random()->limit(4)->get();
        return view('main.home', compact('suggestions'));
    }
}
