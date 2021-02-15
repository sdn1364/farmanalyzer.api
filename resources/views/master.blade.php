<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فارم آنالایزر | کنترل پنل</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon-96x96.png')}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}">

    <!-- Slick -->
    <link rel="stylesheet" href="{{asset('vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/slick/slick-theme.css')}}">

    <!-- Vmap -->
    <link rel="stylesheet" href="{{asset('vendors/vmap/jqvmap.min.css')}}">

@yield('styles')

<!-- App styles -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">

</head>

<body class="">

@include('components.loader')
@include('components.sidebar')
@include('components.navigation')
@include('components.header')

<!-- begin::main content -->
<main class="main-content">
    @include('flashMassages')
    @yield('content')
</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="{{asset('vendors/bundle.js')}}"></script>

<!-- Chartjs -->
<script src="{{asset('vendors/charts/chartjs/chart.min.js')}}"></script>

<!-- Circle progress -->
<script src="{{asset('vendors/circle-progress/circle-progress.min.js')}}"></script>

<!-- Peity -->
<script src="{{asset('vendors/charts/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/js/examples/charts/peity.js')}}"></script>

<!-- Datepicker -->
<script src="{{asset('vendors/datepicker/daterangepicker.js')}}"></script>

<!-- Slick -->
<script src="{{asset('vendors/slick/slick.min.js')}}"></script>

<!-- Vamp -->
<script src="{{asset('vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('assets/js/examples/vmap.js')}}"></script>

<!-- Dashboard scripts -->
<script src="{{asset('assets/js/examples/dashboard.js')}}"></script>
<div class="colors">
    <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>
{{--<script>
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        $('body').toggleClass('dark');
    }
</script>--}}
@yield('scripts')
<!-- App scripts -->
<script src="{{asset('assets/js/app.js')}}"></script>
</body>

</html>
