@php 
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

$service_status='';
if(isset($_GET['service_status'])){
    $service_status = $_GET['service_status'];
}
@endphp

@extends('layouts.app')

@section('content')

<div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
    <div>
    <h1><i class="fa fa-file-o"></i> Services</h1>
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
    <li class="active">Services</li>
    </ul>
    </div>
    <!-- END Breadcrumb -->
    
    <!-- BEGIN Main Content -->
    <div class="row">
    <div class="col-md-12">
    <div class="box">
    <div class="box-title">
    <h3><i class="fa fa-bars"></i> Services</h3>
    <div class="box-tool">
        {{-- <button type="button" onclick="AddEditModal()" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Add New</button> --}}
    </div>
    </div>
    <div class="box-content">
        <div class="responsive-table" id="tag_container">
            <form class="form-inline" action="{{ url('services') }}" method="GET">                
                <div class="row">
                  
                  <div class="col-sm-4">
                    <select name="service_status" id="service_status" class="form-control" style="width: 100%;">
                        <option value="">Select All</option>
                        <option value="0">apply Service</option>
                        <option value="1">Assign Task</option>
                        <option value="2">Process Services</option>
                        <option value="3">Compate Task</option>
                        <option value="4">Cancel Service</option>
                        <option value="4">Uncompleted Service</option>
                    </select>
                    <script>
                        document.getElementById('service_status').value = '@php echo $service_status; @endphp'
                    </script>
                  </div>

                  <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

                </div><br>
              </form>
            @include('services.services_datatable')
        </div>      


    </div>
    </div>
    </div>
    </div>

    



    @include('services.services_modal')
    @include('services.services_js')

@endsection