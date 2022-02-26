@extends('ServiceManDashboard.lay.app')

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
                                            

                                            <div class="col-md-12">
                                                <div class="job-description">
                                                Customer Name : {{ $data->name }} <br>
                                                Customer Mobile : {{ $data->mobile }} <br>
                                                Customer Address : {{ $data->manual_address }} <br>
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
                                                   
                                                 
                                                   Request Service On: {{ date('d-m-Y',strtotime($data->apply_date)) }} {{ $data->apply_time }} </br>
                                                            
                                                           
                                                            @if($data->status == 1)
                                                            Assign Task On : {{ date('d-m-Y',strtotime($data->assign_date)) }} {{ $data->assign_time }} 
                                                            </br>
                                                            <a href="{{ route('startWork',$data->id) }}" class="btn btn-primary">Start Work</a>
                                                                   
                                                            @elseif($data->status == 2)
                                                            Assign Task On : {{ date('d-m-Y',strtotime($data->assign_date)) }} {{ $data->assign_time }}   </br>
                                                           Start Work On : {{ date('d-m-Y',strtotime($data->start_work_date)) }} {{ $data->start_work_time }}                       
                                                            @endif
                                                  
                                                    
                                                </div>
                                            </div>
                                          
                                            
                                        </div>
                                    </div>
                                    
                               
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
           

               <!--====================  Conact us Section Start ====================-->
            <div class="feature-images-wrapper bg-gray section-space--ptb_100" style="padding-top: 19px;">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                           
                                <h3 class="heading">Add Item</h3>
                           
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

                                
                                     <tbody>
                                        <tr>
                                        <td></td>
                                          <td><input type="text" id="name" class="form-class"/></td>
                                          <td><input type="number" id="price" onchange="total()" />
                                          <input type="hidden" id="service_man_id" value="{{ auth()->user()->id }}" />
                                          <input type="hidden" id="user_id" value="{{ $data->user_id }}" />
                                          <input type="hidden" id="service_id" value="{{ $data->id }}" />
                                          </td>
                                          
                                      
                                          <td><input type="number" id="qty" onchange="total()" /></td>
                                          <td><input type="number" id="total" readonly /></td>
                                          <td><input type="button" class="btn btn-primary" id="button" value="Add" /></td>
                                        </tr>
                                    </tbody> 

                                    <tfoot  id="item_details">
                                    </tfoot>
                                
                               
                                <table>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
             <!--====================  footer area ====================-->
           

             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

               
       <script>
        function total(){
          var  price = $('#price').val();
          var  qty =   $('#qty').val();
          var total = price*qty;

            $('#total').val(total);

        }

        function getData(){
            
            var service_id = $('#service_id').val();
           
            $.ajax({
                url:"{{ route('item_details') }}?id="+service_id,
                type:"GET",
                success:function(res){
                  
                   $("#item_details").html(res); 
                }
            })

        }

        getData();

       $('#button').on('click', function(){
        
       var name =  $('#name').val();
       var price = $('#price').val();
       var qty =   $('#qty').val();
       var total = $('#total').val();
       var service_man_id = $('#service_man_id').val();
       var user_id = $('#user_id').val();

       var service_id = $('#service_id').val();
       var status = true;

        if(name==''){
            alert('Please Enter Name');
            status = false;
        }else{
            status = true;
        } 

         if(price==''){
            alert('Please Enter Price');
            status = false;
        }else{
            status = true;
        } 

         if(qty==''){
            alert('Please Enter Qty');
            status = false;
        }else{
            status = true;
        } 

         if(total==''){
            alert('Please Enter Amount');
            status = false;
        }else{
            status = true;
        }


        $.ajax({
            url:"{{ route('add_items') }}?item_name="+name+"&price="+price+"&qty="+qty+"&total="+total+"&user_id="+user_id+"&service_man_id="+service_man_id+"&service_id="+service_id,
            type:'GET',
            success:function(res){
             $('#name').val('');
             $('#price').val('');
             $('#qty').val('');
            $('#total').val('');
                getData();
            }

        }); 

        });
       </script>

    @endsection