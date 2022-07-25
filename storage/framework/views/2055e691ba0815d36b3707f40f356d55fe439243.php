<?php $__env->startSection('content'); ?>
    <div class="w-75 mx-4">
        <h2 class="mb-4">管理者ログイン画面</h2>
        <form action="<?php echo e(route('admin.check', $group[0]->id)); ?>" method="get">
            <div class="mb-3">
                <label for="admin-address" class="form-label">管理者ID</label>
                <input type="text" name="admin-address" class="form-control" id="admin-address" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="admin-password" class="form-label">管理者パスワード</label>
                <input type="password" name="admin-password" class="form-control" id="admin-password" required>
            </div>
            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('groups.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/admin_login.blade.php ENDPATH**/ ?>