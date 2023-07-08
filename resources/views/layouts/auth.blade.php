    <!doctype html>
    <html lang="en">
    
    <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/auth/img/apple-icon.png')}}">
      <link rel="icon" type="image/png" href="{{asset('assets/auth/img/favicon.png')}}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>
        MSK ADMIN || DASHBOARD
      </title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <!-- CSS Files -->
      <link href="{{asset('assets/auth/css/bootstrap.min.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/auth/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="{{asset('assets/auth/demo/demo.css')}}" rel="stylesheet" />
      @yield('style')
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    
    <body class="">
      <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
          <div class="logo">
            <a href="https://www.creative-tim.com" class="simple-text logo-mini">
              <!-- <div class="logo-image-small">
                <img src="./assets/img/logo-small.png">
              </div> -->
              <!-- <p>CT</p> -->
            </a>
            <a href="https://www.creative-tim.com" class="simple-text logo-normal">
              Your Logo
              <!-- <div class="logo-image-big">
                <img src="../assets/img/logo-big.png">
              </div> -->
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="" >
                <a href="{{route('dashboard')}}">
                  <i class="nc-icon nc-bank"></i>
                  <p><b>Dashboard</b></p>
                </a>
              </li>
              <li>
                <a href="{{route('posts.create')}}">
                  <i class="nc-icon nc-image"></i>
                  <p>Create Posts</p>
                </a>
              </li>
              <li>
                {{-- <a href="">
                <div class="btn-group dropright">

                <button type="button" class="nc-icon nc-album-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                  Posts
                </button>
                <div class="dropdown-menu">
                  <a href="javascript:;">
                    <i class="nc-icon nc-diamond"></i>
                    <p>Second Item</p>
                  </a>
                </div>

                </div>
                </a>
              </li> --}}
             
              
              <li>
                <a href="{{route('posts.index')}}">
                  <i class="nc-icon nc-shop"></i>
                  <p>All Posts</p>
                </a>
              </li>
              <li>
                <a href="{{route('add_category')}}">
                  <i class="nc-icon nc-diamond"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li>
                <a href="{{route('showcomments')}}">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>Comments</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="main-panel" style="height: 100vh;">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <div class="navbar-toggle">
                  <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </button>
                </div>
                <a class="navbar-brand" href="#"><b>ADMIN DASHBOARD</b></a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                  <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="nc-icon nc-bell-55"></i>
                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                @yield('content')
              </div>
            </div>
          </div>
          <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
            <div class="container-fluid">
              <div class="row">
                {{-- <nav class="footer-nav">
                  <ul>
                    <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                    <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                    <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                  </ul>
                </nav> --}}
                <div class="credits ml-auto">
                  
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
      <!--   Core JS Files   -->
      <script src="{{asset('assets/auth/js/core/jquery.min.js')}}"></script>
      <script src="{{asset('assets/auth/js/core/popper.min.js')}}"></script>
      <script src="{{asset('assets/auth/js/core/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/auth/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
      <!--  Google Maps Plugin    -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chart JS -->
      <script src="{{asset('assets/auth/js/plugins/chartjs.min.js')}}"></script>
      <!--  Notifications Plugin    -->
      <script src="{{asset('assets/auth/js/plugins/bootstrap-notify.js')}}"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{asset('assets/auth/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>

                       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
                    
                    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
      
      @yield('script')
      <script>
        @if(Session::has('alert-success'))
        
        swal("Good job!", "Data Submitted", "success");
   
        @endif


        jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
       </script>

    
    </body>
    
    </html>
    