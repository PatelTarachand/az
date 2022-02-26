@extends('userDashboard.lay.app')

@section('content')

@php 
use App\Http\Controllers\WebsiteController;
@endphp
   
    <!-- breadcrumb-area end -->
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!--====================  Conact us Section Start ====================-->
            <div class="feature-images-wrapper bg-gray section-space--ptb_100" style="padding-top: 19px;">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                            @if($page==1)
                                <h3 class="heading">Service History</h3>
                            @else
                                <h3 class="heading">Apply Service </h3>
                            @endif
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ht-simple-job-listing move-up animate">
                                <div clas="list">
                                    
                                    @foreach($records as $row)
                                   
                                    <div class="item" style="background:white; border-left: 7px solid #086AD8;">
                                    <a href="{{ route('applyServicesDetails',$row->id) }}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="job-info">
                                                <center>
                                                <img style="height: 66px;border-radius: 10px;" class="img-fulid img-responsive" src="{{ asset('/public/uploadFiles/'.WebsiteController::getValue('categories', 'id', $row->category_id, 'img')) }}" alt="">
                                                <center>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="job-description">
                                               Requested for  {{ WebsiteController::getValue('categories', 'id', $row->category_id, 'name') }} : 
                                                        
                                                        {{ WebsiteController::getValue('sub_categories', 'id', $row->sub_category_id, 'subCategoryName') }} <br>
                                                      
                                                     Status :   @if($row->status == 0)
                                                            Waiting for Approval
                                                            @elseif($row->status == 1)
                                                                Assign Task                
                                                            @elseif($row->status == 2)
                                                                Proccessing                
                                                            @endif
                                                            <br>
                                                    Request Date Time: {{ $row->apply_date }} {{ $row->apply_time }}
                                                </div>
                                            </div>

                                           
                                        </div>
                                        </a>
                                    </div>
                                    
                                    </br>
                                    @endforeach
                               
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
             <!--====================  footer area ====================-->

</div>
       





           



        

    @endsection