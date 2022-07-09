{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.video-list-thumbs{
    padding-bottom: 15px;
}
.video-list-thumbs > li{
    margin-bottom:12px;
}
.video-list-thumbs > li:last-child{}
.video-list-thumbs > li > a{
    display: block;
    position: relative;
    background-color: #d1ffdb;
    color: #262324;
    padding: 8px;
    border: 1px solid #dfdfdf;
    border-radius: 3px transition: all 500ms ease-in-out;
    border-radius: 4px;
}
.video-list-thumbs > li > a:hover{
	box-shadow:0 2px 5px rgba(0,0,0,.3);
	text-decoration:none
}
.video-list-thumbs h2{
    font-size: 12px;
        color: black;
}
.video-list-thumbs .glyphicon-play-circle{
    font-size: 60px;
    opacity: 0.6;
    position: absolute;
    right: 39%;
    top: 31%;
    text-shadow: 0 1px 3px rgba(0,0,0,.5);
    transition:all 500ms ease-in-out;
}
.video-list-thumbs > li > a:hover .glyphicon-play-circle{
	color:black;
	opacity:1;
	text-shadow:0 1px 3px rgba(0,0,0,.8);
}
.video-list-thumbs .duration{
	background-color: rgba(0, 0, 0, 0.4);
	border-radius: 2px;
	color: black;
	font-size: 11px;
	font-weight: bold;
	left: 12px;
	line-height: 13px;
	padding: 2px 3px 1px;
	position: absolute;
	top: 12px;
    transition:all 500ms ease;
}
.video-list-thumbs > li > a:hover .duration{
	background-color:#000;
}
@media (min-width:320px) and (max-width: 480px) { 
	.video-list-thumbs .glyphicon-play-circle{
    font-size: 35px;
    right: 36%;
    top: 27%;
	}
	.video-list-thumbs h2{
		font-size: 12px;
        color: rgb(0, 0, 0);
	}
}

</style>

<div class="container">

<p>
    <h3 style="
    padding: 21px 0;
    text-align: right;
    ">الاكثر مشاهدة</h3>

    

</p>

<ul class="list-unstyled video-list-thumbs row">




    @foreach ($videos as $video)

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


   	<li class="col-lg-3 col-sm-4 col-xs-6">
		<a href="{{route('video.detail',$video->slug)}}" title="Claudio Bravo, antes su debut con el Barça en la Liga">
            
            
			<img src="https://i.ytimg.com/vi_webp/{{ $ur   }}/sddefault.webp" alt="Barca" class="img-responsive" height="130px" />
			<h2> {{$video->{'title-ar'} }}</h2><div><i class="fa fa-eye"></i> {{ intval($video->{'description-fr'}) }} </div>

			<span class="glyphicon glyphicon-play-circle"></span>
			<span class="duration">03:15</span>
		</a>
	</li>     
    @endforeach

    
</ul>

</div>
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