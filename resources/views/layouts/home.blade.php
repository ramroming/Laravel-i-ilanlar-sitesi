<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="reem" />
    <link rel="shortcut icon" href="{{ asset('assets')}}/ftco-32x32.png">

    <link rel="stylesheet" href="{{asset('assets')}}/css/custom-bs.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/fonts/line-icons/style.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

{{--    from new template!!!!!!!!!!!!--}}
<!-- Vendor CSS Files -->
    <link href="{{asset('assets')}}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('assets')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('assets')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('assets')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{asset('assets')}}/assets/css/style.css" rel="stylesheet">

{{--      took it for the gallery thing --}}
    <link rel="stylesheet" href="{{asset('assets')}}/assets/css/quill.snow.css">

{{--    set icon on tab  --}}
    <link rel="icon" href="{{asset('assets')}}/images/logo-search.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
    @yield('javascript')
<style>
    .my-font{
        font-family: "Nunito", sans-serif;
    }


    .single-carousel .owl-dots{
        position:static !important;
    }
    .owl-dots {display: block !important;
    }
    .owl-dots .owl-dot { display: inline-block;
        }

    .single-carousel .owl-dots .owl-dot.active > span{
        background-color:blue!important;
    }
</style>

</head>
<body class="my-font" id="top">

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-secondary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="site-wrap">
@include('home._header')

@section('content')
@show

@include('home._footer')

</div>
</body>
</html>
