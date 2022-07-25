<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded px-4 no-print z-50">
    <div class="container-fluid">
        <a href="<?php echo e(route('my-page')); ?>" class="navbar-brand title">現場共有カレンダー</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if(session('flash_message')): ?>
            <!-- フラッシュメッセージ -->
            <div class="flash_message text-success">
                <?php echo e(session('flash_message')); ?>

            </div>
        <?php endif; ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('edit.user')); ?>" class="user-name mx-1"><?php echo e(Auth::user()->name); ?>（編集）</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('edit.group')); ?>" class="change-mode mx-1">グループに参加する</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/users/components/header.blade.php ENDPATH**/ ?>