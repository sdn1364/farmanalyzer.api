<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فارم آنالایزر |‌ کنترل پنل</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/media/image/favicon-96x96.png')); ?>">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/bundle.css')); ?>" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>" type="text/css">
</head>

<body class="form-membership">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<div class="form-wrapper">

    <!-- logo -->
        <img class="mb-5" src="<?php echo e(asset('assets/media/svg/dcLogo.svg')); ?>" width="180" alt="image">

    <!-- ./ logo -->

    <?php echo $__env->yieldContent('content'); ?>


</div>

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- App scripts -->
<script src="assets/js/app.js"></script>
</body>

</html>
<?php /**PATH D:\home work\farm analayzer\api\resources\views/layouts/app.blade.php ENDPATH**/ ?>