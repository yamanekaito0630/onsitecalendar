<?php $__env->startSection('content'); ?>
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">どのグループに参加しますか？</h2>
        <div class="mb-3 d-flex">
            <a href="<?php echo e(route('create')); ?>" class="btn btn-success">作成</a>
            <a href="<?php echo e(route('join')); ?>" class="btn btn-success mx-3">参加</a>
        </div>
        <div class="search-result">
            <div class="search-result__hit-num"></div>
            <div id="search-result__list"></div>
        </div>
        <ul class="list-group target-area">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><a href="<?php echo e(route('group.my-page', $id)); ?>"><?php echo e($name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.group_search_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/users/group.blade.php ENDPATH**/ ?>