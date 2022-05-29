<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')	 

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-46ERGGZ0G3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-46ERGGZ0G3');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9802244405698113"
     crossorigin="anonymous"></script>
</head>
<body class="js">
	
	{{-- <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner" style="left: 45%;">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader --> --}}
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>