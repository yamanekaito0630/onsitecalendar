<?php $__env->startSection('content'); ?>
    <div class="w-75 mx-4">
        <h2 class="mb-4">編集画面</h2>
        <form>
            <div class="mb-3">
                <label for="user-name" class="form-label">名前</label>
                <input type="text" class="form-control" id="user-name" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>

        <form class="mt-4">
            <div class="mb-3">
                <label for="current-user-password" class="form-label">現在のログインパスワード</label>
                <input type="password" class="form-control" id="current-user-password" required>
            </div>
            <div class="mb-3">
                <label for="new-user-password" class="form-label">新しいログインパスワード</label>
                <input type="password" class="form-control" id="new-user-password" required>
            </div>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>

        <div class="mt-4">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userDeleteModal">アカウントを削除する</button>
        </div>
    </div>

    <!-- 削除モーダル -->
    <div class="modal fade" id="userDeleteModal" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDeleteModalLabel">本当に削除しますか？</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                    ※削除後はアカウントの復旧はできません。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                    <form>
                        <button type="submit" class="btn btn-danger">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/user_info_edit.blade.php ENDPATH**/ ?>