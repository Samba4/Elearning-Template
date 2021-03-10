<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Category;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Clients\UdemyClient;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct(UdemyClient $udemyClient)
    {
        $this->udemyClient = $udemyClient;
    }

    public function home(User $user)
    {
        $udemy = $this->udemyClient->getUdemyCourses();
        $instructors = $user->instructors();
        return view('main.home', [
            'instructors' => $instructors,
            'udemy'  => $udemy['results'],
        ]);
    }
}
