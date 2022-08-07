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
          <h1 class="breadCrumb_title"> Our Packages</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Package Detail</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="subpage_section package_section">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h2 class="title center">{{ $package->title }}</h2>
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
      <div class="package_content pt-5">
        <figure class="packagethumb-img pull-left w-50 mr-3"> <img src="{{ asset($package->image)}}" alt="This is image" class="w-100"> </figure>
        <figcaption class="packagethumb-caption">
          <p>{!! $package->description !!}</p>
          <h3 id="show_price">Rs.{{$package->price}}</h3>
        </figcaption>

{{-- i added class product data here --}}
 <div class="product_data">
          <form action="{{ route('add.to.cart') }}" method="post">
            @csrf
            <input type="hidden" name="package_id" value="{{ $package->id }}">
            <input type="hidden" name="name" id="" value="{{ $package->title}}">

            <div class="form-group d-flex select_flex radio">
              <p>
                <input type="radio" value="One time" class="getpackagediscount" id="package_duration" name="package_duration" required="" onclick="discout()">
                <span>One time</span>
                <input type="radio" value="Daily" class="getpackagediscount" id="package_duration" name="package_duration" required="" onclick="discout()">
                <span>Daily</span></p>

                <input type="hidden" name="price" id="getprice" value="{{ $package->price}}">
            </div>

            <input type="hidden" name="image" id="" value="{{ $package->image}}">
            <input type="hidden" name="price" id="price" value="{{ $package->price}}">
              <button class="btn book-btn btn-danger add-to-cart-btn">
                    Add to Cart
              </button>
            </form>
 </div>
        
         <div class="clear"></div>
        <div class="tab-bar my-5"><!-- ./tab-bar starts-->    
   <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Best Price Guaranteed</a>
      </li>
      {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Hotel+Meals Available </a>
      </li> --}}
      <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">24x7 Call Support </a>
      </li>
  </ul><!-- Tab panes -->
  <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <ul>
  
  <li>{!! $package->best_description !!}</li>

  </ul>
      </div>
      <div class="tab-pane" id="tabs-2" role="tabpanel">
          {{-- <h4 class="heading">In this package we will provides different services.</h4> --}}
      <ul>
  
  {{-- <li>{!! $package->hotel_description !!}</li> --}}

   
  </ul>
      </div>
      <div class="tab-pane" id="tabs-3" role="tabpanel">
          {{-- <h4 class="heading">In this package we will provides different services.</h4> --}}
      <ul>
  
   
  <li>{!! $package->call_description !!}</li>
  </ul>
      </div>
  </div>
     </div>    

      </div>
        
    <div class="carousel-wrap mt-0">
       
      <div class="owl-carousel owl-theme image-set">
        @forelse($packageget as $data)
        <div class="item">
            <a class="example-image-link" href="{{ asset($data->image)}}"  data-lightbox="example-set" data-title=""> 
            <figure class="package-img"> <img class="example-image "src="{{ asset($data->image)}}" alt="" title="Click here to zoom"></figure></a>  
        </div>
        @empty
      @endforelse
      </div>
    </div>

    </div>
  </section>
@endsection