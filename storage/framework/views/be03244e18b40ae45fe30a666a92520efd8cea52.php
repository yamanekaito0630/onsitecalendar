<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">グループ作成画面</h2>

        <?php if( !empty($error_message) ): ?>
            <!-- エラーメッセージの表示 -->
            <p class="error-message text-danger"><?php echo e($error_message); ?></p>
        <?php endif; ?>

        <form action="<?php echo e(route('store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="create" value="<?php echo e(true); ?>">
            <div class="mb-3">
                <label for="group-name" class="form-label">グループ名<span class="required">必須</span></label>
                <input type="text" name="group_name" value="<?php echo e(!empty($group_name) ? $group_name : ''); ?>" class="form-control" id="group-name" autofocus required>
            </div>
            <div class="mb-3">
                <label for="watchword" class="form-label">参加時の合言葉<span class="required">必須</span></label>
                <input type="text" name="watchword" class="form-control" id="watchword" required>
            </div>
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/users/create_group.blade.php ENDPATH**/ ?>