<!DOCTYPE html>
<html lang="zxx">
<head>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
	crossorigin="anonymous"></script>
	
	@include('frontend.layouts.head')	 


	

</head>
<body class="js">

	
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>