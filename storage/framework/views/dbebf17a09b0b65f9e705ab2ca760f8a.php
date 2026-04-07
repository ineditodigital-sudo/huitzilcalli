<div class="aiz-topbar px-3 px-lg-4 d-flex align-items-stretch justify-content-between">
    <div class="d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start me-2 me-md-3 ms-0" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-xl-grow-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon rounded-circle btn-outline-light d-flex align-items-center justify-content-center" href="<?php echo e(route('home')); ?>" target="_blank" title="<?php echo e(__('Sitio Web Principal')); ?>">
                            <i class="uil uil-globe fs-4 d-flex"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="aiz-topbar-item ms-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle text-dark no-arrow d-flex text-decoration-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm me-md-2">
                                <i class="uil uil-user fs-4"></i>
                                <!-- <img
                                    src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>"
                                    onerror="this.onerror=null;this.src='';"
                                > -->
                            </span>
                            <span class="d-none d-md-block">
                                <!-- <span class="d-block fw-bold text-decoration-none"><?php echo e(Auth::user()->name); ?></span> -->
                                <span class="d-block small opacity-60 text-decoration-none fs-6" id="username-nav"><?php echo e((Auth::user()->user_type == 'admin') ? Auth::user()->name : 'Usuario'); ?></span>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item text-decoration-none" type="button">
                                <i class="uil uil-user"></i>
                                <span><?php echo e(__('Perfil')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" class="dropdown-item text-decoration-none">
                                <i class="uil uil-signout"></i>
                                <span><?php echo e(__('Cerrar Sesión')); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/inc/nav.blade.php ENDPATH**/ ?>