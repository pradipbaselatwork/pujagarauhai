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

      @if(Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('error_message') }}
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
      <div class="totals-item totals-item-total">
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total">{{ $subtotal }}</div>
      </div>

    </div>

        <div class="clear row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-info  mt-3">
              <div class="panel-heading">
                <h4 class="panel-title">Payment Methods</h4>
              </div>
              <div class="pay__option tooltip-item">
                <form action="{{ route('placeorder') }}" method="post">@csrf
               <p id="paymentmessage"></p>
                <label for="cod">
                <input type="radio" class="getpaymentmethod" name="payment_method" value="Cash on delivery" required="">
                <a href="#"><span tooltip="Cash on delivery" id="payment" flow="up"><img src="{{ asset('front/images/cash_on_delivery.png') }}" alt=""></span></a> </label>
              <label for="khalti">
                <input type="radio" class="getpaymentmethod" name="payment_method" value="khalti" required="">
                <a href="#"><span tooltip="Khalti" flow="up" id="payment" ><img src="{{ asset('front/images/khalti.jpg') }}" alt=""></span></a> </label>
              <label for="esewa">
                <input type="radio" class="getpaymentmethod" name="payment_method" value="esewa" required="">
                <a href="#"><span tooltip="esewa" flow="up" id="payment"><img src="{{ asset('front/images/esewa.jpg') }}" alt=""></span></a> </label>
              <label for="phonepay">
                <input type="radio" class="getpaymentmethod" name="payment_method"  value="phonepay" required="">
                <a href="#"><span tooltip="phonepay" flow="up" id="payment"><img src="{{ asset('front/images/phonepay.jpg') }}" alt=""></span></a> </label>
                <br>
                
            <div class="form-check">
      <input type="checkbox" id="" onclick="enable()" name="checkbox" value="Yes">
      <label class="form-check-label" style="display: inline-block;" for="flexCheckDefault">
         <div> I accept <a href="{{ route('terms') }}"><b>terms and condition</b></a> & <a href="{{ route('privacy') }}"><b>privacy policy</b></a> of Puja Garau.</div>
                      </label>
            </div>
        
               <div>
                <button  id="btn_button" class="btn btn-pay  btn-danger" disabled>Pay Order</button>
                       {{-- <input   id="btn" type="submit" class="btn btn-pay  btn-danger" value="Pay Order"> disabled --}}
                       <input style="display: none;" name="total" value="{{ $subtotal }}">
                </div>
                
              
                </form>
              </div>
            </div>
          </div>
        </div>
        

      </div>
      </div>  
    </div>
  </section>
@endsection