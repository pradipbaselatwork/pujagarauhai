<?php 
use App\Footer;
$footer = Footer::first();
?>
<footer class="footer-section rgb-overlay">
  <div class="footer-background-overlay"> </div>
  <div class="footer-content">
    <div class="container">
      <div class="row"> 
        <!--Buddha Widget Text Start-->
        <div class="col col-md-3 col-6">
          <div class="widget widget-text"> 
            <!-- Widget Title Start-->
            <h3 class="widget-title">Address</h3>
            <!-- Widget Title End--> 
            
            <!--Info Item Start-->
            <div class="info-item"> <i class="social-box fa fa-envelope"></i>
              <p><a href="mailto:info@demomail.com">{{$footer->mail}}</a></p>
            </div>
            <div class="info-item"> <i class="social-box fa fa-phone"></i>
              <p><a href="tel:9801234567">{{$footer->number}}</a></p>
            </div>
            <div class="info-item"> <i class="social-box fa fa-map-marker"></i>
              <p>{{$footer->address}}</p>
            </div>
            
            <!--Info Item End--> 
          </div>
        </div>
        <!--Buddha Widget Text End--> 
        <!--Buddha Widget Latest News Start-->
        <div class="col col-md-3 col-6">
          <div class="widget widget-links"> 
            <!-- Widget Title Start-->
            <h3 class="widget-title">Quick Links</h3>
            <!-- Widget Title End--> 
            <!--Buddha News Thumb Start-->
            <ul>
              <?php 
use App\Navbar;
$navbar = Navbar::get();
?>
              @forelse($navbar as $data)
              <li><a href="{{ route('page',$data->url) }}"> {{$data->category_name}}</a></li>
              @empty
              @endforelse
            </ul>
            <!--Buddha News Thumb End--> 
            <!--Buddha News Thumb Start--> 
            
            <!--Buddha News Thumb End--> 
          </div>
        </div>
        <!--Buddha Widget Latest News End--> 
        <!--Buddha Widget Twitter Feed Start-->
        <div class="col col-md-3 col-6">
          <div class="widget widget-text"> 
            <!-- Widget Title Start-->
            <h3 class="widget-title">About Us</h3>
            <!-- Widget Title End--> 
            
            <p>{{$footer->description}}</p>
            
            <!-- Widget Title Start-->
            <h4 class="widget-title">Follow Us</h4>
            <ul class="footer-social-icons">
              <li><a target="_blank" href="{{$footer->fb_url}}"><i class="fa-brands fa-facebook-f"></i> </a></li>
              <li><a target="_blank" href="{{$footer->twitter_url}}"><i class="fa-brands fa-twitter"></i> </a></li>
              <li><a target="_blank" href="{{$footer->LinkedIn_url}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <li><a target="_blank" href="{{$footer->instagram_url}}"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a target="_blank" href="{{$footer->utube_url}}"> <i class="fa-brands fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col col-md-3 col-6">
          <div class="widget widget-links"> 
            <!-- Widget Title Start-->
            <h3 class="widget-title">Information</h3>
            <!-- Widget Title End-->
            <ul>
              <li>{!! $footer->information !!}</li>
            </ul>
            <!--Info Item Start--> 
            
            <!--Info Item End--> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <div class="container">
      <p class="lft">© <script type="text/javascript" language="javascript">var date = new Date(); document.write(date.getFullYear());</script> All Rights Reserved.</p>
      <p class="rht"> Powered by : &nbsp;<a href="https://rarasoft.business.site/" target="_blank" class="company_link" collator_asort="">Rara Soft Pvt. Ltd</a> </p>
    </div>
  </div>
</footer>