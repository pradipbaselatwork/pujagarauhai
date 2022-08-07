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
          <h1 class="breadCrumb_title"> Cart</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Cart</span></li>
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
        <h2 class="title center">Cart</h2>
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
      <th><label class="product-image">Image</label></th>
      <th><label class="product-details">Product</label></th>
      <th><label class="product-price">Price</label></th>
      <th><label class="product-removal">Remove</label></th>
      <th><label class="product-line-price">Total</label></th>
   </tr>
  </thead>
   
  <?php 
    
  $subtotal = 0;
  ?>
      <tbody class="product">
        @forelse($cart as $data)
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
          {{-- <td><div class="product-quantity">
            <input type="number" value="2" min="1" max="99" maxlength="1">
          </div></td> --}}
          <td>
            <a href="javascript:void(0)" onclick="deleteData(this.getAttribute('rel'), this.getAttribute('record'))"  record="cart"  rel="{{$data->id}}" >
                  <div class="product-removal">
                    <button class="remove-product">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                    </div>
            </a>
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
  
      <div class="totals-item">
       
      
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal">{{ $subtotal }}</div>
      </div>
      <div class="totals-item">
        <label>Tax (0%)</label>
        <div class="totals-value" id="cart-tax">0.00</div>
      </div>
      {{-- <div class="totals-item">
        <label>Shipping</label>
        <div class="totals-value" id="cart-shipping">15.00</div>
      </div> --}}
      <div class="totals-item totals-item-total">
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total">{{ $subtotal }}</div>
      </div>

    </div>
        
       <a href="{{ route('checkout') }}"> <button class="checkout_btn btn btn-danger">Checkout</button></a>
  
  </div>
  
   
      </div>
       
    </div>
  </section>
@endsection