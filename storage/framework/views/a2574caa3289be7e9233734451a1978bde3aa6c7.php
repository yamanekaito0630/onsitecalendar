<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4><?php echo e($date); ?></h4>
        </div>
        <h2><?php echo e($onsite[0]->name); ?><br>（<?php echo e($number); ?>人）</h2>
        <ul class="list-group">
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <?php echo e($member['name']); ?>

                    <?php if($member['oneday_flag'] != true): ?>
                        （半日）
                    <?php else: ?>
                        （一日）
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/admins/member_list.blade.php ENDPATH**/ ?>