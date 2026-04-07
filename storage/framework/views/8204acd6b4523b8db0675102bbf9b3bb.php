<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="https://huitzilcalli.com/admin/caba%C3%B1as" class="d-block text-left text-decoration-none">
                <img class="mw-100 brand-icon" src="<?php echo e(__('https://huitzilcalli.com/resources/img/logo.png')); ?>" alt="Huitzilcalli">
                Huitzilcalli
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            
            <!-- <div class="px-20px mb-3 d-none">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul> -->

            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="uil uil-estate aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Cabañas</span>
                        <!-- <span class="badge badge-inline badge-danger">Addon</span> -->
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('cabañas.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Gestión de cabañas</span>
                            </a>
                        </li>
                    
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('reservaciones.cabaña', ['service_type' => 'cabañas'])); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Reservaciones</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--<li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="uil uil-swimmer aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Jacuzzis</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('jacuzzis.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Gestión de jacuzzis</span>
                            </a>
                        </li>
                    
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('reservaciones.cabaña', ['service_type' => 'jacuzzis'])); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Reservaciones</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('jacuzzi.horarios')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Horarios</span>
                            </a>
                        </li>
                    </ul>
                </li>-->

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="uil uil-bed aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Amenidades</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('amenidades.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Gestión de amenidades</span>
                            </a>
                        </li>
                    
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('reservaciones.cabaña', ['service_type' => 'amenidades'])); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Reservaciones</span>
                            </a>
                        </li>

                        <!--<li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('jacuzzi.horarios')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Horarios</span>
                            </a>
                        </li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="aiz-sidebar-overlay"></div>
</div>
<?php /**PATH C:\Users\Maindsteel\Documents\repos\Huitzilcalli\resources\views/backend/inc/sidebar.blade.php ENDPATH**/ ?>