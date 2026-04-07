<?php $__env->startSection('content'); ?>
    <div class="custom-container" style="margin-bottom: -4rem;">
        <section class="gallery-section p-5 bg-own-secondary-light" style="padding-top: 6rem !important;">
            <?php if(count($cabin->gallery) > 0): ?>
        
            <?php
                $auxGallery = $cabin->gallery->toArray();
                if(count($auxGallery) < 8){
                    $fill = array_fill(count($auxGallery), 8-count($auxGallery), $cabin->gallery[0]);
                    $auxGallery = array_merge($auxGallery, $fill);
                }
                
                //var_dump($fill);
            ?>
            <div class="row">
                <div class="col-lg-7 d-flex">
                    <div class="w-100 overflow-hidden d-flex g1" style="border-radius: 0.75rem; overflow: hidden; height: max-content; aspect-ratio: 1/0.6; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($auxGallery[0]['route']); ?>' );">
                        <a class="flex-fill" style="display: flex; border: 0px solid white;" href="/public/<?php echo e($auxGallery[0]['route']); ?>" data-pswp-width="<?php echo e($auxGallery[0]['width']); ?>" data-pswp-height="<?php echo e($auxGallery[0]['height']); ?>">
                            
                        </a>    
                    <!-- <img src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner" class="w-100 img-fluid" style="object-fit: cover; height: auto;"> -->
                    </div>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-between g2" style="gap: 1rem">
                    <div class="w-100 overflow-hidden d-flex " style="gap: 1rem; max-height: 66%; height: 66%;">
                        <div class="d-flex" style="width: 33%;">
                            <div class="d-flex flex-column flex-fill" style="gap: 1rem;">
                                <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($auxGallery[1]['route']); ?>' );">
                                    <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public/<?php echo e($auxGallery[1]['route']); ?>" data-pswp-width="<?php echo e($auxGallery[1]['width']); ?>" data-pswp-height="<?php echo e($auxGallery[1]['height']); ?>">
                                    </a>
                                </div>
                                <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($auxGallery[2]['route']); ?>' );">
                                    <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public/<?php echo e($auxGallery[2]['route']); ?>" data-pswp-width="<?php echo e($auxGallery[2]['width']); ?>" data-pswp-height="<?php echo e($auxGallery[2]['height']); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-fill">
                            <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($auxGallery[3]['route']); ?>' );">
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public/<?php echo e($auxGallery[3]['route']); ?>" data-pswp-width="<?php echo e($auxGallery[3]['width']); ?>" data-pswp-height="<?php echo e($auxGallery[3]['height']); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 overflow-hidden d-flex flex-fill" style="gap: 1rem">
                        <div class="d-flex flex-fill">
                            <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($auxGallery[4]['route']); ?>' );">
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public/<?php echo e($auxGallery[4]['route']); ?>" data-pswp-width="<?php echo e($auxGallery[4]['width']); ?>" data-pswp-height="<?php echo e($auxGallery[4]['height']); ?>">
                                </a>
                            </div>
                        </div>
                        <div class="d-flex position-relative" style="max-width: 33%; width: 33%;">
                            <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($auxGallery[5]['route']); ?>' );">
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public/<?php echo e($auxGallery[5]['route']); ?>" data-pswp-width="<?php echo e($auxGallery[5]['width']); ?>" data-pswp-height="<?php echo e($auxGallery[5]['height']); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(count($cabin->gallery) > 6): ?>
                    <div class="d-none">
                        <?php $__currentLoopData = $cabin->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($j > 5): ?>
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public/<?php echo e($p->route); ?>" data-pswp-width="<?php echo e($p->width); ?>" data-pswp-height="<?php echo e($p->height); ?>">
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </section>
        
        <section class="g-section w-100 bg-own-secondary-light" style="padding-top: 6rem !important;">
             <?php if(count($cabin->gallery) > 0): ?>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php $__currentLoopData = $cabin->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g => $gPhoto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php if($g==0): ?> active <?php endif; ?>">
                    <div class="w-100 overflow-hidden d-flex g1" style="border-radius: 0.0rem; overflow: hidden; height: max-content; aspect-ratio: 1/1; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public/<?php echo e($gPhoto->route); ?>' );">
                        <a class="flex-fill" style="display: flex; border: 0px solid white;" href="/public/<?php echo e($gPhoto->route); ?>" data-pswp-width="<?php echo e($gPhoto->width); ?>" data-pswp-height="<?php echo e($gPhoto->height); ?>">
                        </a>    
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <?php endif; ?>
        </section>

        <header class="bg-own-secondary text-light py-4">
            <div class="container d-flex justify-content-between flex-wrap">
                <h1 class=" text-uppercase text-light p-0 mb-0 flex-fill cabin-title" style="font-family: 'Oswald'; letter-spacing: 0.35rem"><?php echo e($cabin->name); ?></h1>
                <div class="d-flex x-flex-fill title-icons">
                    <button type="button" onclick="" class="d-none btn btn-outline-light rounded-pill d-flex align-items-center justify-content-center mx-1 availability-button">
                        <i class="uil uil-calendar-alt fs-5 d-flex align-items-center justify-content-center me-2"></i>
                        <span>Ver Disponibilidad</span>
                    </button>
                    <button type="button" onclick="shareFacebook()" class="btn btn-outline-light btn-icon rounded-circle d-flex align-items-center justify-content-center mx-1" style="aspect-ratio: 1/1;">
                        <i class="uil uil-facebook-f fs-5 d-flex align-items-center justify-content-center"></i>
                    </button>
                    <a href="https://www.instagram.com/?url=huitzilcalli.com/jacuzzi/<?php echo e($cabin->slug); ?>" target="_blank" class="d-none btn btn-outline-light btn-icon rounded-circle d-flex align-items-center justify-content-center mx-1">
                        <i class="uil uil-instagram fs-5 d-flex align-items-center justify-content-center"></i>
                    </a>
                    <button type="button" onClick="shareWhatsapp()" class="btn btn-outline-light btn-icon rounded-circle d-flex align-items-center justify-content-center mx-1" style="aspect-ratio: 1/1;">
                        <i class="uil uil-whatsapp fs-5 d-flex align-items-center justify-content-center"></i>
                    </button>
                </div>
            </div>
        </header>

        <div class="container mt-4 mb-3">
            <div class="row" id="info-section">
                <div class="col-lg-8" >
                    <section class="mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <i class="uil uil-user me-3 fs-5"></i>
                                <h2 class="fs-4 fw-bold mb-0">Descripción</h2>
                            </div>
                            <div class="card-body">
                                <p><?php echo e($cabin->description); ?></p>
                            </div>
                        </div>
                    </section>
                    <section class="mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="uil uil-map me-3 fs-5"></i>
                                    <h2 class="fs-4 fw-bold mb-0">Ubicación</h2>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="https://www.google.com/maps/<?php echo e('@'.$cabin->lat); ?>,<?php echo e($cabin->lng); ?>,18z?hl=es-US&entry=ttu" target="_blank" class="d-flex btn btn-outline-secondary rounded-pill align-items-center ms-2 map-buttons">
                                        <span class="text-2">Abrir en Google Maps</span>
                                    </a>
                                    
                                    <button type="button" onClick="shareWhatsapp2()" class="d-flex btn btn-outline-secondary rounded-pill align-items-center ms-2 map-buttons" style="aspect-ratio: 1/1;">
                                        <i class="uil uil-whatsapp fs-6" style="background: transparent; color: inherit; padding:0"></i>
                                    </button>
                                    
                                    <div id="map-dropdown" class="dropdown border-0 d-none">
                                        <button type="button" class="d-flex btn btn-icon btn-outline-secondary rounded-circle align-items-center ms-2 dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false" style="aspect-ratio: 1/1;">
                                            <i class="uil uil-share" style="background: transparent; color: inherit; padding:0"></i>
                                        </button>
                                        <!--<button type="button" class="bg-light mt-2 me-2 btn btn-calendar btn-icon rounded-circle dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">-->
                                        <!--    <i class="uil uil-setting fs-5"></i>-->
                                        <!--</button>-->
                                        <ul class="dropdown-menu">
                                            <li><a href="https://www.google.com/maps/<?php echo e('@'.$cabin->lat); ?>,<?php echo e($cabin->lng); ?>,18z?hl=es-US&entry=ttu" target="_blank" style="cursor: pointer" class="dropdown-item">Abrir con Google Maps</a></li>
                                            <li><a onClick="shareWhatsapp2()" style="cursor: pointer" class="dropdown-item">Compartir por WhatsApp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex">
                                <div id="map" class="bg-primary flex-fill" style="min-height: 30rem; border-radius: 0.4rem"></div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <i class="uil uil-user me-3 fs-5"></i>
                                <h2 class="fs-4 fw-bold mb-0">Incluye</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-12 mb-3 align-items-center d-flex">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                                    <i class="p-0 m-0 uil uil-users-alt fs-4"></i>
                                                </span>    
                                            </div>
                                            <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                                <h6 class="m-0 fw-bold">Cupo</h6>
                                                <p class="m-0" style="color: #888"><?php echo e($cabin->capacity); ?> Personas</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php $__currentLoopData = $cabin->amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 mb-3 align-items-center d-flex">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                                    <i class="p-0 m-0 uil uil-<?php echo e($amenitie->icon); ?> fs-4"></i>
                                                </span>    
                                            </div>
                                            <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                                <h6 class="m-0 fw-bold"><?php echo e($amenitie->title); ?></h6>
                                                <?php if($amenitie->specifications): ?>
                                                    <p class="m-0" style="color: #888"><?php echo e($amenitie->specifications); ?></p>    
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                
                            </div>
                        </div>
                    </section>

                    <section class="mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <i class="uil uil-clock me-3 fs-5"></i>
                                <h2 class="fs-4 fw-bold mb-0">Horarios</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php if($full_time_schedule != null): ?>
                                        <div class="col-12 mb-3 align-items-center d-flex">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                                        1
                                                    </span>    
                                                </div>
                                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                                    <h6 class="m-0 fw-bold">Todo el día (-<?php echo e(number_format($user->reservation_discount, 0)); ?>%)</h6>
                                                    <p class="m-0" style="color: #888"><?php echo e(date('H:i', strtotime($full_time_schedule['start']))); ?> - <?php echo e(date('H:i', strtotime($full_time_schedule['end']))); ?> hrs.</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 mb-3 align-items-center d-flex">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                                        <?php echo e($i+2); ?>

                                                    </span>    
                                                </div>
                                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                                    <h6 class="m-0 fw-bold"><?php echo e(date('H:i', strtotime($schedule->start_time))); ?> - <?php echo e(date('H:i', strtotime($schedule->end_time))); ?> hrs.</h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-primary-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-dollar-alt display-3 text-primary" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Domingo - Viernes</h1>
                                        <p class="fs-3 mb-0" >$ <?php echo e(number_format($cabin->precio1, 2)); ?> <span class="fs-6 text-uppercase" style="color: #888"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-primary-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-dollar-alt display-3 text-primary" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Sábados</h1>
                                        <p class="fs-3 mb-0" >$ <?php echo e(number_format($cabin->precio2, 2)); ?> <span class="fs-6 text-uppercase" style="color: #888"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body row bg-danger text-white">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-danger d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-dollar-alt display-3 text-white" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Al reservar el día completo</h1>
                                        <p class="fs-3 mb-0" >-<?php echo e(number_format($user->reservation_discount, 0)); ?>%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-4 d-flex align-items-center justify-content-center">
                                        <div class="bg-success-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-clock-two display-3 text-success" ></i>
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Entrada</h1>
                                        <p class="fs-3 mb-0" ><?php echo e(substr($cabin->entrada, 0, 5)); ?> <span class="fs-6 text-uppercase" style="color: #888">hrs.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-4 d-flex align-items-center justify-content-center">
                                        <div class="bg-success-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-clock-two display-3 text-success" ></i>
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Salida</h1>
                                        <p class="fs-3 mb-0" ><?php echo e(substr($cabin->salida, 0, 5)); ?> <span class="fs-6 text-uppercase" style="color: #888">hrs.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
            <div class="row d-none" id="calendar-section">
                <div class="col-lg-4 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <i class="uil uil-question-circle me-3 fs-5"></i>
                            <h2 class="fs-4 fw-bold mb-0 flex-fill">Instrucciones</h2>
                        </div>
                        <div class="card-body">
                            <div>
                                <ul class="nav nav-pills mb-3 justify-content-evenly instruction-tabs" id="pills-tab" role="tablist">
                                    <li class="col-4 nav-item d-flex align-items-center justify-content-center" role="presentation">
                                        <button class="nav-link active d-flex flex-column align-items-center justify-content-center" id="tab-1" data-bs-toggle="pill" data-bs-target="#tab-c-1" type="button" role="tab" aria-controls="tab-c-1" aria-selected="true">
                                            <h1 class="fs-3 fw-bold mb-0 rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2.7rem;">01</h1>
                                            <p class="mb-0 fs-5">Seleccionar</p>
                                        </button>
                                    </li>
                                    <li class="col-4 nav-item d-flex align-items-center justify-content-center" role="presentation">
                                        <button class="nav-link d-flex flex-column align-items-center justify-content-center" id="tab-2" data-bs-toggle="pill" data-bs-target="#tab-c-2" type="button" role="tab" aria-controls="tab-c-2" aria-selected="false">
                                            <h1 class="fs-3 fw-bold mb-0 rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2.7rem;">02</h1>
                                            <p class="mb-0 fs-5">Solicitar</p>
                                        </button>
                                    </li>
                                    <li class="col-4 nav-item d-flex align-items-center justify-content-center" role="presentation">
                                        <button class="nav-link d-flex flex-column align-items-center justify-content-center" id="tab-3" data-bs-toggle="pill" data-bs-target="#tab-c-3" type="button" role="tab" aria-controls="tab-c-3" aria-selected="false">
                                            <h1 class="fs-3 fw-bold mb-0 rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2.7rem;">03</h1>
                                            <p class="mb-0 fs-5">Restricciones</p>
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="tab-c-1" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                        <p class="text-dark text-center"><span class="fs-5 fw-bold">1. </span>Selecciona el día que te gustaría reservar el jacuzzi.</p>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-8 col-sm-7 col-10">
                                                <img src="/resources/img/v2.gif" class="img-fluid w-100" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-c-2" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                        <p class="text-dark text-center"><span class="fs-5 fw-bold">2. </span>Después, haz clic en el botón con el horario de tu preferencia para enviar una solicitud de reservación via WhatsApp en el día que que elegiste.</p>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-8 col-sm-7 col-9">
                                                <img src="/resources/img/ss2.webp" class="img-fluid w-100" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-c-3" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                                        <p class="text-dark text-center"><span class="fs-5 fw-bold">3. </span>Aquellos días marcados en rojo en el calendario ya han sido reservados por otras personas.</p>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-8 col-sm-7 col-9">
                                                <img src="/resources/img/s3.webp" class="img-fluid w-100" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                        <section class="mb-3">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <i class="uil uil-calendar-alt me-3 fs-5"></i>
                                    <h2 class="fs-4 fw-bold mb-0 flex-fill">Disponibilidad</h2>
                                    <div id="sym-button" class="d-flex" style="border-left: 0px solid #ccc">
                                        <span class="fc-bg-event" style="width: 1.5rem; height: 1.5rem; aspect-ratio: 1/1; border-radius: 0.4rem; opacity: 0.45; margin-right: 0.5rem"></span>
                                        <span class="text-dark fw-bold">Ocupado</span>
                                    </div>
                                    <button id="help-button" type="button" data-bs-toggle="modal" data-bs-target="#help-modal" class="d-flex btn btn-outline-secondary rounded-pill align-items-center ms-2">
                                        <span class="text-1">Ayuda</span>
                                        <i class="uil uil-question-circle" style="background: transparent; color: inherit; padding:0"></i>
                                        <span class="text-2">¿Cómo Reservar?</span>
                                    </button>
                                </div>
                                <?php
                                    //var_dump(count($cabin->reservations));
                                ?>
                                <div class="form-text d-flex px-3" id="basic-addon4"><i class="uil uil-info-circle me-1"></i><p>Selecciona el día que te gustaría reservar el jacuzzi.</p></div>
                                <div class="card-body" id="calendar"></div>
                            </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>
    
    <button onclick="toggleView(this)" class="btn btn-lg btn-own-secondary-light text-white rounded-pill position-sticky end-0 start-100 me-3 mb-3 d-flex align-items-center shadow" style="bottom: 1rem; z-index: 800">
        <i class="uil uil-calendar-alt fs-5 d-flex align-items-center justify-content-center me-2"></i>
        Disponibilidad
    </button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<!-- More info Modal -->
<div class="modal fade" id="more-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Más Información</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-evenly" id="info-gallery">
                    <div class="form-text d-flex" id="basic-addon4"><i class="uil uil-info-circle me-1"></i><p>Haz clic en la imagen para visualizarla en pantalla completa.</p></div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/1.webp' );">
                            <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/resources/img/1.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/2.webp' );">
                            <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/resources/img/2.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/3.webp' );">
                            <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/resources/img/3.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/4.webp' );">
                            <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/resources/img/4.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/5.webp' );">
                            <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/resources/img/5.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How to Reserve Modal -->
<div class="modal fade" id="help-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-none">
                <h1 class="modal-title fs-5">&nbsp;</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body position-relative">
                <h1 class="fs-4 text-center">¿Cómo Reservar?</h1>
                <button type="button" class="btn-close position-absolute top-0 end-0 me-3 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                    <li class="col-4 nav-item d-flex align-items-center justify-content-center" role="presentation">
                        <button class="nav-link active d-flex flex-column align-items-center justify-content-center" id="tab-1" data-bs-toggle="pill" data-bs-target="#tab-c-1" type="button" role="tab" aria-controls="tab-c-1" aria-selected="true">
                            <h1 class="fs-3 fw-bold mb-0 rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2.7rem;">01</h1>
                            <p class="mb-0 fs-5">Seleccionar</p>
                        </button>
                    </li>
                    <li class="col-4 nav-item d-flex align-items-center justify-content-center" role="presentation">
                        <button class="nav-link d-flex flex-column align-items-center justify-content-center" id="tab-2" data-bs-toggle="pill" data-bs-target="#tab-c-2" type="button" role="tab" aria-controls="tab-c-2" aria-selected="false">
                            <h1 class="fs-3 fw-bold mb-0 rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2.7rem;">02</h1>
                            <p class="mb-0 fs-5">Solicitar</p>
                        </button>
                    </li>
                    <li class="col-4 nav-item d-flex align-items-center justify-content-center" role="presentation">
                        <button class="nav-link d-flex flex-column align-items-center justify-content-center" id="tab-3" data-bs-toggle="pill" data-bs-target="#tab-c-3" type="button" role="tab" aria-controls="tab-c-3" aria-selected="false">
                            <h1 class="fs-3 fw-bold mb-0 rounded-circle d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2.7rem;">03</h1>
                            <p class="mb-0 fs-5">Restricciones</p>
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="tab-c-1" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <p class="text-dark text-center">Selecciona el día que te gustaría reservar el jacuzzi.</p>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8 col-sm-7 col-10">
                                <img src="/resources/img/v2.gif" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-c-2" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <p class="text-dark text-center">Después, haz clic en el botón con el horario de tu preferencia para enviar una solicitud de reservación via WhatsApp en el día que que elegiste.</p>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8 col-sm-7 col-9">
                                <img src="/resources/img/ss2.webp" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-c-3" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <p class="text-dark text-center">Aquellos días marcados en rojo en el calendario ya han sido reservados por otras personas.</p>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8 col-sm-7 col-9">
                                <img src="/resources/img/s3.webp" class="img-fluid w-100" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center d-none">
                    <button type="button" class="btn btn-secondary mx-2" >
                        <i class="uil uil-angle-left-b me-2"></i>
                        Anterior
                    </button>
                    <button type="button" class="btn btn-secondary mx-2" >
                        Siguiente
                        <i class="uil uil-angle-right-b ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
    <script type="module">
        import PhotoSwipeLightbox from "<?php echo e(__('https://huitzilcalli.com/resources/js/photoswipe-lightbox.esm.js')); ?>";
        import PhotoSwipe from "<?php echo e(__('https://huitzilcalli.com/resources/js/photoswipe.esm.js')); ?>";

        const lightbox = new PhotoSwipeLightbox({
            gallery: '.gallery-section',
            children: 'a',
            pswpModule: PhotoSwipe
        });

        lightbox.init();
        
        const lightbox2 = new PhotoSwipeLightbox({
            gallery: '.g-section',
            children: 'a',
            pswpModule: PhotoSwipe
        });

        lightbox2.init();
        
        const lightbox3 = new PhotoSwipeLightbox({
            gallery: '#info-gallery',
            children: 'a',
            pswpModule: PhotoSwipe
        });

        lightbox3.init();
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb-ZeMACsdzDw_3WHtkVhg6vbWVXjfRaw" defer></script>

    <script>
        var calendar;
        var myp;
        var selectedDates;
        var watched = localStorage.getItem('ingreso'); 
        
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            let today = new Date();
            let fakeTomorrow = today;
            
            let auxEndDate = new Date();
            auxEndDate = auxEndDate.setMonth(auxEndDate.getMonth() + 6);
            //console.log({s: formatDate(new Date(auxEndDate))})
            
            fakeTomorrow.setFullYear(fakeTomorrow.getFullYear() + 5)
            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                selectable: true,
                locale: 'es',
                showNonCurrentDates: true,
                longPressDelay: 0,
                validRange: {
                    start: formatDate(),
                    // end: formatDate(new Date(new Date().getFullYear()+1, 12, 1))
                    end: formatDate(new Date(auxEndDate))
                },
                selectOverlap: false,
                select: function(info) {
                    console.log({info});

                    let dateObj = {
                        start: (new Intl.DateTimeFormat('es-MX', { dateStyle: 'full', timeStyle: 'short', timeZone: 'America/Mexico_City' }).format(new Date(info.start))),
                    }
                  
                    selectedDates = dateObj;
                  
                    // console.log({dateObj});
                    
                    let textDate = '';
                    textDate = 'el ' + dateObj.start.split(',')[0] + ', ' + dateObj.start.split(',')[1];

                    $.ajax({
                        url: "<?php echo e(route('horarios.disponibilidad')); ?>",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        data: {
                            cabin_id: <?php echo e($cabin->id); ?>,
                            date: formatDate(info.start)
                        },
                        success: (data) => {
                            console.log({data})

                            let url = encodeURI('https://wa.me/5214495803328?text='+('Hola, me gustaría reservar el jacuzzi <?php echo e($cabin->name); ?> '+textDate));

                            let buttons = '';
                            let countAvailables = 0;
                            data.forEach(h => {

                                let hInicio = h.start_time.substring(0,5);
                                let hFin = h.end_time.substring(0,5);
                                let extraUrl = encodeURI(` en el horario de ${hInicio} a ${hFin} hrs.`);

                                let href = '';
                                if(h.available == 1){
                                    href = `href="${url}${extraUrl}"`;
                                    countAvailables++
                                }

                                buttons += `<a target="_blank" ${href} class="btn btn-primary align-self-center mb-2 ${h.available==0 ? 'disabled' : ''} " >${hInicio} - ${hFin} hrs.</a>`;

                            })

                            if(countAvailables == data.length){
                                buttons += `<a target="_blank" href="${url}${encodeURI(' todo el dia.')}" class="btn btn-primary align-self-center" >Todo el día</a>`;
                            }

                    
                            myp = new bootstrap.Popover('.fc-daygrid-bg-harness .fc-highlight', {
                                trigger: 'manual', 
                                content: `
                                    <div class="d-flex flex-column">
                                        <p class="mb-0">Reservar jacuzzi ${textDate}</p>
                                        <p class="opacity-75">Selecciona un horario</p>
                                        ${buttons}
                                    </div>
                                `, 
                                placement: 'top', 
                                html: true
                            });
                            
                            myp.show();

                        },
                        error: (err) => {
                            console.error({err})
                        }
                    })
                    
                    
                },
                unselect: function(e, view){
                    myp.hide();
                },
                initialEvents: [

                    <?php
                        $dates = [];
                    ?>

                    <?php $__currentLoopData = $cabin->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r => $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $res = App\Models\Reservation::whereNull('deleted_at')->whereRaw('DATE(?) = DATE(start)', [$reservation->start])->where('cabin_id', $cabin->id)->get();
                        ?>

                        <?php if(is_null($reservation->deleted_at) && ($reservation->schedule_id == 0 || count($res) == count($schedules)) && !in_array(date('d/m/Y', strtotime($reservation->start)), $dates)): ?>
                        {
                            start: '<?php echo e(substr($reservation->start,0,10)); ?>',
                            end: '<?php echo e(substr($reservation->end,0,10)); ?>',
                            display: 'background',
                            color: '#ff5b64'
                        },
                        <?php endif; ?>

                        <?php
                            if(is_null($reservation->deleted_at) && ($reservation->schedule_id == 0 || count($res) == count($schedules)) && !in_array(date('d/m/Y', strtotime($reservation->start)), $dates)){
                                $dates[] = date('d/m/Y', strtotime($reservation->start));
                            }
                        ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $cabin->disableDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            start: '<?php echo e($day->date); ?>',
                            end: '<?php echo e($day->date); ?>',
                            display: 'background',
                            color: '#ff5b64'
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
            calendar.render();

            initMap(+'<?php echo e($cabin->lat); ?>', +'<?php echo e($cabin->lng); ?>');
        });

        const formatDate = (date = new Date()) => {
            const year = date.toLocaleString('default', {year: 'numeric'});
            const month = date.toLocaleString('default', {month: '2-digit'});
            const day = date.toLocaleString('default', {day: '2-digit'});
        
            return [year, month, day].join('-');
        }

        $(window).scroll(()=>{
            if(isInViewport(document.getElementById('calendar')) && !watched){
                watched = true;
                localStorage.setItem('ingreso', true); 
                $('#help-modal').modal('show');
            }
        })

        const isInViewport = (el) => {
            var distance = el.getBoundingClientRect();
            return (distance.top < (window.innerHeight || document.documentElement.clientHeight) && distance.bottom > 0);
        }

        const initMap = (lat = 21.92147554276003, lng = -102.6948151589334) => {
            let myLatLng = { lat: lat, lng: lng };
            map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng, 
                zoom: 15,
            });

            marker = new google.maps.Marker({
                position: myLatLng,
                title: "Ubicación",
                map: map,
                draggable: false,
            });
        }
        
        const makeRequest = () => {
            // let url = encodeURI('https://wa.me/524492850094?text='+('Hola, me gustaría reservar la cabaña <?php echo e($cabin->name); ?> '+((selectedDates != null) ? ('del '+selectedDates.start.split(',')[0]+','+selectedDates.start.split(',')[1]+' al '+selectedDates.end.split(',')[0]+','+selectedDates.end.split(',')[1]) : '')));
            let url = encodeURI('https://wa.me/5214495803328?text='+('Hola, me gustaría reservar la cabaña <?php echo e($cabin->name); ?> '+((selectedDates != null) ? ('del '+selectedDates.start.split(',')[0]+','+selectedDates.start.split(',')[1]+' al '+selectedDates.end.split(',')[0]+','+selectedDates.end.split(',')[1]) : '')));
            
            window.open(url, '_blank');
        }
        
        const shareWhatsapp = () => {
            if(
                navigator.userAgent.match(/Android/i)
             || navigator.userAgent.match(/webOS/i)
             || navigator.userAgent.match(/iPhone/i)
             || navigator.userAgent.match(/iPad/i)
             || navigator.userAgent.match(/iPod/i)
             || navigator.userAgent.match(/BlackBerry/i)
             || navigator.userAgent.match(/Windows Phone/i)
            ){
                window.open('whatsapp://send?text=https://huitzilcalli.com/jacuzzi/<?php echo e($cabin->slug); ?>', '_blank');
            }else{
                window.open('https://web.whatsapp.com/send?text=https://huitzilcalli.com/jacuzzi/<?php echo e($cabin->slug); ?>', '_blank');
            }
        }
        
        const shareWhatsapp2 = () => {
            if(
                navigator.userAgent.match(/Android/i)
             || navigator.userAgent.match(/webOS/i)
             || navigator.userAgent.match(/iPhone/i)
             || navigator.userAgent.match(/iPad/i)
             || navigator.userAgent.match(/iPod/i)
             || navigator.userAgent.match(/BlackBerry/i)
             || navigator.userAgent.match(/Windows Phone/i)
            ){
                window.open('whatsapp://send?text=https://www.google.com/maps/<?php echo e('@'.$cabin->lat); ?>,<?php echo e($cabin->lng); ?>,18z?hl=es-US&entry=ttu', '_blank');
            }else{
                window.open('https://web.whatsapp.com/send?text=https://www.google.com/maps/<?php echo e('@'.$cabin->lat); ?>,<?php echo e($cabin->lng); ?>,18z?hl=es-US&entry=ttu', '_blank');
            }
        }
        
        const shareFacebook = () => {
            if(window.orientation > 1){
                window.open('fb://page/huitzilcalli.com/jacuzzi/<?php echo e($cabin->slug); ?>', '_blank');
            }else{
                window.open('https://www.facebook.com/sharer/sharer.php?u=huitzilcalli.com/jacuzzi/<?php echo e($cabin->slug); ?>', '_blank');
            }
        }
        
        const toggleView = (el) => {
            if($('#calendar-section').hasClass('d-none')){
                $('#calendar-section').removeClass('d-none');
                calendar.updateSize();
                $(el).html(`
                    <i class="uil uil-swimmer fs-5 d-flex align-items-center justify-content-center me-2"></i>
                    Detalles
                `);
            }else{
                $('#calendar-section').addClass('d-none');
            }
            
            if($('#info-section').hasClass('d-none')){
                $('#info-section').removeClass('d-none');
                $(el).html(`
                    <i class="uil uil-calendar-alt fs-5 d-flex align-items-center justify-content-center me-2"></i>
                    Disponibilidad
                `);
            }else{
                $('#info-section').addClass('d-none');
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laurelescalvillo/public_html/resources/views/frontend/services/jacuzzis/detalles.blade.php ENDPATH**/ ?>