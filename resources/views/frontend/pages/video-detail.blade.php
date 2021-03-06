@extends('frontend.layouts.master')

@php 
                                                        $tags=explode(',',$video->tags);
                                                    @endphp
                                                    
@section('meta')







	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<?php
$url = url($video->{'quote-ar'});
parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars ); 
if (isset($my_array_of_vars['v'])) {

	$ur=$my_array_of_vars['v'];
	$video_url=$video->{'quote-ar'};
}else{
	$ur=explode("https://youtu.be/",$url)[1];
	$video_url="https://www.youtube.com/watch?v=".$ur;
}


	?>
    
<meta property="og:title" content="{!! strip_tags($video->{'title-ar'}) !!} - السعدي ">
<meta property="og:type" content="article" />

<meta property="og:url" content="{!! route('video.detail',strip_tags($video->slug)) !!}" />
<meta property="og:image" content="{{url( "https://i.ytimg.com/vi_webp/".$ur."/sddefault.webp ") }}" />
<meta name="twitter:image" content="{{url("https://i.ytimg.com/vi_webp/".$ur."/sddefault.webp ") }} ">
<meta property="og:image:alt" content="{{url($video->photo) }}"> 
<meta property="og:site_name" content="مقاطع مدونة السعدي" />
<meta property="og:locale" content="en_US" />

<meta property="og:contenttype" content="article_listing" />
<meta property="og:publishdt" content="{!! strip_tags($video->created_at) !!}" />
<meta property="og:uploadedby" content="عبدالله مصطفي" />
{{-- <meta property="fb:app_id" content="your app id" />
 --}}





	<meta property="og:description" content="{!!  strip_tags($video->{'summary-ar'} ) !!} - السعدي ">
	<meta name="keywords" content="{{ str_replace('-',',',strip_tags($video->slug)) }}@foreach($tags as $tag),{{ $tag}}@endforeach ,السعدي">
	<meta name="description" content="{!!  strip_tags($video->{'summary-ar'} ) !!} - السعدي ">

 





@endsection


@section('title',strip_tags($video->{'title-ar'})." - السعدي ")

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ Lang::get('msg.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ Lang::get('msg.blog') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
        
    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-5062667702348863"
     data-ad-slot="4854742754"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>



<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
     crossorigin="anonymous"></script>
<!-- respo -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5062667702348863"
     data-ad-slot="2257736673"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div> مشاهدات <i class="fa fa-eye"></i> {{ intval($video->{'description-fr'}) }} </div>

                                <div class="image">
                                    @if($video_url)
                                    <iframe allow="fullscreen;" width="100%" height="315"
                                    src="https://www.youtube.com/embed/{{$ur}}">
                                    </iframe>	
                                    
                                                            @endif
                                                            
                                </div>
                                <div class="blog-detail">  
                                    <h2 class="blog-title">{{$video->{'title-ar'} }}</h2>
                                    <div class="blog-meta">
                                   
                                    </div>
                                    <div class="sharethis-inline-reaction-buttons"></div>
                                    
                                    <div class="content">
                                        <blockquote> <i class="fa fa-quote-left"></i> {!!  ($video->{'summary-ar'}) !!} </blockquote>
                                       
                                        <p>{!! ($video->{'description-ar'}) !!}</p>
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- ShareThis BEGIN --><div class="sharethis-inline-follow-buttons"></div><!-- ShareThis END -->
                                          
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    									
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
     crossorigin="anonymous"></script>
<!-- square -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5062667702348863"
     data-ad-slot="6101495379"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="GET" action="{{route('blog.search')}}">
                                <input type="text" placeholder="{{ Lang::get('msg.search') }}" name="search">
                                <button class="button" type="sumbit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        

                        @if(session()->get('locale')=="en")
{{-- ////                             english                 /// --}}
                        

                        @elseif (session()->get('locale')=="fr")
{{-- ////                             french                 /// --}}
                            
                        
                        @else
                      
{{-- ////                             arabic                 /// --}}
                        

                        @endif


                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-video">
                            <h3 class="title">{{ Lang::get('msg.recentvideo') }}</h3>
                            @foreach($recent_videos as $video)



                            
	<?php
    $url = url($video->{'quote-ar'});
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars ); 
    if (isset($my_array_of_vars['v'])) {
    
        $ur=$my_array_of_vars['v'];
        $video_url=$video->{'quote-ar'};
    }else{
        $ur=explode("https://youtu.be/",$url)[1];
        $video_url="https://www.youtube.com/watch?v=".$ur;
    }
    
    
        ?>
                                <!-- Single video -->
                                <a href="{!! route('video.detail',strip_tags($video->slug)) !!}">
                                    <div class="single-video " style="
                                    
                                        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        background: #f1f1f1;
                                    
                                    " >
                                            <img src="https://i.ytimg.com/vi_webp/{{ $ur   }}/sddefault.webp"  alt="{{$video->{'title-ar'} }}">
                                        
                                        <div class="content col-12" style="    padding: 10px 0;">
                                            
                                            <h5>{{$video->{'title-ar'} }}</h5>
                                            {!! $video->{'summary-ar'} !!}
    
                                            <p style="    margin-bottom: 0;">
                                            @php 
                                                $author_info=DB::table('users')->select('name')->where('id',$video->added_by)->get();
                                            @endphp
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{$video->created_at->format('d M, y')}} -
                                                <i class="fa fa-user" aria-hidden="true"></i> 
                                                 {{$author_info[0]->name}}
                                        
                                            </p>
    
                                        </div>
                                    </div>
                                </a>
                                <!-- End Single video -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
             
                        
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget newsletter">
                            <h3 class="title">{{ Lang::get('msg.newslatter') }}</h3>
                            <div class="letter-inner">
                                <h4>{{ Lang::get('msg.subscribetogetnews') }} </h4>
                                {{-- <form action="{{route('subscribe')}}" method="POST">
                                    @csrf
                                    <div class="form-inner">
                                        <input type="email" name="email" placeholder="{{ Lang::get('msg.youremail') }}">
                                        <button type="submit" class="btn mt-2">{{ Lang::get('msg.submit') }} </button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
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