<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست دسته های واکسن</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست دسته های واکسن</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($vaccine_categories->total() > $vaccine_categories->perPage()): ?>
                    <div class="card-header"><?php echo e($vaccine_categories->links()); ?></div>
                <?php endif; ?>
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">تاریخ ویرایش</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $vaccine_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration + (($vaccine_categories->currentPage()-1) * $vaccine_categories->perPage())); ?></td>
                                <td><?php echo e($vaccine_category->name); ?></td>
                                <td><?php echo e(jdate($vaccine_category->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($vaccine_category->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('vaccine_category.destroy',$vaccine_category->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e(route('vaccine_category.edit',$vaccine_category->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/pages/vaccine_category/index.blade.php ENDPATH**/ ?>