<?php
    use Illuminate\Support\Facades\Config;
$menus = Config::get('menu');
?>
<!-- begin::navigation -->
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e(Str::contains($menu['link'],request()->segment(1)) ? 'active': ''); ?>" data-toggle="tooltip" title="<?php echo e($menu['title']); ?>">
                    <a href="#navigation<?php echo e(Str::ucfirst($menu['name'])); ?>">
                        <i class="icon <?php echo e($menu['icon']); ?>"></i>
                        
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="نوتیفیکیشن" class="<?php echo e(request()->segment(1) === 'notification' ? 'active': ''); ?>">
                <a href="#navigation-notification">
                    <i class="icon fad fa-envelope"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#navigation-users">
                    <i class="icon fad fa-user"></i>
                </a>
            </li>

            <li data-toggle="tooltip" title="خروج">
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="icon fad fa-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">

        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul id="navigation<?php echo e(Str::ucfirst($menu['name'])); ?>" class="<?php echo e(Str::contains($menu['link'],request()->segment(1)) ? 'navigation-active': ''); ?>">
                    <?php $__currentLoopData = $menu['body']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($mb['type'] === 'title'): ?>
                            <?php if($loop->first): ?>
                                <li class="navigation-divider"><?php echo e($menu['title']); ?></li>
                            <?php else: ?>
                                <li class="navigation-divider"><?php echo e($mb['name']); ?></li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($mb['type'] === 'link'): ?>
                            <li><a class="<?php echo e(request()->segment(1) == $mb['title'] ? 'active': ''); ?>" href="<?php echo e($mb['link']); ?>"><?php echo e($mb['name']); ?></a></li>
                        <?php endif; ?>
                        <?php if($mb['type'] === 'sub'): ?>
                            <li class="<?php echo e(request()->segment(1) == $mb['title'] ? 'open': ''); ?>">
                                <a href="#"><?php echo e($mb['name']); ?></a>
                                <ul>
                                    <?php $__currentLoopData = $mb['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mbs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a class="<?php echo e(request()->path() == $mbs['title'] ? 'active': ''); ?>" href="<?php echo e(route($mbs['link'])); ?>"><?php echo e($mbs['name']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <ul id="navigation-notification" class="<?php echo e(request()->segment(1) === 'notification' ? 'navigation-active': ''); ?>">
            <li class="navigation-divider">نوتیفیکیشن</li>
            <li class="<?php echo e(request()->segment(1) == 'users' ? 'open': ''); ?>">
                <a class="<?php echo e(request()->segment(1) == 'user' ? 'open': ''); ?>" href="#">نوتیفیکیشن‌ها</a>
                <ul>
                    <li><a class="<?php echo e(request()->path() == '/notification/' ? 'active': ''); ?>" href="<?php echo e(route('notification.index')); ?>">لیست پیام‌ها</a></li>
                    <li><a class="<?php echo e(request()->path() == '/notification/create' ? 'active': ''); ?>" href="<?php echo e(route('notification.create')); ?>">پیام جدید</a></li>
                </ul>
            </li>
        </ul>

        <ul id="navigation-users" class="<?php echo e(request()->segment(1) === 'user' ? 'navigation-active': ''); ?>" >
            <li class="navigation-divider">کاربران</li>
            <li class="<?php echo e(request()->segment(1) == 'user' ? 'open': ''); ?>">
                <a href="#">کابران</a>
                <ul>
                    <li><a class="<?php echo e(request()->path() == '/user/' ? 'active': ''); ?>" href="<?php echo e(route('user.index')); ?>">لیست کاربران</a></li>
                    <li><a class="<?php echo e(request()->path() == '/user/create' ? 'active': ''); ?>" href="<?php echo e(route('user.create')); ?>">کاربر جدید</a></li>
                </ul>
            </li>
            <li class="<?php echo e(request()->segment(1) == 'users' ? 'open': ''); ?>">
                <a href="#">دسترسی‌ها</a>
                <ul>
                    <li><a class="" href="">لیست دسترسی‌ها</a></li>
                    <li><a class="" href="">دسترسی جدید</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end::navigation -->
<form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>
<?php /**PATH C:\Users\Soheyl Delshad\Desktop\home work\farm analayzer\api\resources\views/components/navigation.blade.php ENDPATH**/ ?>