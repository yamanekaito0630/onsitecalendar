<div class="sidebar">
    <ul>
        <li>
            <form>
                <label for="">グループ検索</label>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
		            <button type="submit" class="btn btn-default search-btn"><i class="fas fa-search"></i></button>
	            </span>
                </div>
            </form>
        </li>
        <li>
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
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/components/group_search_sidebar.blade.php ENDPATH**/ ?>