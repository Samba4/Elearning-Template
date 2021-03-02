<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@home')->name('main.home');

/// Cours
Route::get('/nos-cours', 'CourseController@index')->name('courses');
Route::get('/cours/{slug}', 'CourseController@show')->name('course.show');

Auth::routes();
Route::get('/logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

/// Gestion des cours
Route::get('/formateur/cours', 'InstructorController@index')->name('instructor');
Route::get('/formateur/nouveau-cours', 'InstructorController@create')->name('instructor.create');
Route::post('/formateur/store', 'InstructorController@store')->name('instructor.store');
Route::get('/formateur/cours/{id}/edit', 'InstructorController@edit')->name('instructor.edit');
Route::put('/formateur/cours/{id}/update', 'InstructorController@update')->name('instructor.update');
Route::get('/formateur/cours/{id}/destroy', 'InstructorController@destroy')->name('instructor.destroy');

///Mise en ligne
Route::get('/formateur/cours/{id}/publish', 'InstructorController@publish')->name('instructor.publish');


/// Tarification
Route::get('/formateur/cours/{id}/pricing', 'PricingController@pricing')->name('pricing');
Route::post('/formateur/cours/{id}/pricing/store', 'PricingController@store')->name('pricing.store');

/// Gestion des sections des cours
Route::get('/formateur/cours/{id}/section', 'CurriculumController@index')->name('section');
Route::get('/formateur/cours/{id}/section/create', 'CurriculumController@create')->name('section.create');
Route::post('/formateur/cours/{id}/section/store', 'CurriculumController@store')->name('section.store');
Route::get('/formateur/cours/{id}/section/{section}/edit', 'CurriculumController@edit')->name('section.edit');
Route::put('/formateur/cours/{id}/section/{section}/update', 'CurriculumController@update')->name('section.update');
Route::get('/formateur/cours/{id}/section/{section}/destroy', 'CurriculumController@destroy')->name('section.destroy');
