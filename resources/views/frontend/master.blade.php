<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    {{-- vue js --}}
    @vite(['resources/js/app.js'])

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('public/frontend/images/icon.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/tooltipster.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <!-- end inject -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>
<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
    @include('frontend.body.header')
<!--======================================
        END HEADER AREA
======================================-->

@yield('home')

<!-- ================================
         END FOOTER AREA
================================= -->
@include('frontend.body.footer')
<!-- ================================
          END FOOTER AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="la la-arrow-up" title="Go top"></i>
</div>
<!-- end scroll top -->



<!-- template js files -->
<script src="{{ asset('public/frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/isotope.js') }}"></script>
<script src="{{ asset('public/frontend/js/waypoint.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('public/frontend/js/datedropper.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/emojionearea.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/tooltipster.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/plyr.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/main.js') }}"></script>

<script>
    var player = new Plyr('#player');
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@include('frontend.body.script')

</body>
</html>
