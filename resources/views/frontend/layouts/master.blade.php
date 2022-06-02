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



	 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9802244405698113"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-9802244405698113"
     data-ad-slot="3147762078"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
	 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9802244405698113"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="+1e+qc+6f-hc+i"
     data-ad-client="ca-pub-9802244405698113"
     data-ad-slot="3819019372"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

</head>
<body class="js">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV43QJV"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	{{-- <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner" style="left: 45%;">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>    dfgsdg,dfsgdfg,dfgdfgdfg,dfg
	<!-- End Preloader --> --}}
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>