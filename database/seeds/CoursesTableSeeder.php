<?php

use App\User;
use App\Course;
use App\Category;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $slugify = new Slugify();
        $course = new Course();
        $course->title = 'Les bases de Laravel 7';
        $course->subtitle = 'Créer une plateforme d\'enseignement avec Laravel 7';
        $course->slug = $slugify->slugify($course->title);
        $course->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non delectus possimus porro unde saepe dolorum inventore libero, repudiandae nesciunt debitis nulla numquam ad qui. Vel quam ratione maxime neque quibusdam!';
        $course->price = 19.99;
        $course->image = '.';
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->user_id = User::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = 'Les bases de Symphony 4';
        $course->subtitle = 'Apprendre à crée un site internet avec Symphony 4';
        $course->slug = $slugify->slugify($course->title);
        $course->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non delectus possimus porro unde saepe dolorum inventore libero, repudiandae nesciunt debitis nulla numquam ad qui. Vel quam ratione maxime neque quibusdam!';
        $course->price = 19.99;
        $course->image = '.';
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->user_id = User::all()->random(1)->first()->id;
        $course->save();

        $course = new Course();
        $course->title = 'Construire un site e-commerce avec Wordpress';
        $course->subtitle = 'Construire un site e-commerce complet avec un célèbre CMS';
        $course->slug = $slugify->slugify($course->title);
        $course->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non delectus possimus porro unde saepe dolorum inventore libero, repudiandae nesciunt debitis nulla numquam ad qui. Vel quam ratione maxime neque quibusdam!';
        $course->price = 39.99;
        $course->image = '.';
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->user_id = User::all()->random(1)->first()->id;
    }
}
