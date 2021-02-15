<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست متد‌های واکسیناسیون</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست متد‌های واکسیناسیون</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($vaccine_methods->total() > $vaccine_methods->perPage()): ?>
                    <div class="card-header"><?php echo e($vaccine_methods->links()); ?></div>
                <?php endif; ?>
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">تاریخ ویرایش</th>
                                <th class="text-right" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $vaccine_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration + (($vaccine_methods->currentPage()-1) * $vaccine_methods->perPage())); ?></td>
                                <td><?php echo e($vaccine_method->name); ?></td>
                                <td><?php echo e(jdate($vaccine_method->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($vaccine_method->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('vaccine_method.destroy',$vaccine_method->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e(route('vaccine_method.edit',$vaccine_method->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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
                <?php if($vaccine_methods->total() > $vaccine_methods->perPage()): ?>
                    <div class="card-footer"><?php echo e($vaccine_methods->links()); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/pages/vaccine_method/index.blade.php ENDPATH**/ ?>