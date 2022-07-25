<?php $__env->startSection('content'); ?>
    <input type="hidden" id="id" value="<?php echo e($group->id); ?>">
    <div class="w-100 mx-auto pt-5 calendar">
        <div id='calendar'></div>
    </div>

    <!-- 給与モーダル -->
    <div class="modal fade" id="salaryModal" tabindex="-1" aria-labelledby="salaryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaryModalLabel">あなたの予定給与（<?php echo e($month); ?>月）</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo e(!empty($monthly_salary) ? $monthly_salary : 0); ?>円
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('groups.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/mypage.blade.php ENDPATH**/ ?>