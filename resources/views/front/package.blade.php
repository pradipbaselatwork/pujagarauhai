@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Banner;
$banner = Banner::first();
?>
<section class="breadCrumbNav-banner subpage-slider showcase">
    <figure> <img src="{{ asset($banner->image)}}" alt=""> </figure>
    <div class="breadCrumbNav breadCrumboverlay">
      <div class="container breadcrumb-container">
        <div class="breadCrumbcaption">
          <h1 class="breadCrumb_title"> Our Packages</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Our Packages</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="subpage_section package_section  blog_item_section">
    <div class="container">
      <heading class="section_tittle text-center py-5"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">Our Special Packages</h2>
      </heading>
      @forelse($packages as $data)

      <div class="package_content pt-5">
         <div class="row mb-lg-5">
          <div class="col-12">
            <h3 class="title mb-3 bold">{{ $data->package_type }}  </h3>
          </div>
          @foreach ($data->package as $item)
            <div class="col col-sm-6 col-md-4 col-lg-3">
              <div class="single_blog_item">
                <div class="single_blog_img"> <img src="{{ asset($item->image)}}" alt=""> </div>
                <div class="single_blog_text">
                  <h3>{{$item->title}}</h3>
                  <h3>Rs.{{$item->price}}</h3>
                  <p>{!! $item->description !!}</p>
                  <a href="{{ route('package.detail', $item->id) }}" class="btn btn_3 btn">Read More </a> </div>
              </div>
            </div>
          @endforeach
        </div>   
      </div>
      @empty
      @endforelse
    </div>
  </section>
@endsection