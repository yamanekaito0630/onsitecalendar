<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded px-4 no-print z-50">
    <div class="container-fluid">
        <a href="<?php echo e(route('group.my-page', $group->id)); ?>" class="navbar-brand title">現場共有カレンダー</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form action="<?php echo e(route('my-page')); ?>" class="mx-2">
                        <button type="submit" class="user-name"><?php echo e(Auth::user()->name); ?></button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?php echo e(route('change-mode', $group->id)); ?>" class="mx-2">
                        <button type="submit" class="change-mode">管理画面へ</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/groups/components/header.blade.php ENDPATH**/ ?>