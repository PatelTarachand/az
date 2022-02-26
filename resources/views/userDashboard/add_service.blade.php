@extends('userDashboard.lay.app')

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
                            
                            

                                <form  action="{{ route('userServiceSubmit') }}" method="post">
                                    @csrf
                                    
                                    @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>{{ Session::get('success') }}</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    @endif
                                    <input type="hidden" name="id" value="{{ isset($data->id)? $data->id :'' }}">
                                    <input type="hidden" name="sub_category_id" value="{{ isset($data->sub_cat_id)? $data->sub_cat_id :'' }}">
                                    <input type="hidden" name="category_id" value="{{ isset($data->cat_id)? $data->cat_id :'' }}">
                                    <div class="contact-form">
                                    <div class="contact-inner">
                                        <input type="text" name="category" readonly value="{{ old('category',isset($data->name) ? $data->name : ''  ) }}" placeholder="Service Description" />
                                        </div>

                                        <div class="contact-inner">
                                        <input type="text" name="subCategoryName" readonly value="{{ old('subCategoryName',isset($data->subCategoryName) ? $data->subCategoryName : ''  ) }}" placeholder="Service Description" />
                                        </div>

                                        <div class="contact-inner">
                                            <textarea name="description" required placeholder="Enter Description"></textarea>
                                        </div>
                                       
                                        <div class="cta-button-group--two text-center">
                                       
                                        
                                        <div class="contact-inner">
                                            <textarea name="manual_address" placeholder="Mannual Type Address"></textarea>
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