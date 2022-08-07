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
          <h1 class="breadCrumb_title">User Account</h1>
          <div class="breadcumb-inner">
            <ul class="breadcrumb-nav">
              <li><a href="{{ route('home') }}" class="breadCrumb_link">Home</a></li>
              <li><span class="slash"></span> <span>Account</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
 

@if ($errors->any())
<div class="alert alert-danger" style="margin-top: 10px">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
  {{ Session::get('success_message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<section class="vertical-tab-section">
  <div class="container">
    <h1>My Account</h1>
    <hr>
    <div class="row mb-3 tab-row">
      <div class="col-md-3 col-sm-4 p-0">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
          {{-- <li class="nav-item"> <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a> </li> --}}
          <li class="nav-item"> <a class="nav-link active" id="logout-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Profile</a> </li>
          <li class="nav-item"> <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}" >Logout</a> </li>
        </ul>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-9 col-sm-8">
        <div class="tab-content" id="myTabContent">
          {{-- <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <h2>Dashboard</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
          </div> --}}
          <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            <h2>MY ORDERS</h2>
            <div class="myaccount-orders"> 
              <!--   <h4 class="small-title">MY ORDERS</h4>-->
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Payment Method</th>
                      <th>Email</th>
                        <th>Status</th>
                      <th>Total Price</th>
                      <th>See Order</th>
                    </tr>
                    <?php 
    
                    $subtotal = 0;
                    ?>
                    
                    @forelse($orderdeta as $data)
                    <tr>


                      <td><a class="account-order-id" href="javascript:void(0)">{{$data->id}}</a></td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->payment_method}}</td>
                      <td>{{$data->email}}</td>
                         <td>{{$data->status}}</td>
                      <td>{{$data->total}}</td>
                      <td><a href="{{ route('seeorderdetail',$data->id )}}" class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a></td>

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
             
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade  show active" id="register" role="tabpanel" aria-labelledby="register-tab">
            <div class="login-register">
              <div class="container mb-3">
                <div class="row">
                  <div class="col-md-6">
                    <div class="login-register py-5">
                        <div class="form">
                            <form role="form" class="register-form" action="{{ route('update.user.account') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <img src="{{ asset(auth()->user()->image) }}" style=" border-radius: 50px; text-aligh: center; padding-bottom:5px; padding-top:5px;" width="90" height="90" alt="" srcset=""><a href="">&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <input type="file" style="padding-bottom:40px;" class="form-control" name="image" value="{{ asset(auth()->user()->image) }}">
                        
                                  </div>
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"  placeholder="name"/>
                                    </div>
                                <div class="form-group">
                                    <input type="email" name="" class="form-control" readonly placeholder="email address" value="{{ auth()->user()->email }}"/>
                                    </div>
                               
        
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address"  value="{{ auth()->user()->address }}" placeholder="address"/>
                                    </div>
        
                                <div class="form-group">
                                    <input type="tel" name="number" value="{{ auth()->user()->number }}" class="form-control" placeholder="Mobile no"/>
                                    </div>
                                
                                
                                <button type="submit" value="submit" class="btn btn-login">Update Details</button>
                                {{-- <p class="message">Already registered? <a href="#">Sign In</a></p> --}}
                            </form>
                        
                        </div>
                        
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="login-register py-5">
                        <div class="form">
                            <form role="form" class="register-form" action="{{ route('update.user.password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                <input type="text" class="form-control" name="current_pwd" placeholder="Enter Current Password"/>
                                </div>
        
                                <div class="form-group">
                                    <input type="text" class="form-control" name="new_pwd" placeholder="Enter New Password"/>
                                    </div>
        
                                <div class="form-group">
                                    <input type="tel" name="confirm_pwd" class="form-control" placeholder="Enter Confirm Password"/>
                                    </div>
                                
                                
                                <button type="submit" value="submit" class="btn btn-login">Update Password</button>
                                {{-- <p class="message">Already registered? <a href="#">Sign In</a></p> --}}
                            </form>
                        
                        </div>
                        
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-md-8 --> 
    </div>
  </div>
  <!-- /.container --> 
  
</section>
@endsection