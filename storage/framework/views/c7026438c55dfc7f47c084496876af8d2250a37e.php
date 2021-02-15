<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">مرغداری جدید</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('farm.index')); ?>">لیست مرغداری‌ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">مرغداری جدید</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('farm.store')); ?>" method="post" class="needs-validation" novalidate="">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="">نام</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">مزرعه دار</label>
                            <select name="farmer_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php $__currentLoopData = $farmers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farmer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($farmer->id); ?>"><?php echo e($farmer->name.' '.$farmer->surname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">روز تولد</label>
                            <input type="text" name="birthday" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">شماره تلفن</label>
                            <input type="text" name="phone_number" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">پست الکترونیک</label>
                            <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">نوع</label>
                            <input type="text" name="type" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">استان</label>
                            <select name="province_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">شهر</label>
                            <select name="city_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">نشانی</label>
                            <input type="text" name="address" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">لوکیشن</label>
                            <input type="text" name="gmap" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">کارگران</label>
                            <select multiple="multiple" size="10" name="selectedWorkers[]" class="form-control">
                                <?php $__currentLoopData = $workers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $worker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($worker->id); ?>"><?php echo e($worker->name.' '.$worker->surname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">کارشناس</label>
                            <select name="expert_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php $__currentLoopData = $experts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($expert->id); ?>"><?php echo e($expert->name. ' ' . $expert->surname); ?></option>
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
    <link rel="stylesheet" href="<?php echo e(asset('vendors/dual-list/bootstrap-duallistbox.min.css')); ?>">
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
    <script src="<?php echo e(asset('vendors/dual-list/jquery.bootstrap-duallistbox.js')); ?>"></script>
    <script>
        var demo1 = $('select[name="selectedWorkers[]"]').bootstrapDualListbox();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\home work\farm analayzer\api\resources\views/pages/farm/create.blade.php ENDPATH**/ ?>