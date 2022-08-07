@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\What;
$what = What::first();
?>
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <!-- <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> -->
    </ol>
    <div class="carousel-inner">
      <?php $i =0; 

      ?>
      @forelse($bannerimage as $data)
      <div class="carousel-item  @if($i==0) active @endif"><img src="{{ asset($data->image)}}" class="d-block w-100" alt="...">
        <a href="{{ $data->link }}"><div class="background-overlay"></div>
          <div class="carousel-caption">
            <h5 class="display-4 h4-md mb-4 font-weight-bold"></h5>
            <p class="h4 mb-5 pb-3 text-white-50"></p></div> </a>
      </div>
      <?php $i++ ?>
      @empty
      @endforelse
     
    </div>


    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"> <span
                  class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"> <span
                  class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 mx-auto">
          <div class="cta-inner bg-faded text-center rounded">
            <h2 class="section-heading mb-4"> <span class="section-heading-upper">What</span> <span class="section-heading-lower">We Do?</span> </h2>
            <div>
              <p class="text-justify">{!! $what->what !!}</p>
            </div>
            <h2 class="section-heading mb-4"> <span class="section-heading-upper">How</span> <span class="section-heading-lower">We Do?</span> </h2>
            <div>
              <p class="text-justify">{!! $what->how !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--::exclusive_item_part start::-->
  <section class="exclusive_item_part blog_item_section">
    <div class="container">
      <heading class="section_tittle text-center  py-5"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">Our Packages</h2>
      </heading>
      <div class="package_content pt-5">
        <div class="row">
          @forelse($package as $data)
          <div class="col col-sm-6 col-md-4 col-lg-3">
            <div class="single_blog_item">
              <div class="single_blog_img"> <img src="{{ asset($data->image)}}" alt=""> </div>
              <div class="single_blog_text">
                <h3>{{$data->title}}</h3>
                <p>{!! $data->description !!}</p>
                <a href="{{ route('package.detail', $data->id) }}" class="btn btn_3 btn">Read More </a> </div>
            </div>
          </div>
          @empty
          @endforelse

          <div class="btn_center mt-5"> <a href="{{ route('page','packages') }}" class="btn btn-default view_btn">View More</a> </div>
        </div>
      </div>
      <div class="carousel-wrap mt-3">
        <heading class="section_tittle text-center py-5">
          <h2 class="title center">Our Exclusive Services </h2>
        </heading>
        <div class="owl-carousel owl-theme mt-5">
          @forelse($service as $data)
          <div class="item">
            <div class="single_blog_item">
              <div class="single_blog_img"> <a href="{{ route('service.detail', $data->id) }}"> <img src="{{ asset($data->image)}}" alt=""> </a> </div>
  
            </div>

          <div class="servicetext" style="padding: 0 15px">
            <h4 style="font-weight:bold; margin-bottom:0;">{{ $data->title }}</h4>
            <p>{!! $data->description !!}</p>
    
          </div>
     
          </div>
          @empty
          @endforelse
        </div>
      </div>
    </div>
  </section>
  <section class="stickyBanner_getStartedWrapper">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="StickyBanner_storyHeading">
            <h2>Are You Interested? </h2>
            <a href="{{ route('page','contactus') }}" class="btn getStarted_btn">Send Enquiry</a> </div>
        </div>
      </div>
    </div>
  </section>

@endsection