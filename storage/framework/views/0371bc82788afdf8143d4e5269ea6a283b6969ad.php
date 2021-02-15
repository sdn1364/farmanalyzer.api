        <?php $__env->startSection('breadcrumb'); ?>
            <h3 class="page-title">لیست استانها</h3>
            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست استانها</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->
        <?php $__env->stopSection(); ?>
        
            <?php $__env->startSection("content"); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php if($provinces->total() > $provinces->perPage()): ?>
                                <div class="card-header"><?php echo e($provinces->links()); ?></div>
                            <?php endif; ?>
                            <div class="content">
                                <table class="table" id="dataTable">
                                    <thead>
                                    <tr>
                                    <th scope="col">#</th><th scope="col">نام</th><th scope="col">تاریخ ایجاد</th><th scope="col">تاریخ ویرایش</th><th class="text-right" scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <tr>
                                            <th scope="row"><?php echo e($loop->iteration + (($provinces->currentPage()-1) * $provinces->perPage())); ?></th><th scope="col"><?php echo e($province->name); ?></th><td><?php echo e(jdate($province->created_at)->format('y/m/d')); ?></td><td><?php echo e(jdate($province->updated_at)->format('y/m/d')); ?></td><td class="text-right">
                            <div class="col-md-12">
                                <form action="<?php echo e(route('province.destroy',$province->id)); ?>" method="post">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <a href="<?php echo e(route('province.edit',$province->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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
        
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/pages/province/index.blade.php ENDPATH**/ ?>