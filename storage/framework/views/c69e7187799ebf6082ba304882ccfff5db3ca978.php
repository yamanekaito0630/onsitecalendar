<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4>メンバーの予定給与<br>（<?php echo e($month); ?>月）</h4>
            <form>
                <input class="btn btn-secondary w-100 no-print" type="button" value="印刷" onclick="window.print();">
            </form>
        </div>
        <ul class="list-group">
            <?php $__currentLoopData = $monthly_salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthly_salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between">
                    <p class="my-auto"><?php echo e(!is_null($monthly_salary) ? $monthly_salary[0]->name : ''); ?></p>
                    <p class="my-auto"><?php echo e(!is_null($monthly_salary) ? $monthly_salary[1] : ''); ?>円</p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins.layouts.create_join_group_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/salary_list.blade.php ENDPATH**/ ?>