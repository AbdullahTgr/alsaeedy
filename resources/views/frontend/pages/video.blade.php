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
 
    
	<meta property="og:url" content="https://www.facebook.com/alsaeedyblog">  
   


    @if (isset($channel))

            <meta name="description" content=" {{ $videos->title }}  - السعدي">
            <meta property="og:type" content="article">
            <meta property="og:title" content=" {{ $videos->{'title-ar'} }}   - السعدي"> 

            <meta name="og:image" content=" {{ url($videos->{'title-fr'}) }}  - السعدي">
            <meta name="twitter:image" content=" {{ url($videos->{'title-fr'}) }}  - السعدي">

            <meta name="twitter:description" content=" {{ $videos->title }}  - السعدي">
            <meta name="keywords" content="{{ str_replace('-',',',strip_tags($videos->slug)) }} ,السعدي, مقاطع فيديو,موسوعة,عربية,شاملة">

            
            <meta property="og:description" content=" {{ $videos->title }}  - السعدي">

            @section('title',$videos->title . " | السعدي ") 
            
    @else
   
    
        <meta property="og:image"  itemprop="image"  content="{{ url('images/blog.jpg') }}" />
        <meta name="twitter:image" content="{{ url('images/blog.jpg') }}">
    
        
    
    
        <meta name="twitter:description" content="السعدي - مقاطع فيديو - أكبر موقع عربي بالعالم ">
    
        <meta name="keywords" content=" ,السعدي, مقاطع فيديو,موسوعة,عربية,شاملة">
        <meta name="description" content="السعدي - مقاطع فيديو - أكبر موقع عربي بالعالم">
        
        <meta property="og:type" content="article" />
        <meta property="og:title" content="السعدي - مقاطع فيديو - أكبر موقع عربي بالعالم"> 
        <meta property="og:description" content="السعدي - مقاطع فيديو - أكبر موقع عربي بالعالم">

@section('title',"السعدي - مقاطع فيديو - أكبر موقع عربي بالعالم") 
    @endif



	<meta name="keywords" content="@foreach($tags as $tag),{{ $tag->title}}@endforeach">


    @endsection


@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ Lang::get('msg.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ Lang::get('msg.video') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
        
    <!-- Start video Single -->
    <section class="blog-single shop-blog grid section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
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
                    <div class="row">
                        @if (isset($channel))
                        <div class="col-12" style="font-size: 20px;">
                            {{ $videos->{'title-ar'} }}
                        </div>
                            @php
                                
                        $videos=$videos->video;
                            @endphp
                        @else
                            @php
                                
                        $videos=$videos;
                            @endphp
                        @endif
                        
                        @foreach($videos as $video)


                                      
	<?php
    $url = url($video->{'quote-ar'});
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars ); 
    if (isset($my_array_of_vars['v'])) {
    
        $ur=$my_array_of_vars['v'];
        $video_r_url=$video->{'quote-ar'};
    }else{
        $ur=explode("https://youtu.be/",$url)[1];
        $video_r_url="https://www.youtube.com/watch?v=".$ur;
    }
    
    
        ?>
                        {{-- {{$video}} --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <!-- Start Single Blog  -->
                                <div class="shop-single-blog col-12">
                                <img src="https://img.youtube.com/vi/{{ $ur   }}/maxresdefault.jpg " alt="https://img.youtube.com/vi/{{ $ur   }}/maxresdefault.jpg ">
                                    <div class="content col-12">
                                        @php 
                                            $author_info=DB::table('users')->select('name')->where('id',$video->added_by)->get();
                                        @endphp
                                        <p class="date">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i> 
                                            
                                            {{$video->created_at->format('d M, Y. D')}}
                                            <span class="float-right">
                                                <i class="fa fa-user" aria-hidden="true"></i> 
                                                @foreach($author_info as $data)
                                                    @if($data->name)
                                                        {{$data->name}}
                                                    @else
                                                    {{ Lang::get('msg.anonymous') }}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </p>
                                        <a href="{{route('video.detail',$video->slug)}}" class="title">{{$video->{'title-ar'} }}</a>
                                        <p>{!! html_entity_decode($video->{"summary-ar"} ) !!}</p>
                                        <a href="{{route('video.detail',$video->slug)}}" class="more-btn">{{ Lang::get('msg.continuereading') }}</a>
                                    </div>
                                </div>
                                <!-- End Single video  -->
                            </div>
                        @endforeach
                        <div class="col-12">
                            <!-- Pagination -->
                            {{-- {{$videos->appends($_GET)->links()}} --}}
                            <!--/ End Pagination -->
                        </div>
                    </div>
                </div>
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
                <div class="col-lg-4 col-12">

                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="GET" action="{{route('video.search')}}">
                                <input type="text" placeholder="{{ Lang::get('msg.search') }}" name="search">
                                <button class="button" type="sumbit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">{{ Lang::get('msg.videocategories') }}</h3>
                            <ul class="categor-list">
                                @if(!empty($_GET['category']))
                                    @php 
                                        $filter_cats=explode(',',$_GET['category']);
                                    @endphp
                                @endif
                            <form action="{{route('video.filter')}}" method="POST"> 
                                    @csrf
                                    {{-- {{count(Helper::videoCategoryList())}} --}}
                                    @foreach(Helper::videoCategoryList('videos') as $cat)  
                                    <li>
                                        <a href="{{route('video.category',$cat->slug)}}">{{$cat->{'title-ar'} }} </a>
                                    </li>
                                    @endforeach 
                                </form>
                                
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-video"> 
                            <h3 class="title">{{ Lang::get('msg.recentvideo') }}</h3>
                            @foreach($recent_videos as $video)
                                <!-- Single video -->
                                              
	<?php
    $url = url($video->{'quote-ar'});
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars ); 
    if (isset($my_array_of_vars['v'])) {
    
        $ur=$my_array_of_vars['v'];
        $video_r_url=$video->{'quote-ar'};
    }else{
        $ur=explode("https://youtu.be/",$url)[1];
        $video_r_url="https://www.youtube.com/watch?v=".$ur;
    }
    
    
        ?><a href="{!! route('video.detail',strip_tags($video->slug)) !!}">
                                <div class="single-video " style="
                                
                                    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    background: #f1f1f1;
                                
                                " >
                                        <img src="https://img.youtube.com/vi/{{ $ur   }}/maxresdefault.jpg " alt="https://img.youtube.com/vi/{{ $ur   }}/maxresdefault.jpg ">
                                    
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
                        <div class="single-widget side-tags">
                            <h3 class="title">{{ Lang::get('msg.tags') }}</h3>
                            <ul class="tag">
                                @if(!empty($_GET['tag']))
                                    @php 
                                        $filter_tags=explode(',',$_GET['tag']);
                                    @endphp
                                @endif
                                <form action="{{route('video.filter')}}" method="POST">
                                    @csrf
                                    @foreach(Helper::videoTagList('videos') as $tag)
                                        <li>
                                            <li>
                                                <a href="{{route('video.tag',$tag->title)}}">{{$tag->title}} </a>
                                            </li>
                                        </li>
                                    @endforeach
                                </form>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget newsletter">
                            <h3 class="title">{{ Lang::get('msg.newslatter') }}</h3>
                            <div class="letter-inner">
                                <h4>{{ Lang::get('msg.subscribetogetnews') }}</h4>
                                {{-- <form method="POST" action="{{route('subscribe')}}" class="form-inner">
                                    @csrf
                                    <input type="email" name="email" placeholder="{{ Lang::get('msg.youremail') }}">
                                    <button type="submit" class="btn " style="width: 100%">{{ Lang::get('msg.submit') }}</button>
                                </form> --}}
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End video Single -->
@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush