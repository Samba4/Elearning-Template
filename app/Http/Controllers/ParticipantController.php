<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $courseUser = CourseUser::where('user_id', Auth::user()->id)->get();
        return view('participant.courses', [
            'courseUser' => $courseUser,
        ]);
    }

    public function show($slug, CourseUser $courseUser)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $coursePaye = $courseUser->courspaye($course);
        if ($coursePaye) {
            return view('participant.course', [
                'course' => $course,
            ]);
        } else {
            return redirect()->route('courses')->with('danger', 'Vous ne pouvez pas accéder à cette ressource sans la payer.');
        }
    }

    public function section($slug, $section, CourseUser $courseUser)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $section = Section::where('slug', $section)->firstOrFail();
        $coursePaye = $courseUser->courspaye($course);
        if ($coursePaye) {
            return view('participant.section', [
                'course' => $course,
                'section' => $section,
            ]);
        } else {
            return redirect()->route('main.home')->with('danger', 'Vous ne pouvez pas accéder à cette ressource sans la payer.');
        }
    }
}
