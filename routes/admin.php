<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testimonialcontroller;
use App\Http\Controllers\Categorycontroller;



Route::prefix('admin')->group( function () {

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
});