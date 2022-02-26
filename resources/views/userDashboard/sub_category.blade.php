@extends('userDashboard.lay.app')

@section('content')

   
    <!-- breadcrumb-area end -->
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!--====================  Conact us Section Start ====================-->
            <div class="feature-images-wrapper bg-gray section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                                
                                <h3 class="heading">{{ $subCategory[0]->name }} Services </h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="feature-images__one">
                                <div class="row">
                                @foreach($subCategory as $row)
                                
                                    <div class="col-lg-3 col-md-6 wow move-up">
                                        <!-- ht-box-icon Start -->
                                        <div class="ht-box-images style-01">
                                            <a href="{{ route('addService',$row->id) }}">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    @if(isset($row->img))
                                                    <img style="width:200px;" class="img-fulid img-responsive" src="{{ asset('/public/uploadFiles/'.$row->img) }}" alt="">
                                                    @else
                                                    <img style="width:200px;" class="img-fulid img-responsive" src="{{ asset('public/web/a2ztech.png') }}" alt="">

                                                    @endif
                                                </div>
                                                <div class="content">
                                                    <a href="{{ route('addService',$row->id) }}">
                                                    <h5 class="heading">{{ $row->subCategoryName }}</h5>
                                                    </a>
                                                    <div class="circle-arrow">
                                                        <div class="middle-dot"></div>
                                                        <div class="middle-dot dot-2"></div>
                                                        <a href="{{ route('addService',$row->id) }}">
                                                            <i class="far fa-long-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <!-- ht-box-icon End -->
                                    </div>
                                
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