<?php

namespace App\Http\Controllers;

use getID3;
use App\Course;
use App\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Managers\VideoManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{

    public function __construct(VideoManager $videoManager)
    {
        $this->videoManager = $videoManager;
    }

    public function index($id)
    {
        $course = Course::find($id);
        return view('instructor.curriculum.index', compact('course'));
    }

    public function create($id)
    {
        $course = Course::find($id);
        return view('instructor.curriculum.create', compact('course'));
    }

    public function store(Request $request, $id)
    {
        $section = new Section();
        $course = Course::find($id);

        $section->name = $request->input('section_name');
        $section->slug = Str::slug($request->input('section_name'));
        $video = $this->videoManager->videoStorage($request->file('section_video'));

        $section->video = $video;
        $section->course_id = $id;

        $playtime = $this->videoManager->getVideoDuration($video);
        $section->playtime_seconds = $playtime;

        $section->save();

        return redirect()->route('section', $course->id)->with('success', 'Votre section à été ajoutée avec succès.');
    }

    public function edit($id, $sectionId)
    {
        $course = Course::find($id);
        $section = Section::find($sectionId);
        return view('instructor.curriculum.edit', [
            'course' => $course,
            'section' => $section,
        ]);
    }

    public function update(Request $request, $id, $sectionId)
    {
        $course = Course::find($id);
        $section = Section::find($sectionId);

        if ($request->input('section_name')) {
            // Update section name
            $section->name = $request->input('section_name');
            $section->slug = Str::slug($request->input('section_name'));
        }
        if ($request->file('section_video')) {
            // Update section video
            $video = $this->videoManager->videoStorage($request->file('section_video'));
            $section->video = $video;
            $section->playtime_seconds = $this->videoManager->getVideoDuration($video);
        }

        $section->save();
        return redirect()->route('section', $course->id)->with('success', 'Votre section à été modifiée avec succès.');
    }

    public function destroy($id, $sectionId)
    {
        $course = Course::find($id);
        $section = Section::find($sectionId);
        $fileToDelete = 'public/courses_sections/' . Auth::user()->id . '/' . $section->video;

        if (Storage::exists($fileToDelete)) {
            Storage::delete($fileToDelete);
        }

        $section->delete();

        return redirect()->route('section', $course->id)->with('success', 'Votre section à bien été supprimé.');
    }
}
