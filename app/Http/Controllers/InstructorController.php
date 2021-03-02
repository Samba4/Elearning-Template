<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('instructor.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->input('title');
        $course->subtitle = $request->input('subtitle');
        $course->slug = Str::slug($request->input('title'));
        $course->description = $request->input('description');
        $course->category_id = $request->input('category');
        $course->user_id = Auth::user()->id;

        $image = $request->file('image');
        $imageFullName = $image->getClientOriginalName(); /// adresse entiere de l'image
        $imageName = pathInfo($imageFullName, PATHINFO_FILENAME); /// nom de l'image sans extension
        $extension = $image->getClientOriginalExtension(); /// type d'image
        $file = time() . '_' . $imageName . '.' . $extension;
        $image->storeAs('public/courses/' . Auth::user()->id, $file);

        $course->image = $file;
        $course->save();

        return redirect()->route('instructor')->with('success', 'Votre cours à été ajoutée avec succes');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::all();
        return view('instructor.edit', [
            'course' => $course,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $course->title = $request->input('title');
        $course->subtitle = $request->input('subtitle');
        $course->slug = Str::slug($request->input('title'));
        $course->description = $request->input('description');
        $course->category_id = $request->input('category');

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageFullName = $image->getClientOriginalName(); /// adresse entiere de l'image
            $imageName = pathInfo($imageFullName, PATHINFO_FILENAME); /// nom de l'image sans extension
            $extension = $image->getClientOriginalExtension(); /// type d'image
            $file = time() . '_' . $imageName . '.' . $extension;
            $image->storeAs('public/courses/' . Auth::user()->id, $file);

            $course->image = $file;
        }
        $course->save();
        return redirect()->route('instructor')->with('success', 'Vos modifications ont été apportées avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('instructor')->with('success', 'Votre cours à bien été supprimé de notre base de données.');
    }

    public function publish($id)
    {
        $course = Course::find($id);
        if ($course->price && count($course->sections) > 0) {
            $course->is_published = true;
            $course->save();
            return redirect()->back()->with('success', 'Votre cours est maintenant en ligne.');
        }
        return redirect()->back()->with('danger', 'Pour pouvoir être publié, votre cours doit contenir au minimum une section vidéo et un tarif de défini.');
    }
}
