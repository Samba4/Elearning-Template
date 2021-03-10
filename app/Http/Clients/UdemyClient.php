<?php

namespace App\Http\Clients;

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Http;

class UdemyClient
{
    public function getUdemyCourses()
    {
        $client = Http::withBasicAuth(env('UDEMY_CLIENT_ID'), env('UDEMY_CLIENT_SECRET'));
        $response = $client->get('https://www.udemy.com/api-2.0/courses/', [
            'ratings' => 5,
            'category' => 'Development',
            'language' => 'fr',
            'page_size' => 6,
        ]);

        return json_decode($response, true);
    }

    public function getUdemyCourseDetail($id)
    {
        $client = Http::withBasicAuth(env('UDEMY_CLIENT_ID'), env('UDEMY_CLIENT_SECRET'));
        $response = $client->get('https://www.udemy.com/api-2.0/courses/' . $id . '');

        return json_decode($response, true);
    }
}
