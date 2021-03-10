<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Category;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as InterventionImage;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('is_published', true)->get();
        $categories = Category::all();
        return view('courses.index', [
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $recommandations = Course::where('is_published', true)->where('category_id', $course->category_id)->where('id', '!=', $course->id)->limit(3)->get();

        if (Auth::user() == null) {
            return view('courses.show', [
                'course' => $course,
                'recommandations' => $recommandations,
            ]);
        }
        if (Auth::user()->paidCourses->where('title', $course->title)->count() != 0) {
            $courseUser = CourseUser::where('user_id', Auth::user()->id)->get();
            return view('participant.courses', [
                'courseUser' => $courseUser,
            ]);
        } elseif (Auth::user()->courses->where('title', $course->title)->count() != 0) {
            return view('instructor.index');
        } else { /// si utilisateur connecté sans être proprietaire et client du cours
            return view('courses.show', [
                'course' => $course,
                'recommandations' => $recommandations,
            ]);
        }
    }

    public function filter($id)
    {
        $categorie = Category::find($id);
        $courses = Course::where('category_id', $categorie->id)->where('is_published',  true)->get();
        return view('courses.index', [
            'courses' => $courses,
            'categorie' => $categorie,
        ]);
    }
}
