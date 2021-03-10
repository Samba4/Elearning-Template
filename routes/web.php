<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

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
Route::get('/test', 'MainController@test')->name('main.test');

Route::get('profil/{id}', 'ProfilController@index')->name('profil');
Route::get('profil/{id}/create', 'ProfilController@create')->name('profil.create');
Route::post('profil/{id}/store', 'ProfilController@store')->name('profil.store');
Route::get('profil/{id}/edit', 'ProfilController@edit')->name('profil.edit');
Route::put('profil/{id}/update', 'ProfilController@update')->name('profil.update');
Route::get('profil/{id}/destroy', 'ProfilController@destroy')->name('profil.destroy');

/// Cours
Route::get('/nos-cours', 'CourseController@index')->name('courses');
Route::get('/cours/{slug}', 'CourseController@show')->name('course.show');
Route::get('/cours/categorie/{id}', 'CourseController@filter')->name('course.filter');

/// Cours d'Udemy
Route::get('cours/udemy/{slug}', 'UdemyController@udemyshow')->name('udemy.show');

Auth::routes();
Route::get('/logout', 'LogoutController@logout')->name('logout');


/// Gestion des cours
Route::get('/formateur/cours', 'InstructorController@index')->name('instructor');
Route::get('/formateur/nouveau-cours', 'InstructorController@create')->name('instructor.create');
Route::post('/formateur/store', 'InstructorController@store')->name('instructor.store');
Route::get('/formateur/cours/{id}/edit', 'InstructorController@edit')->name('instructor.edit');
Route::put('/formateur/cours/{id}/update', 'InstructorController@update')->name('instructor.update');
Route::get('/formateur/cours/{id}/destroy', 'InstructorController@destroy')->name('instructor.destroy');
Route::get('/formateur/cours/{id}/participants', 'InstructorController@participants')->name('instructor.participants');
///Mise en ligne
Route::get('/formateur/cours/{id}/publish', 'InstructorController@publish')->name('instructor.publish');

/// Vue Participant
Route::get('mes-cours', 'ParticipantController@index')->name('participants');
Route::get('mon-cours/{slug}', 'ParticipantController@show')->name('participant.show');
Route::get('mon-cours/{slug}/{section}', 'ParticipantController@section')->name('participant.section');

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

/// Panier
Route::get('/mon-panier', 'CartController@index')->name('panier');
Route::get('/mon-panier/{id}/store', 'CartController@store')->name('panier.store');
Route::get('mon-panier/{id}/destroy', 'CartController@destroy')->name('panier.destroy');
Route::get('mon-panier/clear', 'CartController@clear')->name('panier.clear');

/// Liste des souhaits pour le panier
Route::get('/souhaits/{id}/store', 'WhishListController@store')->name('souhaits');
Route::get('souhaits/{id}/destroy', 'WhishListController@destroy')->name('souhaits.destroy');
Route::get('souhaits/{id}/toCart', 'WhishListController@toCart')->name('souhaits.toCart');
Route::get('souhaits/{id}/toWishList', 'WhishListController@toWishList')->name('souhaits.toWishList');


/// Gestion des paiements
Route::get('/checkout', 'CheckoutController@index')->name('payment');
Route::post('/checkout/charge', 'CheckoutController@charge')->name('payment.charge');
Route::get('/checkout/succes', 'CheckoutController@succes')->name('payment.succes');
