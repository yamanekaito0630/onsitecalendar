<?php $__env->startSection('content'); ?>
    <div class="w-75 mx-4">
        <h2 class="mb-4">グループ参加画面</h2>

        <?php if(!empty($group)): ?>
            <p><?php echo e($group[0]->name); ?></p>
        <?php endif; ?>

        <form action="<?php echo e(route('user.group.search')); ?>" method="get">
            <div class="mb-3">
                <label for="group-id" class="form-label">グループID</label>
                <input type="text" name="group-address" class="form-control" id="group-id" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="group-password" class="form-label">グループパスワード</label>
                <input type="password" class="form-control" id="group-password" required>
            </div>
            <button type="submit" name="group-password" class="btn btn-primary">検索する</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/users/join_group_search.blade.php ENDPATH**/ ?>