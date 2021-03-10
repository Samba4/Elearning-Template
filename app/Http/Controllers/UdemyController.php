<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Clients\UdemyClient;
use Illuminate\Support\Facades\Auth;

class UdemyController extends Controller
{
    public function __construct(UdemyClient $udemyClient)
    {
        $this->udemyClient = $udemyClient;
    }

    public function udemyshow($id)
    {
        $cours = $this->udemyClient->getUdemyCourseDetail($id);
        return view('courses.udemy.show', [
            'cours' => $cours,
        ]);
    }
}
