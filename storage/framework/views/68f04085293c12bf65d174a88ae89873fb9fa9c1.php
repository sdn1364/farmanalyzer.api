<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست گله‌ها</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست گله‌ها</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($herds->total() > $herds->perPage()): ?>
                    <div class="card-header"><?php echo e($herds->links()); ?></div>
                <?php endif; ?>
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">شماره گله</th>
                            <th scope="col">مرغداری</th>
                            <th scope="col">تاریخ شروع</th>
                            <th scope="col">سن گله</th>
                            <th scope="col">تعداد جوجه</th>
                            <th scope="col">مساحت سالن</th>
                            <th scope="col">ظرفیت سالن</th>
                            <th scope="col">تراکم جوجه(مترمربع)</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $herds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $herd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($loop->iteration + (($herds->currentPage()-1) * $herds->perPage())); ?></td>
                                <td><?php echo e($herd->herd_number); ?></td>
                                <td><?php echo e($herd->farm->name); ?></td>
                                <td><?php echo e($herd->start_date); ?></td>
                                <td><?php echo e($herd->age); ?></td>
                                <td><?php echo e($herd->quantity); ?></td>
                                <td><?php echo e($herd->saloon_area); ?></td>
                                <td><?php echo e($herd->capacity); ?></td>
                                <td><?php echo e($herd->quantity/$herd->saloon_area); ?></td>
                                <td><?php echo e(jdate($herd->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($herd->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('herd.destroy',$herd->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="<?php echo e(route('analysisPage',[$herd->farm_id,$herd->id])); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
                                                <i class="fas fa-th"></i>
                                            </a>
                                            <a href="<?php echo e(route('herd.edit',$herd->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/pages/herd/index.blade.php ENDPATH**/ ?>