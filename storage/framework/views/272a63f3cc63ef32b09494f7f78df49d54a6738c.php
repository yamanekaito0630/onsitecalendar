<?php $__env->startSection('content'); ?>
    <h3 class="text-center mt-2">検索結果：<?php echo e($target->name); ?></h3>
    <input type="hidden" id="member-id" value="<?php echo e($target->id); ?>">
    <input type="hidden" id="admin" value="true">
    <input type="hidden" id="id" value="<?php echo e($group->id); ?>">
    <div class="w-100 mx-auto pt-2 calendar">
        <div id='calendar'></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/search_member.blade.php ENDPATH**/ ?>