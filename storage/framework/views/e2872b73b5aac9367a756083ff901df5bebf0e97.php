<?php $__env->startSection('content'); ?>
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <h4><?php echo e($res); ?></h4>
        </div>
        <h2><?php echo e($onsite[0]->name); ?>（<?php echo e($number); ?>人）</h2>
        <ul class="list-group w-75">
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><?php echo e($member['name']); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/member_list.blade.php ENDPATH**/ ?>
