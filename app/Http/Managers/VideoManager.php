<?php

namespace App\Http\Managers;

use Illuminate\Support\Facades\Auth;

class VideoManager
{

    /// Prépare le chemin et stock la vidéo
    public function videoStorage($video)
    {
        $fileFullName = $video->getClientOriginalName();
        $fileName = pathinfo($fileFullName, PATHINFO_FILENAME);
        $extension = $video->getClientOriginalExtension();
        $file = time() . '_' . $fileName . '.' . $extension;
        $video->storeAs('public/courses_sections/' . Auth::user()->id, $file);

        return $file;
    }

    /// Prépare le temps de la vidéo
    public function getVideoDuration($video)
    {
        $getID3 = new \getID3();
        $pathVideo = 'storage/courses_sections/' . Auth::user()->id . '/' . $video;
        $fileAnalyse = $getID3->analyze($pathVideo);
        $playtime = $fileAnalyse['playtime_string'];

        return $playtime;
    }
}
