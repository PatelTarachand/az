@php 
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

@endphp

@extends('layouts.app')
@section('content')

<div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
    <div>
    <h1><i class="fa fa-file-o"></i>  Assign Service</h1>
    </div>
    </div>
    <!-- END Page Title -->
    
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
    <ul class="breadcrumb">
    <li>
    <i class="fa fa-home"></i>
    <a href="index.html">Home</a>
    <span class="divider"><i class="fa fa-angle-right"></i></span>
    </li>
    <li class="active"> {{ ucfirst($man->name) }}</li>
    </ul>
    </div>
    <!-- END Breadcrumb -->
    
 
   
    <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-title">
                            <h3><i class="fa fa-bars"></i> {{ ucfirst($man->name) }}</h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            @if(isset($editData))
                                 <form action="{{ route('assignService.update',$editData->id) }}" class="form-horizontal" id="validation-form" method="post">
                                @method('put')
                            @else
                                <form action="{{ route('assignService.store') }}" class="form-horizontal" id="validation-form" method="post">
                            @endif
                              
                               @csrf
                                <hr>
                                <div class="form-group">
                                    <label for="select" class="col-sm-3 col-lg-2 control-label">Category</label>
                                    <div class="col-sm-6 col-lg-4 controls">
                                        <select class="form-control" name="category_id" id="category" data-rule-required="true">
                                            <option value="">-- Please Category --</option>
                                            @foreach($category as $tc)
                                            <option value="{{ $tc->id }}">{{ $tc->name }}</option>
                                           @endforeach
                                        </select>
                                        <input type="hidden" name="service_man_id" value="{{ old('service_man_id',isset($editData->service_man_id) ? $editData->service_man_id : $man->id ) }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Sub Category</label>
                                    <div class="col-sm-9 col-lg-10 controls fetch_sub_category">
                                      
                                    </div>
                                    </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        <button type="button" class="btn">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ isset($row->category_name) ? $row->category_name : '' }}</td>
            
            <td>
            <?php
               $scate = json_decode($row->sub_category_id);
             
                $count = sizeof($scate);
            
            ?>
            @for($i=0; $i<$count; $i++)
            <?php
            $scatname=  AdminController::getValueStatic2('sub_categories','subCategoryName','id',$scate[$i])
            ?>
            {{ $scatname }},
            @endfor
            </td>
            
            
            <td>
                <a class="btn btn-success" href="{{ route('assignService.edit',$row->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                <a href="#" class="btn" rel="tooltip" title="Delete">
                    <form action="{{route('assignService.destroy',$row->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                         <i class="fa fa-minus-circle" aria-hidden="true" onclick="return confirm('Are you sure to Delete?')"></i> Delete
                        </button>
                    </form>
                </a>
                
            </td>
        </tr>
        @endforeach
     
    </tbody>
  </table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         
<script type="text/javascript">

    $('#category').val(<?php echo isset($editData->category_id) ? $editData->category_id : '' ; ?>);
   
   


   function getSubCategory(){
       
      var category = <?php if(isset($editData->category_id)) { echo $editData->category_id; } else {  ?> $('#category').val() <?php } ?>;
      var id = <?php if(isset($editData->id)) { echo $editData->id; } else { echo 0; } ?>;
      $.ajax({
        url : '{{ route("fetech_sub_category") }}?category='+category+'&id='+id,
        type: 'get',
        success:function(res){
            console.log(res);
            $('.fetch_sub_category').html(res);
        }
      });
    }

    getSubCategory(); //this calls it on load
    $("#category").change(getSubCategory);
    
</script>

@endsection