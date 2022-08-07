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



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

  <section class="subpage_section contact_section">
    <div class="container">
    
      @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">Log in</h2>
        @if(Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
         {{ Session::get('error_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
      </heading>


       <div class="login-register py-5">
    <div class="form">
     
        <form class="login-form" method="POST" action="{{route('login')}}">
            @csrf
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email"/>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control password-field" placeholder="password" name="password"  id="password-field2"/>
         <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span> 
        </div>
        <button type="submit" class="btn btn-primary">login</button>
        <p class="message">Not registered? <a href="{{ route('register') }}">Create an account</a></p>
      </form>
    </div>
  </div>
    </div>
     
  </section>
@endsection