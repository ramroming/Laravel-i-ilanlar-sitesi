<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inspired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/admin/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{asset('assets')}}/admin/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/assets/extra-libs/multicheck/multicheck.css">
    <link href="{{asset('assets')}}/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets')}}/admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<![endif]-->
    @yield('css')
    @yield('javascript')

</head>
<body>
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->

@include('admin._header')
@include('admin._sidebar')
<!-- Page wrapper  -->

{{--    added style to page wrapper to make page go all the way down--}}
<div class="page-wrapper" style="min-height:100vh">

@section('content')
@show

@include('admin._footer')
@yield('footer')

</body>
</html>
