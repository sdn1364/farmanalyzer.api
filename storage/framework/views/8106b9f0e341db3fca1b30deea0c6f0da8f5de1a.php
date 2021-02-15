<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست آنالیز</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست آنالیز</li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($farm->name); ?></li>
            <li class="breadcrumb-item active" aria-current="page">گله شماره <?php echo e($herd->herd_number); ?></li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">سن گله</th>
                            <th scope="col">تلفات</th>
                            <th scope="col">باقی‌مانده</th>
                            <th scope="col">درصد تلفات</th>
                            <th scope="col">دمای سالن</th>
                            <th scope="col">رطوبت</th>
                            <th scope="col">روشنایی</th>
                            <th scope="col">خاموشی</th>
                            <th scope="col">کل دان مصرفی <small>کیلو</small></th>
                            <th scope="col"><span>دان مصرفی هر سره</span><small>(گرم)</small></th>
                            <th scope="col">میانگین وزن زنده</th>
                            <th scope="col">ضریب تبدیل</th>
                            <th scope="col">نوع واکسن</th>
                            <th scope="col">روش واکسیناسیون</th>
                            <th scope="col">شرکت تولید‌کننده</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $analysises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analysis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($analysis->date == date('Y-m-d')? 'bg-warning':''); ?> ">
                                <td><?php echo e($analysis->current_age); ?></td>
                                <td><?php echo e($analysis->loss); ?></td>
                                <td><?php echo e($herd->quantity - $analysis->loss); ?></td>
                                <td><?php echo e(($herd->quantity - $analysis->loss)*100); ?></td>
                                <td><?php echo e($analysis->temprature); ?></td>
                                <td><?php echo e($analysis->humidity); ?></td>
                                <td><?php echo e($analysis->light_on); ?></td>
                                <td><?php echo e($analysis->light_off); ?></td>
                                <td><?php echo e($analysis->food); ?></td>
                                <td><?php echo e(($analysis->food/$herd->quantity - $analysis->loss)*1000); ?></td>
                                <td><?php echo e($analysis->weight); ?></td>
                                <td><?php echo e($analysis->weight && (($analysis->food/$herd->quantity - $analysis->loss)*1000)/$analysis->weight); ?></td>
                                <td><?php echo e($analysis->vaccine['name']); ?></td>
                                <td><?php echo e($analysis->vaccine_method['name']); ?></td>
                                <td><?php echo e($analysis->vaccine_company['name']); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <a href="<?php echo e(route('analysisEditPage',$analysis->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/pages/analysis/index.blade.php ENDPATH**/ ?>