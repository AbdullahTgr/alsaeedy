<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MV43QJV');</script>
	<!-- End Google Tag Manager -->
	
	@include('frontend.layouts.head')	 

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-46ERGGZ0G3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-46ERGGZ0G3');
</script>




<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
	crossorigin="anonymous"></script>
</head>
<body class="js">

	

	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV43QJV"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->



	<div class="row" style="padding: 0">
		<div class="col-md-12"
		style="
padding: 0;
    position: absolute;
    width: 100%;
    z-index: 1;
    right: 0;
		">
			<div class="d-flex justify-content-between align-items-center breaking-news bg-white">
				<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news" style="
				
				box-shadow: 0px 3px 3px #ddd;
				
				"><span class="d-flex align-items-center" style="width: 120px; text-align:center">&nbsp;اخبار السعدي</span></div>
				<marquee class="news-scroll" behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();"> 
			  
				@foreach($news as $post)
					@if ($post->postcat[0]->{'title-ar'}=="اخبار")
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
					<a href="{{route('blog.detail',$post->slug)}}">{{ $post->{'title-ar'} }}</a> 
						:    {{ $post->postcat[0]->{'title-ar'} }} 
					@endif
				@endforeach
				</marquee>
			</div>
		</div>
	</div>


	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>