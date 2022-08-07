<?php 
use App\Navbar;
use App\Cart;

$navbar = Navbar::where('status',1)->get();

if (auth()->check()){
  $cart = Cart::where('user_id',Auth::user()->id)->count();
}
else {
  $cart="";
}

?>
<header class="header">
    <div class="header-inner">
      <div id="pav-mainnav">
        <div class="navigation-bar"><!-- ./navigation-bar-->
          <div class="container-fluid px-lg-5">
            <nav class="navbar navbar-expand-lg my-navbar"> <a class="navbar-brand" href="{{ route('home') }}"><span class="logo"> <img src="{{ asset('front/images/main_logo.png') }}" class="img-fluid"
                                  style="width:100px; margin:-3px 5px 0px 0px;"></span> </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="fas fa-bars"
                                  style="margin:5px 0px 0px 0px;"></i></span> </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">

                  @forelse($navbar as $data)
                  
                  <li class="nav-item "><a class="nav-link" href="{{ route('page',$data->url) }}">{{$data->category_name}}</a></li>
                  @empty
                  @endforelse
                  
                  @if (!auth()->check())
                    <li class="nav-item "><a class="nav-link" href="{{ route('page','login') }}">Login</a></li>
                      
                  @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('update.user.account') }}"> <i class="fas fa-user"></i>Account</a> </li>
                    <!--<li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>-->
                    <!--  Logout</a> </li>-->
                  @endif


                  <li class="nav-item"> <a class="nav-link" href="{{ route('cart') }}"> <i class="fas fa-cart-plus"></i>{{ $cart }} Cart</a> </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                              <button class="header-btn my-2 my-sm-0" type="submit">Subscribe free</button>
                          </form> --> 
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>