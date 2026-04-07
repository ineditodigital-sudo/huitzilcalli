<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-block text-left text-decoration-none">
                <img class="mw-100 brand-icon" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Laureles">
                Los Laureles
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            
            <!-- <div class="px-20px mb-3 d-none">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul> -->

            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item d-none">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-tasks aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">POS System</span>
                        <!-- <span class="badge badge-inline badge-danger">Addon</span> -->
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">POS Manager</span>
                            </a>
                        </li>
                    
                        <li class="aiz-side-nav-item">
                            <a href="" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">POS Configuration</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('cabañas.index')); ?>" class="aiz-side-nav-link">
                        <i class="uil uil-estate aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(__('Cabañas')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="aiz-sidebar-overlay"></div>
</div>
<?php /**PATH C:\xampp\htdocs\laureles-web\resources\views/backend/inc/sidebar.blade.php ENDPATH**/ ?>