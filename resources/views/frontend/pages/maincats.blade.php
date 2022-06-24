@extends('frontend.layouts.master')


                                                    
@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<meta property="og:url" content="{!! route('video.maincategory',strip_tags($maincategoryroot->slug)) !!}"> 

	<meta name="keywords" content="{!!  strip_tags($maincategoryroot->{'summary-ar'} ) !!}">
	<meta name="description" content="{!!  strip_tags($maincategoryroot->{'summary-ar'} ) !!}">
	
    
	<meta property="og:type" content="article">
	<meta property="og:title" content="{!! strip_tags($maincategoryroot->{'title-ar'}) !!}">
    
	<meta property="og:description" content="{!!  strip_tags($maincategoryroot->{'summary-ar'} ) !!}">




{{-- <meta property="og:image"  itemprop="image"  content="https://img.youtube.com/vi/{{ $ur   }}/maxresdefault.jpg ">
<meta name="twitter:image" content="https://img.youtube.com/vi/{{ $ur   }}/maxresdefault.jpg ">
 --}}


    @section('style')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/css/profile.css')}}">
    <style>
    
    
    </style>
    @endsection


    
@section('title',strip_tags($maincategoryroot->{'title-ar'}." | ".$maincategories->{'title-ar'} ))
        
@section('main-content')

  <div class="main-content" style="direction: rtl">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/" target="_blank">{{ $maincategoryroot->{'title-ar'} }}</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://i.pinimg.com/originals/de/e5/39/dee539f30c057dcc7106aca0f3b935ae.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row" style="    width: 100%;">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">{{ $maincategories->{'title-ar'} }}</h1>
            <p class="text-white mt-0 mb-5">{{ $maincategoryroot->{'title-ar'} }}</p>
            <a href="#!" class="btn btn-info">اشترك بالقناة</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{$maincategories->{'title-fr'} }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">اتصل</a>
                <a href="#" class="btn btn-sm btn-default float-right">رسالة</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">قناة</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">فيدسوهات</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">مشترك</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                    {{$maincategories->{'title-ar'} }}<span class="font-weight-light">, 27</span>
                </h3>
                
@php
    $dta_info=explode("-",$maincategories->{'title'});
    $c=0;
@endphp
                @foreach($dta_info as $dta_inf)
                    @if ($c==0)
                      <div class="h5 font-weight-300">
                           <i class="ni location_pin mr-2"></i>
                           {{$dta_inf}}
                      </div>
                      
                      @else
                          
                        @if ($c>1 && $c<3)
                <div>
                  <i class="ni education_hat mr-2"></i>{{$dta_inf}}
                </div>
                        @else

                        @if ($c>2)
                <hr class="my-4">
                <p>{{$dta_inf}}</p>
                <a href="#">عرض المذيد</a>  
                        @else
                            <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$dta_inf}}
                </div>    
                        @endif
               
                        @endif

                    @endif

                    @php
                        $c++;
                    @endphp
                
                @endforeach
                
               
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">القنوات</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">اشتراك</a>
                </div>
              </div>
            </div>
            <div class="card-body row">
       
            
                
        @foreach ($maincategories->category as $cat)

        
 <!-- SIDEBAR - START -->
<div class="col-sm-3" >
    <div class="sidebar"> 
            <div class="box categories box_rr">
                <ul class="list-unstyled">
                    
      <div class="card-profile-image">
        <a href="#">
          <img src="{{$cat->{'title-fr'} }}" class="rounded-circle " style="
          position: absolute;
    width: 55px;
    left: 12px;
    top: 10px;
          
          ">
        </a>
      </div>
                        <li><a href="{{route('video.category',$cat->{'slug'})}}"><i class="fa fa-female"></i>{{$cat->{'title-ar'} }}</a></li>
         
                </ul>
            </div>
    </div>
</div>
<!-- SIDEBAR - END -->      
        @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

























@endsection


@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62246f7e58f4c4001368640a&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){
    
    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });  

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });
        
 })(jQuery)
})
</script>
@endpush