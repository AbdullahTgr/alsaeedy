<!DOCTYPE html>
<html lang="en">
<head>

@include('partialsMainTable.head')

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



