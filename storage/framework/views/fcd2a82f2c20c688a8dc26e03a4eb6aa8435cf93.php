<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="mb-4">作業員管理画面</h2>
        </div>
        <ul class="list-group">
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <p class="employee-name <?php echo e($member['is_admin'] ? 'text-success' : ''); ?>"><?php echo e($member['name']); ?><?php echo e($member['is_admin'] ? '(管理者)' : ''); ?></p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 my-1">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#dailyAllowanceModal<?php echo e($member['user_id']); ?>">日当設定</button>
                            </div>

                            <form action="<?php echo e(route('admin.show', $group->id)); ?>" method="post" class="col-lg-3 my-1">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="member-id" value="<?php echo e($member['user_id']); ?>">
                                <button type="submit" class="btn btn-success w-100">日当履歴</button>
                            </form>
                            <div class="col-lg-3 my-1">
                                <button type="submit" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#isAdminModal<?php echo e($member['user_id']); ?>" <?php echo e($member['is_admin'] ? 'disabled' : ''); ?>>管理権限</button>
                            </div>
                            <div class="col-lg-3 my-1">
                                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#employeeDeleteModal<?php echo e($member['user_id']); ?>" <?php echo e($member['is_admin'] ? 'disabled' : ''); ?>>退会</button>
                            </div>


                        </div>
                    </div>

                    <!-- 日当設定モーダル -->
                    <div class="modal fade" id="dailyAllowanceModal<?php echo e($member['user_id']); ?>" tabindex="-1"
                         aria-labelledby="dailyAllowanceModal<?php echo e($member['user_id']); ?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="dailyAllowanceModal<?php echo e($member['user_id']); ?>Label"><?php echo e($member['name']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="<?php echo e(route('admin.store', $group->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="salary" value="<?php echo e(true); ?>">
                                    <input type="hidden" name="user-id" value="<?php echo e($member['user_id']); ?>">
                                    <div class="modal-body d-flex align-items-center">
                                        <label for="" class="form-label">日当：</label>
                                        <input type="number" name="salary" class="mx-2 form-control w-50" required>
                                        <span>円</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる
                                        </button>
                                        <button type="submit" class="btn btn-primary">保存</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- 権限付与モーダル -->
                    <div class="modal fade" id="isAdminModal<?php echo e($member['user_id']); ?>" tabindex="-1"
                         aria-labelledby="isAdminModal<?php echo e($member['user_id']); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="isAdminModal<?php echo e($member['user_id']); ?>Label">
                                        権限を付与しますか？</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-danger">
                                    ※作業員名：<?php echo e($member['name']); ?><br>
                                    ※あなたの管理者権限はなくなります。
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                                    <form action="<?php echo e(route('admin.update', $group->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="is-admin" value="<?php echo e(true); ?>">
                                        <input type="hidden" name="member-id" value="<?php echo e($member['user_id']); ?>">
                                        <button type="submit" class="btn btn-warning">権限付与</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 退会モーダル -->
                    <div class="modal fade" id="employeeDeleteModal<?php echo e($member['user_id']); ?>" tabindex="-1"
                         aria-labelledby="employeeDeleteModal<?php echo e($member['user_id']); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="employeeDeleteModal<?php echo e($member['user_id']); ?>Label">
                                        本当に退会させますか？</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-danger">
                                    ※作業員名：<?php echo e($member['name']); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                                    <form action="<?php echo e(route('admin.delete', $group->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="member-delete" value="delete">
                                        <input type="hidden" name="member-id" value="<?php echo e($member['user_id']); ?>">
                                        <button type="submit" class="btn btn-danger">退会させる</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/employee_management.blade.php ENDPATH**/ ?>