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
              <li><span class="slash"></span> <span>Our Services</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="subpage_section service_section">
    <div class="container">
      @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
      <heading class="section_tittle text-center p-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">Our Exclusive Services</h2>
      </heading>
      <div class="service_content pt-5">
        <div class="row">
          <div class="col-md-9 package_content">
            <div class="row">
              @forelse($service as $data)
              <div class="col col-sm-6 col-md-4">
                <div class="service_blog_item">
                  <div class="service_blog_img"> <img src="{{ asset($data->image)}}" alt=""> </div>
                  <div class="service_blog_text">
                    <h3>{{$data->title}}</h3>
                    <p>{!! $data->description !!}</p>
                    <a href="{{ route('service.detail', $data->id) }}" class="btn btn_3 btn">Read More </a> </div>
                </div>
              </div>
              @empty
              @endforelse
            </div>
          </div>
          <div class="col-md-3 service-list-wrapper ">
            <div class="card pb-3 ">
              <ul class="card-body">
                @foreach ($service as $item)
                <li><a href="{{ route('book.service' , $item->id) }}">{{ $item->title }} </a></li>
                @endforeach
              </ul>
              <a href="#booking" class="btn book-btn btn-danger d-flex align-items-center justify-content-center">Book Now</a> </div>
          </div>
        </div>
        
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
            {{-- <div class="col col-sm-4">
              <div class="form-group">
                <label for="age">Age * </label>
                <select id="age" class="form-control" name="age" required="">
                  <option name="age" value="less_than_1">Less than 1</option>
                  <option name="age" value="less_than_5">Less than 5</option>
                </select>
              </div>
            </div> --}}
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