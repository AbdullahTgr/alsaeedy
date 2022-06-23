@extends('frontend.layouts.master')
<?php $settings=DB::table('settings')->get(); ?>


@php
$path="";    
@endphp
@foreach($settings as $data)

 @php
    $path=$data->logo
@endphp

@endforeach

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    

	<meta name="keywords" content="@foreach($tags as $tag),{{ $tag->title}}@endforeach">
	<meta name="description" content="@foreach($tags as $tag),{{ $tag->title}}@endforeach">

	<meta property="og:title" content="{!! strip_tags($settings[0]->{'short_des'}) !!}">
    <meta property="og:image" content="{{ url($path) }}" />
	<meta property="og:description" content="{!!  strip_tags($settings[0]->{'description'} ) !!}">
@endsection

@section('title',Lang::get('msg.Alsaidi'))
@section('main-content')
{{--  --}}
{{-- @if (isset(auth()->user()->id))
    {{ auth()->user()->id }}
@endif --}}
@if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel"> 
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                    <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
   
                    
                </div>  
            @endforeach   
        </div> 
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">{{ Lang::get('msg.previous') }}</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">{{ Lang::get('msg.next') }}</span>
        </a>
    </section>
@endif

<!--/ End Slider Area -->



@include('frontend.collection')





{{-- 
@include('frontend.product_temp')
  --}}



{{-- 
@include('frontend.layouts.newsletter') --}}


@endsection

@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62246f7e58f4c4001368640a&product=inline-share-buttons' async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
      
        color:#581845;
        }

        #Gslider .carousel-inner{
        /* max-height: 50vh; */
        }
        #Gslider .carousel-inner img{
            opacity: .8;
   
    width: 100%;
    object-fit: cover;
    object-position: center;
    margin: auto;
        }
/* On screens that are 992px or less, set the background color to blue */
@media screen and (max-width: 2900px) {
    #Gslider .carousel-inner img{
        height: 500px;
 }
}

/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 992px) {
    #Gslider .carousel-inner img{
        height: 400px;
 }

}
/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 600px) {
    #Gslider .carousel-inner img{
        height: 380px;
 }

}

/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 400px) {
    #Gslider .carousel-inner img{
        height: 220px;
 }

}
/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 200px) {
    #Gslider .carousel-inner img{
        height: 180px;
 }

}





        #Gslider .carousel-inner .carousel-caption {
            bottom: 30%;
            
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 30px;
        font-weight: bold;
        line-height: 100%;
        color: #2196f3;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: #581845;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }



    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}", 
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							// document.location.href=document.location.href;
						});
					}
                    else{
                        window.location.href='user/login'
                    }
                }
            })
        });
    </script>
    <script>
        $('.wishlist').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            // alert(pro_id);
            $.ajax({
                url:"{{route('add-to-wishlist')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id,
                },
                success:function(response){
                    if(typeof(response)!='object'){
                        response=$.parseJSON(response);
                    }
                    if(response.status){
                        swal('success',response.msg,'success').then(function(){
                            document.location.href=document.location.href;
                        });
                    }
                    else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						}); 
                    }
                }
            });
        });
    </script> --}}
   
    <script>
        
        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');
    
        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });
            
        });
    
        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });
    
        var isotopeButton = $('.filter-tope-group button');
    
        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }
    
                $(this).addClass('how-active1');
            });
        });
    </script>


    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
