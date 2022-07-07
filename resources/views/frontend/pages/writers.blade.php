@extends('frontend.layouts.master')


                                                    
@section('meta') 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<meta property="og:url" content="{!! route('writers') !!}"> 

	<meta name="keywords" content="كاتب محتوي,كاتب, السعدي">
	<meta name="description" content="نخبة من عمالقة كتابي المحتوي"> 
	
    
	<meta property="og:type" content="article">
	<meta property="og:title" content="كتابي المحتوي">
    
	<meta property="og:description" content="نخبة من عمالقة كتابي المحتوي">




<meta property="og:image"  itemprop="image"  content="">
<meta name="twitter:image" content="">
    
@section('title', "نخبة من عمالقة كتابي المحتوي  | السعدي  " )
        



    @section('style')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/css/profile.css')}}">
    <style>
     
    
.title {
    font-size: 25px;
    font-weight: 100
}

.icon {
    position: relative;
    bottom: 11px
}

.mt-100 {
    margin-top: 100px
}

.profile img {
    width: 68px;
    height: 68px;
    border-radius: 50%
}

.card {
    border-radius: 15px;
    margin-left: 30px;
    margin-right: 30px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, .2)
}

.card-body {
    position: relative;
    bottom: 35px
}

.btn {
    margin-top: 36px;
    margin-bottom: 45px;
    background-color: #AB47BC;
    border: none;
    color: #fff
}

.btn:hover {
    -webkit-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    color: #fff
}

.header {
    
}
    </style>
    @endsection






    














@section('main-content')
     <div class='container mx-auto mt-5 col-md-10 mt-100'>
          <div class="header">
              <div class="title">كاتبي محتوي</div>
              <p><small class="text-muted">فريق من كاتبي المحتوي المتخصصين</p>
          </div>
          <div class="row justify-content-center pb-5">
            
@foreach ($writers as $writer)
{{  count($writer->get_w_posts) }}
@php
$r= str_replace(" ","-",$writer->name);
$r= str_replace("/","@",$r);
@endphp


  <div class="card col-md-3 mt-100">
<a href="{{ route('writer',$r) }}">
    <div class="card-content">
        <div class="card-body p-0">
            <div class="profile"> <img src="{{ url($writer->photo) }}"> </div>
            <div class="card-title mt-4">{{$writer->name}}<br /> <small>{{ $writer->role }}</small> </div>
            <div class="card-subtitle">
                <p> <small class="text-muted">{{ $writer->provider }}</small> </p>
            </div>
        </div>
    </div>
</a>
  </div>

@endforeach
            


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