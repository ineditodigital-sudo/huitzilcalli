<?php $__currentLoopData = $jacuzzis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c => $jacuzzi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
    <div class="card position-relative">
        <div class="bg-primary d-flex" style="min-height: 15rem; max-height: 12rem; <?php if($jacuzzi->active == 0): ?> filter: grayscale(1); <?php endif; ?>">
            <?php if(count($jacuzzi->gallery) > 0): ?>
            <div id="carousel-<?php echo e($jacuzzi->id); ?>" class="carousel slide w-100 flex-fill" data-bs-ride="carousel">
                <div class="carousel-inner" style="min-height: 15rem; max-height: 12rem;">
                    <?php $__currentLoopData = $jacuzzi->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php if($g==0): ?> active <?php endif; ?>" style="object-fit: cover; background-image: url('https://huitzilcalli.com/public<?php echo e($photo->route); ?>'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;">
                        <!--<img src="" class="d-block w-100 img-fluid" style="object-fit: cover; background-image: url('https://huitzilcalli.com/public<?php echo e($photo->route); ?>'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;" alt="">-->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo e($jacuzzi->id); ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo e($jacuzzi->id); ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
            <?php endif; ?>
        </div>
        <div class="card-body" style="<?php if($jacuzzi->active == 0): ?> filter: grayscale(1); <?php endif; ?>">
            <h1 class="fs-5 fw-bold text-uppercase d-flex alig-items-center"><i class="uil uil-estate me-2 fw-5"></i><?php echo e($jacuzzi->name); ?></h1>
            <p class="mb-2 text-break" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;"><?php echo e($jacuzzi->description); ?></p>
            <div class="d-flex flex-row flex-wrap align-items-center justify-content-evenly">
                <?php $__currentLoopData = $jacuzzi->amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a => $amenitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-light p-2 d-flex align-items-center justify-content-center mx-1 mb-2" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 2.5rem;">
                    <i class=" uil uil-<?php echo e($amenitie->icon); ?>" title="<?php echo e($amenitie->title); ?>"></i>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-2 pt-2" style="border-top: 1px solid #eee">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <div class="btn btn-outline-secondary py-2 px-4 d-flex ps-2" style="border-radius: 0.5rem; cursor: default;">
                        <div class="d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2rem; height: auto;">
                            <i class="uil uil-dollar-sign-alt fs-4"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-evenly">
                            <p class="mb-0 fw-bold"><?php echo e(__('Dom-Vie')); ?></p>
                            <p class="mb-0">$ <?php echo e(number_format($jacuzzi->precio1, 2)); ?></p>
                        </div>
                    </div>
                    <div class="btn btn-outline-secondary py-2 px-4 d-flex ps-2" style="border-radius: 0.5rem; cursor: default;">
                        <div class="d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 1.5rem; height: auto;">
                            <i class="uil uil-dollar-sign-alt fs-4"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-evenly">
                            <p class="mb-0 fw-bold"><?php echo e(__('Sab.')); ?></p>
                            <p class="mb-0">$ <?php echo e(number_format($jacuzzi->precio2, 2)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <label class="position-absolute top-0 start-0 aiz-switch aiz-switch-success mb-0 ms-3 mt-3" style="z-index: 1000;">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" onchange="changeStatus(<?php echo e($jacuzzi->id); ?>, this)" <?php if($jacuzzi->active == 1): ?> checked <?php endif; ?> role="switch" id="flexSwitchCheckDefault">
            </div>
        </label>
        <div class="dropdown position-absolute top-0 end-0 border-0" style="z-index: 1000">
            <button type="button" class="bg-light mt-2 me-2 btn btn-calendar btn-icon rounded-circle dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="uil uil-setting fs-5"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a href="<?php echo e(route('detalles', ['slug' => $jacuzzi->slug])); ?>" style="cursor: pointer" class="dropdown-item">Visualizar</a></li>
                <li><a href="<?php echo e(route('reservaciones.cabaña', ['service_type' => 'jacuzzis' ,'slug' => $jacuzzi->slug])); ?>" target="_blank" class="dropdown-item">Reservar</a></li>
                <li><a style="cursor: pointer" class="dropdown-item" onclick="editRow(<?php echo e($jacuzzi->id); ?>)">Editar</a></li>
                <li><a style="cursor: pointer" class="dropdown-item" onclick="deleteRow(<?php echo e($jacuzzi->id); ?>)">Eliminar</a></li>
            </ul>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/partials/jacuzziCard.blade.php ENDPATH**/ ?>