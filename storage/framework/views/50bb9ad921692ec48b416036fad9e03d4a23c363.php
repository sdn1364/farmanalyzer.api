<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست واکسن ها</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست واکسن ها</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($vaccines->total() > $vaccines->perPage()): ?>
                    <div class="card-header"><?php echo e($vaccines->links()); ?></div>
                <?php endif; ?>
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">دسته‌بندی واکسن</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $vaccines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($loop->iteration + (($vaccines->currentPage()-1) * $vaccines->perPage())); ?></td>
                                <td scope="col"><?php echo e($vaccine->name); ?></td>
                                <td scope="col"><?php echo e($vaccine->vaccine_category->name); ?></td>
                                <td><?php echo e(jdate($vaccine->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($vaccine->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('vaccine.destroy',$vaccine->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e(route('vaccine.edit',$vaccine->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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
                <?php if($vaccines->total() > $vaccines->perPage()): ?>
                    <div class="card-footer"><?php echo e($vaccines->links()); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\home work\farm analayzer\api\resources\views/pages/vaccine/index.blade.php ENDPATH**/ ?>