<?php $__env->startSection('content'); ?>
    <input type="hidden" id="admin" value="true">
    <input type="hidden" id="id" value="<?php echo e($group->id); ?>">
    <div class="w-100 mx-auto pt-5 calendar">
        <div id='calendar'></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/mypage.blade.php ENDPATH**/ ?>