<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="{{ asset('front/images/favicon.png') }}" type="image/x-icon">
<title>पूजा गरौँ | About us</title>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/fontawesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/solid.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/regular.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fontawesome-free-6.0.0-web/css/brands.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/font-awesome-4.7.0/css/font-awesome-4.7.0.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/fonts.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap-touch-slider.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('front/lightbox/css/lightbox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carouselv2.3.4.css') }}"/>
<link rel="stylesheet" type="text/css"  href="{{ asset('front/css/reset.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('front/css/responsive.css') }}" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    @include('layouts.front_layout.front_header')
    @yield('content')
    @include('layouts.front_layout.front_footer')

    <section class="back_top"><!--//back to top scroll-->
        <div class="container">
          <div id="back-top" style="display: block;"> <a href="#top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
        </div>
      </section>
      <!--//back to top scroll--> 
      
      <script type="text/javascript" src="{{ asset('front/js/jquery-1.9.1.min.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('front/js/owl.carouselv2.3.4.js') }}"></script> 
      <script type="text/javascript">
      
      
      
      $('.exclusive_item_part .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots:false,
        nav: true,
       
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
        
         480: {
        items: 2
        },
        
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
        
      })
       
      </script> 
      
      <script type="text/javascript">
        $('.package_section .owl-carousel').owlCarousel({
          loop: true,
          margin: 10,
          dots:false,
          nav: true,
         
          autoplay: true,
          autoplayHoverPause: true,
          responsive: {
            0: {
              items: 1
            },
          
           480: {
          items: 2
          },
          
            600: {
              items: 3
            },
          
              768: {
              items: 4
            },
            1000: {
              items: 5
            }
          }
          
        })
         
        </script> 
      <script type="text/javascript" src="{{ asset('front/js/fixed-nav.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('front/js/jquery.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('front/js/bootstrap.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('front/js/Push_up_jquery.js') }}"></script> 
       <script type="text/javascript" src="{{ asset('front/js/equalheight.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('front/lightbox/js/lightbox.js') }}"></script> 
      <script src="{{ asset('front/js/front_script.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

      <script>
            //Confirm Delete Sweetalert
            function deleteData(id,record)
{
    // alert(id\
    // console.log(id,record);
    swal({
        title: "Are you sure?",
        text: "You will not able to recover this record again!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it",
    },
    function() {
        window.location.href = "delete-" + record + "/" + id;
    }
);
}
      </script>
      </body>
      </html>

