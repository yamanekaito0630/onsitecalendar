<?php $__env->startSection('content'); ?>
    <div class="w-75 mx-4">
        <h2 class="mb-4">グループ参加画面</h2>

        <?php if(!empty($join_group) && $group[0]->id !== $join_group[0]->id): ?>
            <form action="<?php echo e(route('group.new_join', $join_group[0]->id)); ?>" method="get" class="mb-3">
                <button type="submit"><?php echo e($join_group[0]->name); ?></button>
            </form>
        <?php endif; ?>

        <?php if(!empty($error_message)): ?>
            <p class="text-danger"><?php echo e($error_message); ?></p>
        <?php endif; ?>

        <form action="<?php echo e(route('group.group.search', $group[0]->id)); ?>" method="get" class="mb-3">
            <div class="mb-3">
                <label for="group-id" class="form-label">グループID</label>
                <input type="text" name="group-address" value="<?php echo e(!empty($group_address) ? $group_address : ''); ?>" class="form-control" id="group-id" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="group-password" class="form-label">グループパスワード</label>
                <input type="password" name="group-password" class="form-control" id="group-password" required>
            </div>
            <button type="submit" class="btn btn-primary">検索する</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('groups.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/join_group.blade.php ENDPATH**/ ?>