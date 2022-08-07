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
          <h1 class="breadCrumb_title">Ckeckout</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Checkout</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> 

  <section class="subpage_section cart_section">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h1 class="section_title">Ckeckout</h1>
      </heading>
      <div class="user-account checkout-details my-5">
        <div class="row">
          <div class="col-md-6">
            <div class="new-users">
              <form id="billing_form" role="form" action="{{ route('checkout') }}" method="post">
                @csrf
                <h2>Billing Address</h2>
                <div class="fieldset">
                  <p>
                    <label>Name :</label>
                    <input id="" type="text" value="{{ auth()->user()->name }}" name="" class="form-control">
                  </p>

                  <p>
                    <label>Email :</label>
                    <input id="" type="text" value="{{ auth()->user()->email }}" name="" class="form-control" readonly="">
                  </p>
            

                  <p>
                    <label>Street Address :</label>
                    <input id="" value="{{ auth()->user()->address }}" type="text" name="address" class="form-control" placeholder="Street Address">
                  </p>
    
                  <p>
                    <label>City :</label>
                    <input id="" value="{{ auth()->user()->city }}" type="text" name="city" class="form-control" placeholder="City">
                  </p>
                  <p>
                    <label for="state">Country :</label>
                    <input id="" value="{{ auth()->user()->country }}" type="text" name="country" class="form-control" placeholder="Country">
                  </p>
    
                  <p>
                    <label>Mobile Number :</label>
                    <input id="" value="{{ auth()->user()->number }}" type="text" name="number" class="form-control" placeholder="Number">
                  </p>

            <p>
               <a href=""> <button class="checkout_btn btn btn-danger">Submit</button></a>
            </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection