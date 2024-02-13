@extends('front.layouts.pages')
@section('title1')
Listings
@endsection
@section('title2')
listings
@endsection
@section('content')
@include('front.includes.carlisting')
            
{!! $cars->links() !!} 
                
@include('front.includes.testimonial')
@include('front.includes.rentcarnow')

@endsection