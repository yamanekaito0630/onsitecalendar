<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm rounded px-4 no-print z-50">
    <div class="container-fluid">
        <a href="<?php echo e(route('my-page')); ?>" class="navbar-brand title">現場共有カレンダー</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form action="<?php echo e(route('edit')); ?>" class="mx-2">
                        <input type="hidden" name="user" value="<?php echo e(true); ?>">
                        <button type="submit" class="user-name"><?php echo e(Auth::user()->name); ?>（編集）</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="<?php echo e(route('edit')); ?>" class="mx-2">
                        <input type="hidden" name="group" value="<?php echo e(true); ?>">
                        <button type="submit" class="change-mode">グループに参加する</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/users/components/header.blade.php ENDPATH**/ ?>