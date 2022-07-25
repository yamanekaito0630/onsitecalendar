<?php $__env->startSection('content'); ?>
    <div class="w-75 mx-4">
        <h2 class="mb-4">グループ作成画面</h2>
        <form>
            <div class="mb-3">
                <label for="group-name" class="form-label">グループ名<span class="required">必須</span></label>
                <input type="text" class="form-control" id="group-name" autofocus required>
            </div>
            <div class="mb-3">
                <label for="group-id" class="form-label">グループID<span class="required">必須</span></label>
                <input type="text" class="form-control" id="group-id" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="group-password" class="form-label">グループパスワード<span class="required">必須</span></label>
                <input type="password" class="form-control" id="group-password" required>
            </div>
            <div class="mb-3">
                <label for="group-password-check" class="form-label">グループパスワード確認用<span class="required">必須</span></label>
                <input type="password" class="form-control" id="group-password-check" required>
            </div>
            <div class="mb-3">
                <label for="admin-id" class="form-label">管理者ID<span class="required">必須</span></label>
                <input type="text" class="form-control" id="admin-id" required>
            </div>
            <div class="mb-3">
                <label for="admin-password" class="form-label">管理者パスワード<span class="required">必須</span></label>
                <input type="password" class="form-control" id="admin-password" required>
            </div>
            <div class="mb-3">
                <label for="admin-password-check" class="form-label">管理者パスワード確認用<span class="required">必須</span></label>
                <input type="password" class="form-control" id="admin-password-check" required>
            </div>
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/create_group.blade.php ENDPATH**/ ?>