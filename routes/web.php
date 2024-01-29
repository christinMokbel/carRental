<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[Controller::class,'index'])->name('index');
Route::get('about',[Controller::class,'about'])->name('about');
Route::get('blog',[Controller::class,'blog'])->name('blog');
Route::get('contact',[Controller::class,'contact'])->name('contact');
Route::get('listing',[Controller::class,'listing'])->name('listing');
Route::get('testimonial',[Controller::class,'testimonial'])->name('testimonial');
