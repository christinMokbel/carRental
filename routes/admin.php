<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testimonialcontroller;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Carcontroller;
use App\Http\Controllers\Contactcontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Usercontroller;





Route::middleware('verified')->prefix('admin')->group( function () {

Route::prefix('testimonial')->group( function () {
    Route::get('createtestimonial',[Testimonialcontroller::class,'create'])->name ('createtestimonial');
    Route::post('storetestimonial',[Testimonialcontroller::class,'store'])->name ('storetestimonial');
    Route::get('testimonials',[Testimonialcontroller::class,'index'])->name('testimonials');
    Route::get('edittestimonial/{id}',[Testimonialcontroller::class,'edit'])->name('edittestimonial');
    Route::put('update/{id}',[Testimonialcontroller::class,'update'])->name('updatetestimonial');
    Route::get('deletetestimonial/{id}',[Testimonialcontroller::class,'destroy'])->name('deletetestimonial');
});

Route::prefix('category')->group( function () {
    Route::get('createcategory',[Categorycontroller::class,'create'])->name ('createcategory');
    Route::post('storecategory',[Categorycontroller::class,'store'])->name ('storecategory');
    Route::get('categories',[Categorycontroller::class,'index'])->name('categories');
    Route::get('editcategory/{id}',[Categorycontroller::class,'edit'])->name('editcategory');
    Route::put('updatecategory/{id}',[Categorycontroller::class,'update'])->name('updatecategory');
    Route::get('deletecategory/{id}',[Categorycontroller::class,'destroy'])->name('deletecategory');
});

Route::prefix('car')->group( function () {
    Route::get('createcar',[Carcontroller::class,'create'])->name ('createcar');
    Route::post('storecar',[Carcontroller::class,'store'])->name ('storecar');
    Route::get('cars',[Carcontroller::class,'index'])->name('cars');
    Route::get('editcar/{id}',[Carcontroller::class,'edit'])->name('editcar');
    Route::put('updatecar/{id}',[Carcontroller::class,'update'])->name('updatecar');
    Route::get('deletecar/{id}',[Carcontroller::class,'destroy'])->name('deletecar');
});

Route::prefix('contact')->group( function () {
    Route::get('contacts',[Contactcontroller::class,'index'])->name('contacts');
    Route::get('showcontact/{id}',[Contactcontroller::class,'show'])->name('showcontact');
    Route::get('deletecontact/{id}',[Contactcontroller::class,'destroy'])->name('deletecontact');
});


Route::prefix('user')->group( function () {
    Route::get('createuser',[Usercontroller::class,'create'])->name ('createuser');
    Route::post('storeuser',[Usercontroller::class,'store'])->name ('storeuser');
    Route::get('users',[Usercontroller::class,'index'])->name('users');
    Route::get('edituser/{id}',[Usercontroller::class,'edit'])->name('edituser');
    Route::put('updateuser/{id}',[Usercontroller::class,'update'])->name('updateuser');
    Route::get('deleteuser/{id}',[Usercontroller::class,'destroy'])->name('deleteuser');
});
});
Auth::routes(['verify'=>true]);
Route::post('storecontact',[Contactcontroller::class,'store'])->name('storecontact');
