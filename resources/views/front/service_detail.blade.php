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
          <h1 class="breadCrumb_title"> Our Services</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Service Detail</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="subpage_section service_section">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">{{ $service->title }}</h2>
                @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
          {{ Session::get('success_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      </heading>
      <div class="service_content pt-5 pb-xl-5">
        <figure class="banner-img w-50"> <img src="{{ asset($service->image)}}" alt="This is image" class="w-100"> </figure>
        
        <!--<figure class="thumb-img pull-left w-50 mr-3"> <img src="{{ asset($service->image)}}" alt="This is image"> </figure>-->
        
         <figcaption class="thumb-caption mt-3">
            <p>{!! $service->description !!}</p>
        </figcaption>
        
        <!--<div class="clear"></div>-->
        <!--<figure class="thumb-img pull-left w-50 mr-3"> <img src="{{ asset($service->image_2)}}" alt="This is image"> </figure>-->
        <!--<figcaption class="thumb-caption mt-3">-->
        <!--    <p>{!! $service->img2_description !!}</p>-->
        <!--</figcaption>-->
        <!--<div class="clear"></div>-->
        <!--<figure class="thumb-img pull-right w-50 ml-3"> <img src="{{ asset($service->image_3)}}" alt="This is image"> </figure>-->
        <!--<figcaption class="thumb-caption mt-3">-->
        <!--    <p>{!! $service->img3_description !!}</p>-->
        <!--</figcaption>-->
        <!--<div class="clear mb-3"></div>-->
      </div>


      <div class="booking_form" id="booking">
        <form action="{{ route('service.contact') }}" method="post">
          @csrf
          <div class="row">
            <div class="col col-12">
              <h4 class="form_title">Booking Information :</h4>
            </div>
            <div class="clear"></div>
            <div class="col col-sm-6">
              <div class="form-group">
                <label for="title">Service Name * :</label>
                <input id="title" class="form-control" type="text" name="title" required="" placeholder="Service Name">
              </div>
             
              <div class="form-group">
                <label for="email">Email * :</label>
                <input id="email" class="form-control" type="email" name="email" required="" placeholder="Email">
              </div>
            </div>
            <div class="col col-sm-6">
              <div class="form-group">
                <label for="name">Name * :</label>
                <input id="name" class="form-control" type="text" name="name" required="" placeholder="Full Name"> 
              </div>
              <div class="form-group">
                <label for="address">Address*  :</label>
                <input id="address" class="form-control" type="text" name="address" required="" placeholder="Address">
              </div>
            </div>
            <div class="col col-sm-6">
              <div class="form-group">
                <label for="phone">Phone * :</label>
                <input id="phone" class="form-control" type="tel" name="phone" required="" placeholder="Phone Number">
              </div>
            </div>
            <div class="col col-sm-6">
       
            </div>
            <div class="col col-sm-4">
              <div class="form-group">
                <label for="sex">Sex * </label>
                <select id="sex" class="form-control" name="sex" required="">
                  <option name="sex" value="male">Male</option>
                  <option name="sex" value="female">Female</option>
                </select>
              </div>
            </div>
            <div class="col col-sm-4">
              <div class="form-group">
                <label for="age">Age * </label>
                <select id="age" class="form-control" name="age" required="">
                  <option name="age" value="less_than_1">Less than 1</option>
                  <option name="age" value="less_than_5">Less than 5</option>
                </select>
              </div>
            </div>
            <div class="clear"></div>
            <div class="col-12">
              <h4 class="form_title">Schedule Information :</h4>
            </div>
            <div class="col col-sm-6">
              <div class="form-group">
                <label for="date">Booking date:</label>
                <input id="date" class="form-control" type="date" name="booking_date">
              </div>
            </div>
            <div class="col col-12">
              <div class="form-group">
                <label for="message">Your Details : </label>
                <textarea id="message" class="form-control" name="description" required=""></textarea>
              </div>
            </div>
            <div class="col col-12">
              <div class="form-group">
                <div class="captcha">
                  <div class="spinner">
                    <label>
                      <input type="checkbox" onclick="$(this).attr('disabled','disabled');">
                      <span class="checkmark"><span>&nbsp;</span></span> </label>
                  </div>
                  <div class="text"> I'm not a robot </div>
                  <div class="logo"> <img src="https://forum.nox.tv/core/index.php?media/9-recaptcha-png/"/>
                    <p>reCAPTCHA</p>
                    <small>Privacy - Terms</small> </div>
                </div>
              </div>
            </div>
            <div class="col col-12">
              <div class="form-group">
                <input type="submit" class="btn btn_submit btn-danger" value="Submit">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection