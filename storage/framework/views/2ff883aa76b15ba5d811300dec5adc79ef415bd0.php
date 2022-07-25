<nav class="navbar navbar-expand-lg p-0 position-sticky top-0">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light min-vh-100">
            <div class="text-center">
                <span class="fs-4">カレンダー</span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="py-1">
                    <label>グループ検索</label>
                    <div class="input-group">
                        <input type="text" id="search-text" class="form-control" placeholder="グループ名" autofocus>
                    </div>
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



<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/users/components/group_search_sidebar.blade.php ENDPATH**/ ?>