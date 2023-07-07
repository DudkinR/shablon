<?php

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
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/p/{id}/{page?}', [App\Http\Controllers\HomeController::class, 'showpost'])->name('showpost');

Route::get('setlocale/{locale}', function ($locale) {  Session::put('locale', $locale);   return redirect()->back(); })->name('lang');
Route::get('/imgshow/{filename}', [App\Http\Controllers\ImgController::class, 'show'])->name('imgshow');

Route::group(['middleware' => 'admin'], function () {
    // Ваши маршруты, доступные только для пользователей с ролью "admin"
    // post routs resource
    Route::resource('post', App\Http\Controllers\PostController::class);
    Route::resource('image', App\Http\Controllers\ImgController::class);
    // upload image
    Route::post('upload', [App\Http\Controllers\ImgController::class, 'upload'])->name('upload');


  });

Route::group(['middleware'=>'user'], function () {
    // Ваши маршруты, доступные только для пользователей с ролью "user"
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile.index');
});


