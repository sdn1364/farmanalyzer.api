<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست کارگران</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کارگران</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($workers->total() > $workers->perPage()): ?>
                    <div class="card-header"><?php echo e($workers->links()); ?></div>
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
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $workers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $worker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration + (($workers->currentPage()-1) * $workers->perPage())); ?></th>
                                <th scope="col"><?php echo e($worker->name); ?></th>
                                <th scope="col"><?php echo e($worker->surname); ?></th>

                                <td><?php echo e($worker->birthday); ?></td>
                                <th scope="col"><?php echo e($worker->education); ?></th>
                                <th scope="col"><?php echo e($worker->gender); ?></th>
                                <th scope="col"><?php echo e($worker->work_experience); ?></th>
                                <th scope="col"><?php echo e($worker->phone_number); ?></th>
                                <td><?php echo e(jdate($worker->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($worker->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('worker.destroy',$worker->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e(route('worker.edit',$worker->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\home work\farm analayzer\api\resources\views/pages/worker/index.blade.php ENDPATH**/ ?>