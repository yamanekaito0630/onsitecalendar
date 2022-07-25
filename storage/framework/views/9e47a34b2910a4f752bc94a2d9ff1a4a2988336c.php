<nav class="navbar navbar-expand-lg p-0 position-sticky top-0 no-print">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light min-vh-100">
            <div class="text-center">
                <span class="fs-4"><?php echo e($group->name); ?></span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="py-1">
                    <form method="post">
                        <?php echo csrf_field(); ?>
                        <label for="">現場検索</label>
                        <div class="input-group">
                            <select name="onsite" class="form-control">
                                <?php $__currentLoopData = $onsites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($name); ?>"><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="input-group-btn">
		                        <button type="submit" class="btn btn-default search-btn"><i class="fas fa-search"></i></button>
	                        </span>
                        </div>
                    </form>
                </li>
                <li class="py-1">
                    <form method="post">
                        <?php echo csrf_field(); ?>
                        <label for="">作業員検索</label>
                        <div class="input-group">
                            <select name="member-id" class="form-control">
                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="input-group-btn">
		                        <button type="submit" class="btn btn-default search-btn"><i class="fas fa-search"></i></button>
	                        </span>
                        </div>
                    </form>
                </li>
                <li class="py-1">
                    <form action="<?php echo e(route('admin.salary', $group->id)); ?>" method="get">
                        <button type="submit" class="btn btn-primary w-100">給与一覧</button>
                    </form>
                </li>
                <li class="py-1">
                    <form>
                        <input class="btn btn-primary w-100" type="button" value="プリントアウト" onclick="window.print();">
                    </form>
                </li>
                <li class="py-1 mt-4">
                    <form action="<?php echo e(route('admin.edit', $group->id)); ?>" class="text-center">
                        <input type="hidden" name="onsite" value="<?php echo e(true); ?>">
                        <button type="submit" class="btn btn-info w-100 text-white">現場管理</button>
                    </form>
                </li>
                <li class="py-1">
                    <form action="<?php echo e(route('admin.edit', $group->id)); ?>" class="text-center">
                        <input type="hidden" name="employee" value="<?php echo e(true); ?>">
                        <button type="submit" class="btn btn-info w-100 text-white">作業員管理</button>
                    </form>
                </li>
                <li class="py-1">
                    <form action="<?php echo e(route('admin.edit', $group->id)); ?>" class="text-center">
                        <input type="hidden" name="group" value="<?php echo e(true); ?>">
                        <button type="submit" class="btn btn-info w-100 text-white">グループ編集</button>
                    </form>
                </li>
                <li class="py-1">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                    this.closest(\'form\').submit();','class' => 'logout']]); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                    this.closest(\'form\').submit();','class' => 'logout']); ?>
                            <span class="btn btn-secondary">ログアウト</span>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/admins/components/sidebar.blade.php ENDPATH**/ ?>