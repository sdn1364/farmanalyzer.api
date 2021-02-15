<?php $__env->startSection('breadcrumb'); ?>
    <h3 class="page-title">لیست مزارع</h3>
    <!-- begin::breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست مزارع</li>
        </ol>
    </nav>
    <!-- end::breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($farms->total() > $farms->perPage()): ?>
                    <div class="card-header"><?php echo e($farms->links()); ?></div>
                <?php endif; ?>
                <div class="content">
                    <table class="table" id="dataTable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">مزرعه دار</th>
                            <th scope="col">روز تولد</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">پست الکترونیک</th>
                            <th scope="col">نوع</th>
                            <th scope="col">استان</th>
                            <th scope="col">شهر</th>
                            <th scope="col">نشانی</th>
                            <th scope="col">کارگر</th>
                            <th scope="col">کارشناسان</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th class="text-right" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $farms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration + (($farms->currentPage()-1) * $farms->perPage())); ?></th>
                                <th scope="col"><a href="<?php echo e(route('farm.show',$farm->id)); ?>"><?php echo e($farm->name); ?></a></th>
                                <th scope="col"><?php echo e($farm->name . ' ' . $farm->surname); ?></th>
                                
                                <td><?php echo e($farm->birthday); ?></td>
                                <th scope="col"><?php echo e($farm->phone_number); ?></th>
                                <th scope="col"><?php echo e($farm->email); ?></th>
                                <th scope="col"><?php echo e($farm->type); ?></th>
                                <th scope="col"><?php echo e($farm->province->name); ?></th>
                                <th scope="col"><?php echo e($farm->city->name); ?></th>
                                <th scope="col"><?php echo e($farm->address); ?></th>
                                <th scope="col"><?php echo e(count((array)unserialize($farm->worker)) ?? ''); ?></th>
                                <th scope="col"><?php echo e($farm->expert->name . ' ' . $farm->expert->surname); ?></th>
                                <td><?php echo e(jdate($farm->created_at)->format('y/m/d')); ?></td>
                                <td><?php echo e(jdate($farm->updated_at)->format('y/m/d')); ?></td>
                                <td class="text-right">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('farm.destroy',$farm->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <a href="" class="btn btn-sm  btn-outline-secondary btn-square" data-toggle="modal" data-target="#exampleModalCenter" onclick="getHerds(<?php echo e($farm->id); ?>)">
                                                <i class="fas fa-farm"></i>
                                            </a>
                                            <a href="<?php echo e(route('farm.edit',$farm->id)); ?>" class="btn btn-sm  btn-outline-secondary btn-square">
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">گله‌های مرغداری</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        function getHerds(farmId) {
            axios.get('api/v1/farmHerds/' + farmId).then(
                res => {
                    let herds = res.data;

                    $('.modal-body').append(
                        herds.map((herd ) => {
                            console.log(herd.id);
                            return '<a href="herd/' + herd.id + '" class="btn btn-default">گله شماره ' + herd.herd_number + '</a>'

                        })
                    )
                }
            )
        }
        $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
            $('.modal-body').empty()
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\home work\farm analayzer\api\resources\views/pages/farm/index.blade.php ENDPATH**/ ?>