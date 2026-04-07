<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Admin | <?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="icon" type="image/x-icon" href="https://huitzilcalli.com/resources/img/favicon.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    

    <link rel="stylesheet" href="<?php echo e(__('/resources/css/template.css')); ?>">

    <!-- Scripts -->
    
    <script src="<?php echo e(__('/build/assets/app-d4b42df8.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(__('/build/assets/app-304379a8.css')); ?>">
    <script src="<?php echo e(__('/resources/js/calendar-js/index.global.min.js')); ?>"></script>
    <script src="<?php echo e(__('/resources/js/calendar-js/es.global.min.js')); ?>"></script>
    <script src="<?php echo e(__('/resources/js/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(__('/resources/js/metisMenu/metisMenu.js')); ?>"></script>
    <!--<script src="<?php echo e(__('/resources/js/dropzone/dropzone.min.js')); ?>"></script>-->
    <!--<script src="<?php echo e(__('/resources/js/devextreme/dx.all.js')); ?>"></script>-->
    <script src="<?php echo e(__('/resources/js/image-uploader/image-uploader.min.js')); ?>"></script>
    <script src="<?php echo e(__('/resources/js/SweetAlert2/sweetalert2.all.min.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(__('/resources/css/photoswipe.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(__('/resources/css/metisMenu.css')); ?>">
    <!--<link rel="stylesheet" href="<?php echo e(__('/resources/css/dropzone.min.css')); ?>" type="text/css">-->
    <link rel="stylesheet" href="<?php echo e(__('/resources/css/image-uploader.min.css')); ?>" type="text/css">
    <!--<link rel="stylesheet" href="<?php echo e(__('/resources/css/devextreme/dx.light.css')); ?>" type="text/css">-->
    <link rel="stylesheet" href="<?php echo e(__('/resources/css/sweetalert2.min.css')); ?>" type="text/css">
    
    <link rel="stylesheet" href="<?php echo e(__('/resources/css/admin-custom.css')); ?>?v=<?php echo e(rand()); ?>">

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div id="app">

        <div class="aiz-main-wrapper">
            <?php echo $__env->make('backend.inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="aiz-content-wrapper">
                <?php echo $__env->make('backend.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="aiz-main-content">
                    <main class="px-3 px-lg-4"> 
                        <?php echo $__env->yieldContent('content'); ?>
                    </main>
                    
                    <footer class="bg-white d-flex align-items-center justify-content-center p-3 px-lg-4 mt-auto">
                        <span>
                            &copy; Maindsoft 2024
                        </span>
                    </footer>
                </div>
            </div>
        </div>

    </div>

    <?php echo $__env->yieldContent('modal'); ?>

    <script>
        $(document).ready(()=>{
            mobileNavToggle();
            initActiveMenu();
            metismenu();
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        const showToast = (type, title) => {
            Toast.fire({
                icon: type,
                title: title
            })
        }

        const mobileNavToggle = () => {
            if(window.matchMedia('(max-width: 1200px)').matches){
                $('body').addClass('side-menu-closed')
            }
            $('[data-toggle="aiz-mobile-nav"]').on("click", function () {
                if ($("body").hasClass("side-menu-open")) {
                    $("body").addClass("side-menu-closed").removeClass("side-menu-open");
                } else if($("body").hasClass("side-menu-closed")) {
                    $("body").removeClass("side-menu-closed").addClass("side-menu-open");
                }else{
                    $("body").removeClass("side-menu-open").addClass("side-menu-closed");
                }
            });
            $(".aiz-sidebar-overlay").on("click", function () {
                $("body").removeClass("side-menu-open").addClass('side-menu-closed');
            });
        }

        const initActiveMenu = () => {
            $('[data-toggle="aiz-side-menu"] a').each(function () {
                var pageUrl = window.location.href.split(/[?#]/)[0];
                if (this.href == pageUrl || $(this).hasClass("active")) {
                    $(this).addClass("active");
                    $(this).closest(".aiz-side-nav-item").addClass("mm-active");
                    $(this)
                        .closest(".level-2")
                        .siblings("a")
                        .addClass("level-2-active");
                    $(this)
                        .closest(".level-3")
                        .siblings("a")
                        .addClass("level-3-active");
                }
            });
        }

        const metismenu = () => {
            $('[data-toggle="aiz-side-menu"]').metisMenu();
        }
    </script>

    <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH C:\Users\Maindsteel\Documents\repos\Huitzilcalli\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>