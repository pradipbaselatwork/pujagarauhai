@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\AboutUs;
use App\Banner;
$aboutUs = AboutUs::first();
$banner = Banner::first();
?>
<section class="breadCrumbNav-banner subpage-slider showcase">
    <figure> <img src="{{ asset($banner->image)}}" alt=""> </figure>
    <div class="breadCrumbNav breadCrumboverlay">
      <div class="container breadcrumb-container">
        <div class="breadCrumbcaption">
          <h1 class="breadCrumb_title"> About us</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>About us</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="subpage_section about_section">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">About us</h2>
      </heading>
      <div class="about_content mb-xl-5">
        <h3 class="heading">Religion News Service's priority</h3>
        <figure class="thumb-img pull-right w-25 ml-3"> <img src="{{ asset($aboutUs->image)}}" alt="This is image"> </figure>
        <figcaption>
          <p>{!! $aboutUs->textarea_1 !!}</p>
          <h3 class="heading">Who is visiting the About Us page?</h3>
          <ul class="list-item mb-3">
            {!! $aboutUs->textarea_2 !!}
           
          </ul>
        </figcaption>
        <div class="clear"></div>
        <!--<figure class="thumb-img pull-left w-25 mr-3"> <img src="{{ asset('front/images/Tal-Barahi-Temple.jpg') }}" alt="This is image"> </figure>-->
        <!--<figcaption>-->
        <!--  <p>{!! $aboutUs->textarea_3 !!}</p>-->
        <!--</figcaption>-->
      </div>
    </div>
  </section>
@endsection