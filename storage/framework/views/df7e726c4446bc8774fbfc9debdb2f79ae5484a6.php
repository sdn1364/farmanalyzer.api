<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست کشاورزان</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کشاورزان</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($farmers->total() > $farmers->perPage()): ?>
                    <div class="card-header"><?php echo e($farmers->links()); ?></div>
                <?php endif; ?>
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">نام خانوادگی</th>
                            <th scope="col">روز تولد</th>
                            <th scope="col">تحصیلات</th>
                            <th scope="col">جنسیت</th>
                            <th scope="col">تجربه کاری</th>
                            <th scope="col">شهر</th>
                            <th scope="col">استان</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $farmers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farmer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration + (($farmers->currentPage()-1) * $farmers->perPage())); ?></th>
                                <th scope="col"><?php echo e($farmer->name); ?></th>
                                <th scope="col"><?php echo e($farmer->surname); ?></th>

                                <td><?php echo e($farmer->birthday); ?></td>
                                <th scope="col"><?php echo e($farmer->education); ?></th>
                                <th scope="col"><?php echo e($farmer->gender); ?></th>
                                <th scope="col"><?php echo e($farmer->work_experience); ?></th>
                                <th scope="col"><?php echo e($farmer->city->name); ?></th>
                                <th scope="col"><?php echo e($farmer->province->name); ?></th>
                                <td><?php echo e(jdate($farmer->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($farmer->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('farmer.destroy',$farmer->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e(route('farmer.edit',$farmer->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-outline-secondary btn-square">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\home work\farm analayzer\api\resources\views/pages/farmer/index.blade.php ENDPATH**/ ?>