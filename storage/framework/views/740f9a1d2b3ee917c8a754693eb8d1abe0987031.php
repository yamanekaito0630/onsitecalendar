<?php $__env->startSection('content'); ?>
    <!-- 日付モーダル -->
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4><?php echo e($res['month']); ?>月<?php echo e($res['date']); ?>日<?php echo e($res['week']); ?></h4>
        </div>
        <div class="mb-2">
            <label class="form-label m-0">出勤場所</label>
            <div class="container-fluid">
                <div class="row">
                <?php $__currentLoopData = $registered_sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registered_site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="btn btn-primary d-flex align-items-center justify-content-between p-1 col-md-3 m-1" data-bs-toggle="modal" data-bs-target="#onsiteDetailModal<?php echo e($registered_site['onsite_id']); ?>" style="width: 150px;">
                        <p class="my-auto"><?php echo e($registered_site['name']); ?></p>
                        <?php if($registered_site['oneday_flag'] == false): ?>
                            <span class="text-sm">半</span>
                        <?php endif; ?>
                    </button>

                    <!-- 現場詳細モーダル -->
                    <div class="modal fade" id="onsiteDetailModal<?php echo e($registered_site['onsite_id']); ?>" tabindex="-1" aria-labelledby="onsiteDetailModal<?php echo e($registered_site['onsite_id']); ?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="onsiteDetailModal<?php echo e($registered_site['onsite_id']); ?>Label">現場詳細</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6><?php echo e($registered_site['name']); ?></h6>
                                    <form action="<?php echo e(route('group.update', $group->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="onsite-id" value="<?php echo e($registered_site['onsite_id']); ?>">
                                        <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
                                        <label class="form-label">勤務時間</label>
                                        <?php if($count >= 2): ?>
                                            <span class="text-danger">※1日以上の更新はできません。</span>
                                        <?php endif; ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag" value="one-day" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                一日
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag" value="half-day">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                半日
                                            </label>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary mt-3" <?php echo e($count >= 2 ? 'disabled' : ''); ?>>更新</button>
                                        </div>
                                    </form>
                                    <form action="<?php echo e(route('group.delete', $group->id)); ?>" method="post" class="mt-3">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="member-id" value="<?php echo e($registered_site['user_id']); ?>">
                                        <input type="hidden" name="onsite-id" value="<?php echo e($registered_site['onsite_id']); ?>">
                                        <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <form action="<?php echo e(route('group.add_onsite', $group->id)); ?>" method="post" class="mb-2">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
            <label for="" class="form-label">出勤場所を追加</label>
            <?php if($count >= 2): ?>
                <p class="text-danger">※2つ以上は登録できません。</p>
            <?php endif; ?>
            <div class="d-flex">
                <select name="onsite-id" class="form-control w-50">
                    <?php $__currentLoopData = $onsites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-primary mx-2" <?php echo e($count >= 2 ? 'disabled' : ''); ?>>追加</button>
            </div>
        </form>

        <form action="<?php echo e(route('memo.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="group-id" value="<?php echo e($group->id); ?>">
            <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
            <label for="" class="form-label">メモ</label>
            <textarea class="form-control mb-2" name="memo"><?php echo e(!empty($memo) ? $memo->memo : ''); ?></textarea>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('groups.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/groups/detail.blade.php ENDPATH**/ ?>