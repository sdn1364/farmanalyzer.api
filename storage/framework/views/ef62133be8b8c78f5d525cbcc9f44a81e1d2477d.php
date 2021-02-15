<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فارم آنالایزر | کنترل پنل</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/media/image/favicon-96x96.png')); ?>">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/bundle.css')); ?>" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/datepicker/daterangepicker.css')); ?>">

    <!-- Slick -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/slick/slick-theme.css')); ?>">

    <!-- Vmap -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/vmap/jqvmap.min.css')); ?>">

<?php echo $__env->yieldContent('styles'); ?>

<!-- App styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>" type="text/css">

</head>

<body class="">

<?php echo $__env->make('components.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- begin::main content -->
<main class="main-content">
    <?php echo $__env->make('flashMassages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="<?php echo e(asset('vendors/bundle.js')); ?>"></script>

<!-- Chartjs -->
<script src="<?php echo e(asset('vendors/charts/chartjs/chart.min.js')); ?>"></script>

<!-- Circle progress -->
<script src="<?php echo e(asset('vendors/circle-progress/circle-progress.min.js')); ?>"></script>

<!-- Peity -->
<script src="<?php echo e(asset('vendors/charts/peity/jquery.peity.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/examples/charts/peity.js')); ?>"></script>

<!-- Datepicker -->
<script src="<?php echo e(asset('vendors/datepicker/daterangepicker.js')); ?>"></script>

<!-- Slick -->
<script src="<?php echo e(asset('vendors/slick/slick.min.js')); ?>"></script>

<!-- Vamp -->
<script src="<?php echo e(asset('vendors/vmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/vmap/maps/jquery.vmap.usa.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/examples/vmap.js')); ?>"></script>

<!-- Dashboard scripts -->
<script src="<?php echo e(asset('assets/js/examples/dashboard.js')); ?>"></script>
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

<?php echo $__env->yieldContent('scripts'); ?>
<!-- App scripts -->
<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\home work\farm analayzer\api\resources\views/master.blade.php ENDPATH**/ ?>