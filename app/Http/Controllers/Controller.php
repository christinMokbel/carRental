<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Testimonial;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(){
        $cars= Car::where('active',1)->latest()->take(6)->get();
        $testimonials =Testimonial::where('published',1)->latest()->take(3)->get();

        return view('front.index',compact('testimonials', 'cars'));
    }
    public function showcar(string $id)
    {

        $categories=Category::get();
        $car=Car::findOrFail($id);
        return view('front.singlecar', compact('car','categories'));
    }

    public function about(){
        return view('front.about');
    }
    public function blog(){
        return view('front.blog');
    }
    public function contact(){
        return view('front.contact');
    }
    public function listing(){
        $cars=Car::where('active',1)->latest()->paginate(6);
        $testimonials =Testimonial::where('published',1)->latest()->take(3)->get();

        return view('front.listing', compact('cars','testimonials'));
    }
    public function testimonial(){
        $testimonials =Testimonial::where('published',1)->get();

        return view('front.testimonial',compact('testimonials'));
    }
}
