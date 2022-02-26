<?php
   $last_segments = last(request()->segments());
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>A2Z TECH</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
      <!--base css styles-->
      <link rel="stylesheet" href="{{ asset('public/assets/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
      <!--page specific css styles-->
      <!--flaty css styles-->
      <link rel="stylesheet" href="{{ asset('public/css/flaty.css') }}">
      <link rel="stylesheet" href="{{ asset('public/css/flaty-responsive.css') }}">
      <link rel="shortcut icon" href="{{ asset('public/img/favicon.html') }}">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <style>
         .border-danger{
         border-color: #a94442!important;
         }
         .modal-dismiss-btn{
         margin: 10px !important;
         }
         .js-select2-basic{
         width: 100%!important;
         }
      </style>
   </head>
   <body>
     
      <!-- END Theme Setting -->
      <!-- BEGIN Navbar -->
      <div id="navbar" class="navbar">
         <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
         <span class="fa fa-bars"></span>
         </button>
         <a class="navbar-brand" href="#">
         <small>
         <i class="fa fa-desktop"></i>
         A-Z Technical Solutions
         </small>
         </a>
         <!-- BEGIN Navbar Buttons -->
         <ul class="nav flaty-nav pull-right">
            <!-- BEGIN Button Tasks -->
            
            <!-- BEGIN Button User -->
            <li class="user-profile">
               <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
              
               <span class="hhh" id="user_info">
              
               </span>
               <i class="fa fa-caret-down"></i>
               </a>
               <!-- BEGIN User Dropdown -->
               <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                 
                 
                  <li class="divider"></li>
                  <li>
                     <a href="{{ route('logout') }}"
                       >
                     <i class="fa fa-off"></i> {{ __('Logout') }}
                     </a>
                   
                  </li>
               </ul>
               <!-- BEGIN User Dropdown -->
            </li>
            <!-- END Button User -->
         </ul>
         <!-- END Navbar Buttons -->
      </div>
      <!-- END Navbar -->
      <!-- BEGIN Container -->
      <div class="container" id="main-container">
         <!-- BEGIN Sidebar -->
         <div id="sidebar" class="navbar-collapse collapse">
            <!-- BEGIN Navlist -->
            <ul class="nav nav-list">
               <!-- BEGIN Search Form -->
              
               <!-- END Search Form -->
               <li class="<?php if($last_segments=='dashboard'){ echo 'active'; } ?>">
                  <a href="{{ url('/dashboard') }}">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="#" class="dropdown-toggle">
                  <i class="fa fa-edit"></i>
                  <span>Master</span>
                  <b class="arrow fa fa-angle-right"></b>
                  </a>
                  <!-- BEGIN Submenu -->
                  <ul class="submenu">
                     <li><a href="{{ route('category.index') }}">Category</a></li>
                     <li><a href="{{ route('subCategory.index') }}">Sub Category</a></li>
                     <li><a href="{{ route('packages.index') }}">Packages</a></li>
                  </ul>
                  <!-- END Submenu -->
               </li>
               
               <li class="<php if($last_segments=='serviceman'){ echo 'active'; } ?>">
                  <a href="{{ route('serviceman.index') }}">
                  <i class="fa fa-users"></i>
                  <span>Service Emp List</span>
                  </a>
               </li>
               
               <li class="<?php if($last_segments=='servicesApply'){ echo 'active'; } ?>">
                  <a href="{{ route('services.index') }}">
                  <i class="fa fa-users"></i>
                  <span>Apply Services</span>
                  </a>
               </li>
               
               <li class="<?php if($last_segments=='servicesHistory'){ echo 'active'; } ?>">
                  <a href="{{ route('services.index') }}">
                  <i class="fa fa-users"></i>
                  <span>Services History</span>
                  </a>
               </li>
               
               <li class="<?php if($last_segments=='users'){ echo 'active'; } ?>">
                  <a href="{{ url('/users') }}">
                  <i class="fa fa-users"></i>
                  <span>Users</span>
                  </a>
               </li>
            </ul>
            <!-- END Navlist -->
            <!-- BEGIN Sidebar Collapse Button -->
            <div id="sidebar-collapse" class="visible-lg">
               <i class="fa fa-angle-double-left"></i>
            </div>
            <!-- END Sidebar Collapse Button -->
         </div>
         <!-- END Sidebar -->
         <!-- BEGIN Content -->
         @yield('content')
         <!-- END Content -->
      </div>
      <!-- END Container -->
      <!--basic scripts-->
      <script src="{{ asset('public/assets/jquery/jquery-2.1.1.min.js') }}"></script>
      <script>window.jQuery || document.write('<script src="{{ asset("public/assets/jquery/jquery-2.1.1.min.js") }}"><\/script>')</script>
      <script src="{{ asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('public/assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
      <script src="{{ asset('public/assets/jquery-cookie/jquery.cookie.js') }}"></script>
      <!--page specific plugin scripts-->
      <script src="{{ asset('public/assets/flot/jquery.flot.js') }}"></script>
      <script src="{{ asset('public/assets/flot/jquery.flot.resize.js') }}"></script>
      <script src="{{ asset('public/assets/flot/jquery.flot.pie.js') }}"></script>
      <script src="{{ asset('public/assets/flot/jquery.flot.stack.js') }}"></script>
      <script src="{{ asset('public/assets/flot/jquery.flot.crosshair.js') }}"></script>
      <script src="{{ asset('public/assets/flot/jquery.flot.tooltip.min.js') }}"></script>
      <script src="{{ asset('public/assets/sparkline/jquery.sparkline.min.js') }}"></script>
      <!--flaty scripts-->
      <script src="{{ asset('public/js/flaty.js') }}"></script>
      <script src="{{ asset('public/js/flaty-demo-codes.js') }}"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!--datatables scripts-->
      <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
         $(document).ready(function() {
         $('.js-select2-basic').select2();
         });
      </script>
   </body>
</html>