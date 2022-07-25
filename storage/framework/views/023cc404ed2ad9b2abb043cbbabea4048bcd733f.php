<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">グループ編集画面</h2>
        <form action="<?php echo e(route('admin.update', $group->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="group-name" value="<?php echo e(true); ?>">
            <div class="mb-3">
                <label for="group-name" class="form-label">グループ名</label>
                <input type="text" name="name" value="<?php echo e($group->name); ?>" class="form-control" id="group-name" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>

        <form action="<?php echo e(route('admin.update', $group->id)); ?>" method="post" class="mt-4">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="group-watchword" value="<?php echo e(true); ?>">
            <div class="mb-3">
                <label for="watchword" class="form-label">新しい合言葉</label>
                <input type="text" name="watchword" value="<?php echo e($group->watchword); ?>" class="form-control" id="watchword" required>
            </div>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>

        <div class="mt-4">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#groupDeleteModal">グループを削除する</button>
        </div>
    </div>

    <!-- 削除モーダル -->
    <div class="modal fade" id="groupDeleteModal" tabindex="-1" aria-labelledby="groupDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="groupDeleteModalLabel">本当にこのグループを削除しますか？</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                    ※グループ名：<?php echo e($group->name); ?><br>
                    ※削除後はこのグループの復旧はできません。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                    <form action="<?php echo e(route('admin.delete', $group->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="group-delete" value="delete">
                        <button type="submit" class="btn btn-danger">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/group_edit.blade.php ENDPATH**/ ?>