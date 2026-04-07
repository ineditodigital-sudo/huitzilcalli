<nav id="custom-nav" class="navbar custom-nav fixed-top navbar-expand-md">
    <div class="container-fluid px-5 py-2">
        <a class="navbar-brand d-flex alig-items-center" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="<?php echo e(config('app.name', 'APP_NAME')); ?>" class="lazyload d-inline-block align-text-top me-2">
            <!-- <?php echo e(config('app.name', 'APP_NAME')); ?> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>"></a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>#cabaña-1"><?php echo e(__('Villa Magnolia')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>#cabaña-2"><?php echo e(__('Villa Laurel')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>#cabaña-3"><?php echo e(__('Villa Jacaranda')); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    
<script type="text/javascript">
    const navbar =  document.querySelector('#custom-nav');
    document.addEventListener('DOMContentLoaded', () => {
        window.addEventListener('scroll', () => {
            if(window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
            }else if(window.scrollY <= 50){
                navbar.classList.remove('nav-scrolled');
            }
        })
    })
    
</script><?php /**PATH C:\xampp\htdocs\laureles-web\resources\views/frontend/inc/nav.blade.php ENDPATH**/ ?>