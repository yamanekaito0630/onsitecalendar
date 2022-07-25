<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">日当履歴（<?php echo e($member->name); ?>）</h2>
        <ul class="list-group w-75">
            <?php $__currentLoopData = $daily_allowances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daily_allowance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between">
                    <p class="my-auto"><?php echo e($daily_allowance['salary']); ?>円</p>
                    <p class="my-auto"><?php echo e(str_replace('-', '/', $daily_allowance['start_date'])); ?>~</p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/admins/daily_allowance_history.blade.php ENDPATH**/ ?>