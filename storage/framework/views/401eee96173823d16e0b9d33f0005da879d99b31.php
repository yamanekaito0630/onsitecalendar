<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">グループ参加画面</h2>

        <?php if(!empty($group)): ?>
            <form action="<?php echo e(route('store')); ?>" method="post" class="mb-3">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="join" value="<?php echo e(true); ?>">
                <input type="hidden" name="group-id" value="<?php echo e($group->id); ?>">
                <button type="submit"><?php echo e($group->name); ?></button>
            </form>
        <?php endif; ?>

        <?php if(!empty($error_message)): ?>
            <p class="text-danger"><?php echo e($error_message); ?></p>
        <?php endif; ?>

        <form action="<?php echo e(route('show')); ?>" method="get">
            <div class="mb-3">
                <label for="watchword" class="form-label">合言葉</label>
                <input type="text" name="watchword" value="<?php echo e(!empty($watchword) ? $watchword : ''); ?>" class="form-control" id="watchword" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary">検索する</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/users/join_group.blade.php ENDPATH**/ ?>