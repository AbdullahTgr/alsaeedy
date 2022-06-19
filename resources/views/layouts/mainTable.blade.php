<!DOCTYPE html>
<html lang="en">
<head>

  	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MV43QJV');</script>
	<!-- End Google Tag Manager -->
  
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')
  <title>الفيديوهات</title>


  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />

  
  <!-- CUSTOM CSS -->
  <link href="/css/style.css" rel="stylesheet">
  <!-- FAVICON -->
  <link href="/img/favicon.png" rel="shortcut icon">
    
  @yield('header_v')


  
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
	<!-- Google Tag Manager (noscript) -->


</head>

<body class="body-wrapper">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV43QJV"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

@include('partialsMainTable.topbar')

@yield('content')

@include('partialsMainTable.footer')

</body>
</html> 



