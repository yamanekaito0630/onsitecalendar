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
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(mix('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/onsitecalendar.css')); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
</head>
<body>
<?php $__env->startComponent('users.components.header'); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>

<?php $__env->startComponent('users.components.footer'); ?>
<?php echo $__env->renderComponent(); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>
<?php /**PATH C:\xampp\htdocs\PracticeLaravel\onsitecalendar\resources\views/users/layouts/create_join_group_app.blade.php ENDPATH**/ ?>