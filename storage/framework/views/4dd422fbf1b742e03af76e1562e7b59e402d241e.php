<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4><?php echo e($res['month']); ?>月<?php echo e($res['date']); ?>日<?php echo e($res['week']); ?></h4>
        </div>

        <form action="<?php echo e(route('memo.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="date" value="<?php echo e($res['date-str']); ?>">
            <label for="" class="form-label">メモ</label>
                <textarea class="form-control mb-2" name="memo"><?php echo e(!empty($memo) ? $memo->memo : ''); ?></textarea>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/users/detail.blade.php ENDPATH**/ ?>