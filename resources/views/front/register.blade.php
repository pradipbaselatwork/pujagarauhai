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
          <h1 class="breadCrumb_title">Log in</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Log in</span></li>
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
        <h2 class="title center">Register</h2>
      </heading>
            <div class="login-register py-5">
    <div class="form">
      <form role="form" class="register-form" action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Full Name"/>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="address" placeholder="Address"/>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="number" placeholder="Phone Number"/>
            </div>

         <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email Address"/>
        </div>
        
        <div class="form-group">
            <input type="password" name="password" class="form-control password-field" placeholder="password" id="password-field2"/>
             <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span> 
             </div>
        
        <button type="submit" value="submit" class="btn btn-login">create</button>
        <p class="message">Already registered? <a href="{{ route('login') }}">Sign In</a></p>
      </form>
       
    </div>
  </div>
    </div>
     
  </section>
@endsection