<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index(){
        return view('front.index');
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
        return view('front.listing');
    }
    public function testimonial(){
        return view('front.testimonial');
    }
}
