<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">متد واکسن جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('vaccine_method.index')); ?>">لیست متد‌های واکسیناسیون</a></li>
            <li class="breadcrumb-item active" aria-current="page">متد واکسن جدید</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('vaccine_method.store')); ?>" method="post" class="needs-validation" novalidate="">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="">نام روش</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="ذخیره"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        //  Form Validation
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/pages/vaccine_method/create.blade.php ENDPATH**/ ?>