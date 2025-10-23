<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'PublicController@landing')->name('landing');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Public Routes
Route::get('/buku-tamu', 'PublicController@bukuTamu')->name('public.buku-tamu');
Route::post('/buku-tamu', 'PublicController@storeBukuTamu')->name('public.buku-tamu.store');
Route::get('/survei-kepuasan', 'PublicController@surveiKepuasan')->name('public.survei-kepuasan');
Route::post('/survei-kepuasan', 'PublicController@storeSurveiKepuasan')->name('public.survei-kepuasan.store');

// Feedback Management Routes
Route::resource('feedback', 'FeedbackController')->names([
    'index' => 'feedback.index',
    'create' => 'feedback.create',
    'store' => 'feedback.store',
    'show' => 'feedback.show',
    'edit' => 'feedback.edit',
    'update' => 'feedback.update',
    'destroy' => 'feedback.destroy'
]);

// Support Management Routes (Buku Tamu)
Route::resource('supports', 'SupportController')->names([
    'index' => 'supports.index',
    'create' => 'supports.create',
    'store' => 'supports.store',
    'show' => 'supports.show',
    'edit' => 'supports.edit',
    'update' => 'supports.update',
    'destroy' => 'supports.destroy'
]);
