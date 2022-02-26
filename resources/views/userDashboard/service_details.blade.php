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
                           
                                <h3 class="heading">Service Details</h3>
                           
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ht-simple-job-listing move-up animate">
                                <div clas="list">
                                    
                                    
                                    <div class="item" style="background:white; border-left: 7px solid #086AD8;">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <center>
                                                <img style="height: 66px;border-radius: 10px;" class="img-fulid img-responsive" src="{{ asset('/public/uploadFiles/'.WebsiteController::getValue('categories', 'id', $data->category_id, 'img')) }}" alt="">
                                                </center>   
                                            </div>

                                            <div class="col-md-4">
                                                <div class="job-description">
                                                Requested for  {{ WebsiteController::getValue('categories', 'id', $data->category_id, 'name') }} : 
                                                        
                                                        {{ WebsiteController::getValue('sub_categories', 'id', $data->sub_category_id, 'subCategoryName') }} <br>
                                                      
                                                     Status :   @if($data->status == 0)
                                                            Waiting for Approval
                                                            @elseif($data->status == 1)
                                                                Assign Task                
                                                            @elseif($data->status == 2)
                                                                Proccessing                
                                                            @endif
                                                            <br>
                                                   Service Description : {{ $data->description }}<br>
                                                   Address : {{ $data->manual_address }} <br>
                                                  @if(isset($data->apply_date))  Request Date Time: {{ $data->apply_date }} {{ $data->apply_time }} @endif <br>

                                                  @if(isset($data->complete_service_date))  Completed Service Date Time: {{ $data->complete_service_date }} {{ $data->complete_service_time }} @endif
                                                  
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                          
                                            <div class="job-description">
                                            @if(isset($data->service_man_id))  Completed Service Date Time: {{ $data->service_man_id }}  @endif
                                            </div>
                                         
                                      </div
                                            
                                        </div>
                                    </div>
                                    
                               
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
             <!--====================  footer area ====================-->

            @if(!$items->isEmpty())
               <!--====================  Conact us Section Start ====================-->
            <div class="feature-images-wrapper bg-gray section-space--ptb_100" style="padding-top: 19px;">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                           
                                <h3 class="heading">Item List</h3>
                           
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ht-simple-job-listing move-up animate">
                                <div clas="list">
                                <div class="item" style="background:white; border-left: 7px solid   #086AD8;     padding: 10px;">
                                   
                                   <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th style="text-align:right;padding-right:10px;">Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                @foreach($items as $item)
                                   
                                     <tbody>
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td style="text-align:right;padding-right:10px;"> @if($item->status==2) 0 @else {{ $item->total }} @endif </td>
                                            <td>@if($item->status==0)
                                            <a href="{{ route('ItemAction',[$item->id,'1']) }}" type="button" class="btn btn-success" >Approved</a>
                                            <a href="{{ route('ItemAction',[$item->id,'2']) }}" type="button"  class="btn btn-danger" >Cancel</a>
                                            @elseif($item->status==1)
                                                    <span style="color:green">Approved</span>
                                                    @elseif($item->status==2)
                                                    <span style="color:red">Cancel</span>
                                             @endif
                                             
                                             
                                              </td>
                                        </tr>
                                    </tbody> 
                                @endforeach  
                                <thead>
                                        <tr>
                                            <th colspan="4" style="text-align:right;">Total Item</th>
                                           
                                       
                                            <th style="text-align:right;padding-right:10px;">{{ $sum }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <table>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
             <!--====================  footer area ====================-->
            @endif

 
               <div class="feature-images-wrapper bg-gray " style="padding-top: 19px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ht-simple-job-listing move-up animate">
                                <div clas="list">
                                   
                                   <table class="table">
                                    <thead>
                                       
                                        
                                      
                                        <tr>
                                            <th>Total With Service Charges</th>
                                            <th><a href="" class="btn btn-primary"> {{ $total }} Pay </a></th>
                                        </tr>
                                        
                                    </thead>
                             
                                <table>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                  
            </div>
       

</div>
       

    @endsection