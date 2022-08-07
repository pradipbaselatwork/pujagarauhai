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
          <h1 class="breadCrumb_title">Order</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Order</span></li>
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
        <h2 class="title center">Order</h2>
        @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
          {{ Session::get('success_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      </heading>
      <div class="cart_content">

  <div class="shopping-cart my-5">
   
    <table class="cart_table">
    <thead class="column-labels">
      <tr>
      <th><label class="product-serial">SN</label></th>
      <th><label class="product-details">Image</label></th>
      <th><label class="product-details">Name</label></th>
      <th><label class="product-line-price">Price</label></th>
   </tr>
  </thead>
   
  <?php 
    
  $subtotal = 0;
  ?>
      <tbody class="product">
        @forelse($seeorderdetail as $data)
      <tr>
  
      <td>{{$data->id}}.</td>
          <td><div class="product-image">
            <img src="{{asset($data->image)}}" alt="" title="">
          </div></td>
          
          <td>
          <div class="product-details">
            <div class="product-title">{{$data->name}}</div>
          </div>
          </td>


          <td> <div class="">{{$data->price}}</div></td>        
    </tr>
    <?php $subtotal +=$data->price?>
  @empty
  <p>No Data</p>
  @endforelse

    </tbody>
  </table>
  <?php
;
?>

    <div class="totals">
  
      {{-- <div class="totals-item totals-item-total">
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total">{{ $subtotal }}</div>
      </div> --}}

  

    </div>
        
  
  </div>
  
   
      </div>
       
    </div>
  </section>
@endsection