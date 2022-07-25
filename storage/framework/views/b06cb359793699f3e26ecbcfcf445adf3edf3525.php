<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- FontAwesome -->
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/onsitecalendar.css')); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>
<body>
<?php $__env->startComponent('users.components.header'); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 px-0">
            <?php $__env->startComponent('users.components.group_search_sidebar'); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-lg-10 main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>

<?php $__env->startComponent('users.components.footer'); ?>
<?php echo $__env->renderComponent(); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function () {
        const searchWord = function () {
            let searchText = $(this).val(), // 検索ボックスに入力された値
                targetText;

            $('.target-area li').each(function () {
                targetText = $(this).text();

                // 検索対象となるリストに入力された文字列が存在するかどうかを判断
                if (targetText.indexOf(searchText) !== -1) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            });
        };

        // searchWordの実行
        $('#search-text').on('input', searchWord);
    });
</script>
</html>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalender\resources\views/users/layouts/group_search_app.blade.php ENDPATH**/ ?>