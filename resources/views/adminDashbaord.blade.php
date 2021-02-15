<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drivers Club! | Admin Panel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon-96x96.png')}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">


    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">

</head>

<body class="">

<div class="container align-items-center flex-column justify-content-center">
    <div class="row">
        <div class="col col-md-4 offset-md-4 text-center">
            <img src="{{asset('assets/media/svg/dcLogo.svg')}}" width="300" alt="">

        </div>
    </div>
    <div class="row">
        <div class="col col-md-6 offset-md-3 text-center mt-5 mb-5">
            <h3>به کنترل پنل اپلیکیشن باشگاه رانندگان خوش آمدید</h3>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-8 offset-md-2 text-center ">
            <a href="#" class="btn btn-default"><img class="border-radius-1" src="{{asset('assets/media/svg/blog.svg')}}" width="128" alt=""></a>
            <a href="#" class="btn btn-default disabled"><img class="border-radius-1" src="{{asset('assets/media/svg/webapp.svg')}}" width="128" alt=""></a>
            <a href="#" class="btn btn-default disabled"><img class="border-radius-1" src="{{asset('assets/media/svg/radioSnapp.svg')}}" width="128" alt=""></a>
            <a href="{{route('sellsDashboard')}}" class="btn btn-default "><img class="border-radius-1" src="{{asset('assets/media/svg/weekly.svg')}}" width="128" alt=""></a>
        </div>
    </div>
</div>


</body>

</html>
