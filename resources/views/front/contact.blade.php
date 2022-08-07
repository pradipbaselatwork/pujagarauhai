@extends('layouts.front_layout.front_layout')
@section('content')
<?php 
use App\Footer;
use App\Banner;
$footer = Footer::first();
$banner = Banner::first();
?>
<section class="breadCrumbNav-banner subpage-slider showcase">
    <figure> <img src="{{ asset($banner->image)}}" alt=""> </figure>
    <div class="breadCrumbNav breadCrumboverlay">
      <div class="container breadcrumb-container">
        <div class="breadCrumbcaption">
          <h1 class="breadCrumb_title"> Contact us</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Contact us</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="subpage_section contact_section">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">Contact us</h2>
      </heading>
      @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
      <div class="contact_content mb-5">
        <h3 class="heading">Get in Touch With Us !</h3>
        <div class="row mt-4">
          <div  class="col col-sm-8  contact_form">
            <form action="{{ route('add.contact') }}" method="post">
                @csrf
              <div class="row ">
                <div class="col col-sm-6">
                  <div class="form-group">
                    <label for="name">Your Name </label>
                    <input id="name" name="name" class="form-control" type="text" required="">
                  </div>
                </div>
                <div class="col col-sm-6">
                  <div class="form-group">
                    <label for="email">Email Address </label>
                    <input id="email" name="email" class="form-control" type="email" required="">
                  </div>
                </div>
                <div class="col col-sm-6">
                  <div class="form-group">
                    <label for="phone"> Phone</label>
                    <input id="phone" name="phone" class="form-control" type="tel" required="">
                  </div>
                </div>
                <div class="col col-sm-6">
                  <div class="form-group">
                    <label for="address">Address </label>
                    <input id="address" name="address" class="form-control" type="text" required="">
                  </div>
                </div>
                <div class="col col-sm-12">
                  <div class="form-group">
                    <label for="message"> Message</label>
                    <textarea id="message" name="description" class="form-control" rows="5" required=""></textarea>
                  </div>
                </div>
                <div class="col col-12">
                  <div class="form-group">
                    <input class="btn btn_submit btn-danger" type="submit" value="Submit">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col col-sm-4 contact-info">
            <div class="widget widget-text"> 
              <!-- Widget Title Start-->
              <h3 class="widget-title">Address</h3>
              <!-- Widget Title End--> 
              
              <!--Info Item Start-->
              <div class="info-item"> <i class="social-box fa fa-envelope"></i>
                <p><a href="mailto:info@demomail.com">{{ $footer->mail }}</a></p>
              </div>
              <div class="info-item"> <i class="social-box fa fa-phone"></i>
                <p><a href="tel:9801234567">{{ $footer->number }}</a></p>
              </div>
              <div class="info-item"> <i class="social-box fa fa-map-marker"></i>
                <p>{{ $footer->address }}</p>
              </div>
              
              <!--Info Item End--> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="map">
      <div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d14120.836021263318!2d85.35715602460984!3d27.772533524237208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x39eb1c409eb045eb%3A0xb169b68a060d770a!2sChapali+Bhadrakali%2C+Budhanilkantha+44600%2C+Nepal!3m2!1d27.7803217!2d85.3730428!4m5!1s0x39eb1c257b30a06f%3A0x9819a88de0ee753!2sBudhanilkantha%2C+Nepal!3m2!1d27.7654382!2d85.36529589999999!5e0!3m2!1sen!2sus!4v1555402094771!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </section>
@endsection