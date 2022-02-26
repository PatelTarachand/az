@extends('ServiceManDashboard.lay.emplogin')

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
                            
                          
                            <div class="cta-button-group--two">
                            <p>Employee Login</p>

                                <form  action="{{ route('loginSubmit') }}" method="post">
                                    @csrf
                                    <div class="contact-form">
                                       
                                        <div class="contact-inner">
                                            <input name="mobile" type="text" placeholder="Enter Mobile Number">
                                            @error('mobile')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="contact-inner">
                                            <input name="password" type="password" placeholder="Enter Password">
                                            @error('password')
                                            <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="submit-btn mt-20">
                                            <button class="ht-btn ht-btn-md" type="submit">Submit</button>
                                            
                                        </div>
                                    </div>
                                </form>
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