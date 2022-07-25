<?php $__env->startSection('content'); ?>
    <div class="box mx-auto pt-4  bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded text-center">
        <h3>管理者ログイン画面</h3>
        <form action="<?php echo e(route('admin.my-page', $group->id)); ?>" method="get" class="my-4 text-center">
            <?php if(!$is_admin): ?>
                <p class="text-danger">※管理者権限がありません。</p>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary" <?php echo e($is_admin ? '' : 'disabled'); ?>><?php echo e($group->name); ?>の管理者としてログイン</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('groups.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/group.blade.php ENDPATH**/ ?>