<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testimonialcontroller;


Route::prefix('admin')->group( function () {

Route::prefix('testimonial')->group( function () {
    Route::get('createtestimonial',[Testimonialcontroller::class,'create'])->name ('createtestimonial');
    Route::post('storetestimonial',[Testimonialcontroller::class,'store'])->name ('storetestimonial');
    Route::get('testimonials',[Testimonialcontroller::class,'index'])->name('testimonials');
    Route::get('edittestimonial/{id}',[Testimonialcontroller::class,'edit'])->name('edittestimonial');
    Route::put('update/{id}',[Testimonialcontroller::class,'update'])->name('updatetestimonial');
    Route::get('deletetestimonial/{id}',[Testimonialcontroller::class,'destroy'])->name('deletetestimonial');
});
});