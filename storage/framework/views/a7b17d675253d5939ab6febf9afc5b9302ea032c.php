<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">کشاورز جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('farmer.index')); ?>">لیست کشاورزان</a></li>
            <li class="breadcrumb-item active" aria-current="page">کشاورز جدید</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('farmer.store')); ?>" method="post" class="needs-validation" novalidate="">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                        </div>
                        <div class="form-group">
                            <label for="">نام خانوادگی</label>
                            <input type="text" name="surname" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                        </div>
                        <div class="form-group">
                            <label for="">روز تولد</label>
                            <input type="text" name="birthday" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                        </div>
                        <div class="form-group">
                            <label for="">تحصیلات</label>
                            <select name="education" class="form-control" id="">
                                <option value="دیپلم">دیپلم</option>
                                <option value="کاردانی">کاردانی</option>
                                <option value="کارشناسی">کارشناسی</option>
                                <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                <option value="دکترا">دکترا</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="male">
                                <label class="custom-control-label" for="customRadioInline1">مرد</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="female">
                                <label class="custom-control-label" for="customRadioInline2">زن</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">تجربه کاری</label>
                            <input type="text" name="work_experience" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                        </div>
                        <div class="form-group">
                            <label for="">شهر</label>
                            <select name="city_id" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">استان</label>
                            <select name="province_id" id="" class="form-control" placeholder="" aria-describedby="helpId" required="">
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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

<?php $__env->startSection('styles'); ?>
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/datepicker-jalali/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/datepicker/daterangepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('vendors/datepicker-jalali/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datepicker/daterangepicker.js')); ?>"></script>
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
    <script>
        $(document).ready(function () {
            $('input[name="birthday"]').datepicker({
                dateFormat: "yy/mm/dd",
                showOtherMonths: true,
                selectOtherMonths: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "c-60",
                showButtonPanel: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\home work\farm analayzer\api\resources\views/pages/farmer/create.blade.php ENDPATH**/ ?>