<?php $__env->startSection('content'); ?>
    <div class="w-75 mx-4">
        <h2 class="mb-4">グループ作成画面</h2>

        <?php if( !empty($error_message) ): ?>
        <!-- エラーメッセージの表示 -->
            <p class="error-message text-danger"><?php echo e($error_message); ?></p>
        <?php endif; ?>

        <form action="<?php echo e(route('group.store', $group[0]->id)); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="mb-3">
                <label for="group-name" class="form-label">グループ名<span class="required">必須</span></label>
                <input type="text" name="group_name" value="<?php echo e(!empty($group_name) ? $group_name : ''); ?>" class="form-control" id="group-name" autofocus required>
            </div>
            <div class="mb-3">
                <label for="group-id" class="form-label">グループID<span class="required">必須</span></label>
                <input type="text" name="group_address"value="<?php echo e(!empty($group_address) ? $group_address : ''); ?>" class="form-control" id="group-id" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="group-password" class="form-label">グループパスワード<span class="required">必須</span></label>
                <input type="password" name="group_password" class="form-control" id="group-password" required>
            </div>
            <div class="mb-3">
                <label for="group-password-check" class="form-label">グループパスワード確認用<span class="required">必須</span></label>
                <input type="password" name="group_password_check" class="form-control" id="group-password-check" required>
            </div>
            <div class="mb-3">
                <label for="admin-id" class="form-label">管理者ID<span class="required">必須</span></label>
                <input type="text" name="admin_address"value="<?php echo e(!empty($admin_address) ? $admin_address : ''); ?>" class="form-control" id="admin-id" required>
            </div>
            <div class="mb-3">
                <label for="admin-password" class="form-label">管理者パスワード<span class="required">必須</span></label>
                <input type="password" name="admin_password" class="form-control" id="admin-password" required>
            </div>
            <div class="mb-3">
                <label for="admin-password-check" class="form-label">管理者パスワード確認用<span class="required">必須</span></label>
                <input type="password" name="admin_password_check" class="form-control" id="admin-password-check" required>
            </div>
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('groups.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/create_group.blade.php ENDPATH**/ ?>