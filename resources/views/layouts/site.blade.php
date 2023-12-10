<html lang="en">
  <head>
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets/site/images/logo-black.png')}}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/site/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
    @yield('style')
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a class="navbar-brand" href="#">
   <img src="{{asset('assets/site/images/logo-black.png')}}" width="200" style="margin: 0" alt="">
 </a>
          
         </div>


          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="{{route('site')}}" @@home>Home</a></li>
                  @foreach($allcategories as $category)
                <li><a href="{{route('single-category', $category->id)}}">{{$category->name}}</a></li>
                  @endforeach
                @if(!Auth::check())<li class="d-none d-lg-inline-block"><a href="{{route('login')}}" @@Contact ><span class="btn btn-sm btn-secondary">Login</span></a> <a href="{{route('register')}}" @@Contact><span class="btn btn-sm btn-secondary">Register</span></a></li> @endif
                @if(Auth::check()) <li class="d-none d-lg-inline-block"><a href="{{route('logout')}}"><span class="btn btn-sm btn-primary">Logout</span></a> </li> @endif
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
        
        @yield('content')

    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>Know It is a blogging website dedicated to sharing knowledge on a wide range of subjects. From science and technology to travel and lifestyle, we strive to provide informative and engaging content that empowers our readers to expand their horizons and stay informed.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left">
              @foreach ($allcategories as $category)
              <li><a href="{{route('single-category', $category->id)}}">{{$category->name}}</a></li>
              @endforeach
             
            </ul>
          </div>
          <div class="col-md-4">
            

            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="#"><span class="icon-twitter p-2"></span></a>
                <a href="#"><span class="icon-instagram p-2"></span></a>
                <a href="#"><span class="icon-rss p-2"></span></a>
                <a href="#"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved<i class="icon-heart text-danger" aria-hidden="true"></i></a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <script src="{{asset('assets/site/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/site/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/site/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/site/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/site/js/aos.js')}}"></script>

  <script src="{{asset('assets/site/js/main.js')}}"></script>
@yield('script')
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    
  </body>
</html>