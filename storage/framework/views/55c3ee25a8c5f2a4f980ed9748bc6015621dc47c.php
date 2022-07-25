<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4><?php echo e($res['month']); ?>月<?php echo e($res['date']); ?>日<?php echo e($res['week']); ?></h4>
        </div>
        <div class="mb-2">
            <label class="form-label m-0">出勤場所</label>
            <div class="container-fluid">
                <div class="row">
                    <?php $__currentLoopData = $registered_sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registered_site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="<?php echo e(route('admin.member', $group->id)); ?>" method="post" class="col-md-3 m-1">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
                            <input type="hidden" name="date-display" value="<?php echo e($res['month']); ?>月<?php echo e($res['date']); ?>日<?php echo e($res['week']); ?>">
                            <input type="hidden" name="onsite-id" value="<?php echo e($registered_site['onsite_id']); ?>">
                            <button type="submit" class="btn btn-success" style="width: 150px;"><?php echo e($registered_site['name']); ?></button>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <form action="<?php echo e(route('memo.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="is-admin" value="<?php echo e(true); ?>">
            <input type="hidden" name="group-id" value="<?php echo e($group->id); ?>">
            <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
            <label for="" class="form-label">メモ</label>
            <textarea class="form-control mb-2" name="memo"><?php echo e(!empty($memo) ? $memo->memo : ''); ?></textarea>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/admins/detail.blade.php ENDPATH**/ ?>