@extends('layouts.mainTable')
@section('header_v')
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<meta property="og:url" content="{{ url($video->youtube_embed) }}"> 

	<meta name="keywords" content="{{ $video->tags }}">
	<meta name="description" content="{{  $video->description  }}">
	
    
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{ $video->title }}">

	<?php
$url = url($video->youtube_embed);
parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	?>

	<meta property="og:image"  itemprop="image"  content="https://img.youtube.com/vi/{{ $my_array_of_vars['v']   }}/maxresdefault.jpg ">
    <meta name="twitter:image" content="https://img.youtube.com/vi/{{ $my_array_of_vars['v']   }}/maxresdefault.jpg ">
	<meta property="og:description" content="{!!  strip_tags($video->description) !!}">
	
@endsection

@section('title')
<title>{{ $video->title }}</title>
@endsection
@section('content')
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray" style="    direction: rtl;
text-align: right;">>
	<!-- Container Start -->
	<div class="container"> 
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{ $video->title }}</h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-folder-open"></i> القناة <a href="{{ route('channel', [$video->channel->id]) }}">
											<span class="label label-info label-many">{{ $video->channel->name }}</span>
							</a></li>
						</ul>
					</div>
                    <br>
                    <div class="col-md-12" style="padding: 0;"> 

                        @if($video->youtube_embed)
						<iframe allow="fullscreen;" width="100%" height="315"
						src="{!! str_replace('watch?v=', 'embed/', $video->youtube_embed) !!}">
						</iframe>	
						
												@endif
                    </div>
					<div class="content">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">عن الفيديو</h3>
								<p>{{ $video->description}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!-- User Profile widget -->
					<div class="widget user">
						<h4>فيديوهات اخري في القناة</h4>
                            @foreach ($video->channel->videos->shuffle()->take(10) as $singleVideo)
                            <li><a href="{{ route('video', [$singleVideo->id]) }}">{{ $singleVideo->title }}</a></li>
                            @endforeach
					</div>
					<!-- Map Widget -->
				</div>
			</div>
			
		</div>
	</div>
	<!-- Container End -->
</section>

@stop
