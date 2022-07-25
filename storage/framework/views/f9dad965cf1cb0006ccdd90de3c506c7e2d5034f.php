<?php $__env->startSection('content'); ?>
    <div class="mx-3">
        <h2 class="mb-4">どのグループに参加しますか？</h2>
        <ul class="list-group w-75">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_id => $group_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><a href="<?php echo e(route('group.mypage', $group_id)); ?>"><?php echo e($group_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.group_search_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/group.blade.php ENDPATH**/ ?>