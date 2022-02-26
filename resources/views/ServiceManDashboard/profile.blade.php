@extends('ServiceManDashboard.lay.app')

@section('content')

   
    <!-- breadcrumb-area end -->
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!--====================  Conact us Section Start ====================-->
            <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- <div class="col-lg-12 col-lg-12 align-items-center" >
                           <center> <h4 class="section-title ">User Sign<h4></center>
                        </div> -->
                        <div class="col-lg-4 col-lg-4">
                           
                        </div>

                        <div class="col-lg-4 col-lg-4">
                           
                            <div class="contact-form-wrap">
                            
  
                                    <div class="contact-form">
                                       
                                        <div class="contact-inner">
                                        @if(isset($data->profile_photo_path))
                                        <img src="{{ asset('public/servicemanprofile/'.$data->profile_photo_path) }}" style="height:80px;" />
                                        @endif
                                        <br>
                                            <h6>Name : {{ isset($data->name) ? $data->name : '' }}</h6>
                                            <h6>Email : {{ isset($data->email) ? $data->email : '' }}</h6>
                                            <h6>Mobile : {{ isset($data->mobile) ? $data->mobile : '' }}</h6>
                                            <h6>Address : {{ isset($data->address) ? $data->address : '' }}</h6>
                                            
                                        </div>

                                    
                                       
                                      
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-4">
                           
                        </div>
                    </div>
                </div>
            </div>
             <!--====================  footer area ====================-->

  </div>
       
  @endsection