<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/x-icon" href="https://huitzilcalli.com/resources/img/favicon.ico">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Scripts -->
    
    <script src="<?php echo e(__('/build/assets/app-d4b42df8.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(__('/build/assets/app-304379a8.css')); ?>">
</head>
<body>
    <div id="app">
        <main class="">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH C:\Users\Maindsteel\Documents\repos\Huitzilcalli\resources\views/backend/layouts/layout.blade.php ENDPATH**/ ?>