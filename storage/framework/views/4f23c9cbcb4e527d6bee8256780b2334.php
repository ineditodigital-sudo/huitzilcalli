

<?php $__env->startSection('content'); ?>
    <div class="custom-container">
        <section class="gallery-section p-5 mt-5">
            <div class="row">
                <div class="col-7 d-flex">
                    <div class="w-100 overflow-hidden d-flex" style="border-radius: 0.75rem; overflow: hidden; height: max-content; aspect-ratio: 1/0.6; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public<?php echo e($cabin->gallery[0]->route); ?>' );">
                        <a class="flex-fill" style="display: flex; border: 0px solid white;" href="/public<?php echo e($cabin->gallery[0]->route); ?>" data-pswp-width="<?php echo e($cabin->gallery[0]->width); ?>" data-pswp-height="<?php echo e($cabin->gallery[0]->height); ?>">
                            
                        </a>    
                    <!-- <img src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner" class="w-100 img-fluid" style="object-fit: cover; height: auto;"> -->
                    </div>
                </div>
                <div class="col-5 d-flex flex-column justify-content-between" style="gap: 1rem">
                    <div class="w-100 overflow-hidden d-flex " style="gap: 1rem; max-height: 66%; height: 66%;">
                        <div class="d-flex" style="width: 33%;">
                            <div class="d-flex flex-column flex-fill" style="gap: 1rem;">
                                <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public<?php echo e($cabin->gallery[1]->route); ?>' );">
                                    <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public<?php echo e($cabin->gallery[1]->route); ?>" data-pswp-width="<?php echo e($cabin->gallery[0]->width); ?>" data-pswp-height="<?php echo e($cabin->gallery[0]->height); ?>">
                                    </a>
                                </div>
                                <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public<?php echo e($cabin->gallery[2]->route); ?>' );">
                                    <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public<?php echo e($cabin->gallery[2]->route); ?>" data-pswp-width="<?php echo e($cabin->gallery[2]->width); ?>" data-pswp-height="<?php echo e($cabin->gallery[2]->height); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-fill">
                            <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public<?php echo e($cabin->gallery[3]->route); ?>' );">
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public<?php echo e($cabin->gallery[3]->route); ?>" data-pswp-width="<?php echo e($cabin->gallery[3]->width); ?>" data-pswp-height="<?php echo e($cabin->gallery[3]->height); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 overflow-hidden d-flex flex-fill" style="gap: 1rem">
                        <div class="d-flex flex-fill">
                            <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public<?php echo e($cabin->gallery[4]->route); ?>' );">
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public<?php echo e($cabin->gallery[4]->route); ?>" data-pswp-width="<?php echo e($cabin->gallery[4]->width); ?>" data-pswp-height="<?php echo e($cabin->gallery[4]->height); ?>">
                                </a>
                            </div>
                        </div>
                        <div class="d-flex" style="max-width: 33%; width: 33%">
                            <div class="w-100 overflow-hidden d-flex flex-fill" style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/public<?php echo e($cabin->gallery[5]->route); ?>' );">
                                <a class="flex-fill" style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white;" href="/public<?php echo e($cabin->gallery[5]->route); ?>" data-pswp-width="<?php echo e($cabin->gallery[5]->width); ?>" data-pswp-height="<?php echo e($cabin->gallery[5]->height); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <header class="bg-primary py-4">
            <div class="container">
                <h1 class=" text-uppercase text-dark p-0 mb-0" style="font-family: 'Oswald'; letter-spacing: 0.35rem"><?php echo e($cabin->name); ?></h1>
            </div>
        </header>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
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
                        <div class="card mb-2">
                            <div class="card-header d-flex align-items-center">
                                <i class="uil uil-map me-3 fs-5"></i>
                                <h2 class="fs-4 fw-bold mb-0">Ubicación</h2>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body d-flex">
                                <div id="map" class="bg-primary flex-fill" style="min-height: 16rem; border-radius: 0.4rem"></div>
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
                    </section>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-12 d-flex">
                    <div class="row flex-fill align-items-between">
                        <div class="col-12 mb-3">
                            <div class="card bg-secondary">
                                <div class="card-body text-center">
                                    <button class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#new-request">
                                        <i class="uil uil-calendar-alt me-2"></i>
                                        Solicitar Reservación
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-primary-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-dollar-alt display-3 text-primary" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Domingo - Viernes</h1>
                                        <p class="fs-3 mb-0" >$ <?php echo e(number_format($cabin->precio1, 2)); ?> <span class="fs-6 text-uppercase" style="color: #888">/ noche</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-primary-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-dollar-alt display-3 text-primary" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Sábados</h1>
                                        <p class="fs-3 mb-0" >$ <?php echo e(number_format($cabin->precio2, 2)); ?> <span class="fs-6 text-uppercase" style="color: #888">/ noche</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-success-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-clock-two display-3 text-success" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Entrada</h1>
                                        <p class="fs-3 mb-0" ><?php echo e(substr($cabin->entrada, 0, 5)); ?> <span class="fs-6 text-uppercase" style="color: #888">hrs.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <div class="bg-success-soft d-flex justify-content-center align-items-center rounded-circle" style="aspect-ratio: 1/1; width: 100%; height: auto;">
                                            <i class="uil uil-clock display-3 text-success" ></i>
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex flex-column justify-content-evenly">
                                        <h1 class="h6 text-uppercase mb-0 fw-bold">Salida</h1>
                                        <p class="fs-3 mb-0" ><?php echo e(substr($cabin->salida, 0, 5)); ?> <span class="fs-6 text-uppercase" style="color: #888">hrs.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 col-md-8 col-sm-12">
                    <section class="mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <i class="uil uil-calendar-alt me-3 fs-5"></i>
                                <h2 class="fs-4 fw-bold mb-0">Disponibilidad</h2>
                            </div>
                            <div class="card-body" id="calendar"></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<!-- New Cabin Modal -->
<div class="modal fade" id="new-request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Solicitar Reservación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="formRequest" novalidate method="post" autocomplete="off" class="needs-validation">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancelar')); ?></button>
                <button type="button" id="submitData" onClick="submitData()" class="btn btn-primary"><?php echo e(__('Enviar')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('script'); ?>
    <script type="module">
        import PhotoSwipeLightbox from "<?php echo e(Vite::asset('resources/js/photoswipe-lightbox.esm.js')); ?>";
        import PhotoSwipe from "<?php echo e(Vite::asset('resources/js/photoswipe.esm.js')); ?>";

        const lightbox = new PhotoSwipeLightbox({
            gallery: '.gallery-section',
            children: 'a',
            pswpModule: PhotoSwipe
        });

        lightbox.init();
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb-ZeMACsdzDw_3WHtkVhg6vbWVXjfRaw" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                selectable: true,
                locale: 'es',
            });
            calendar.render();

            initMap(+'<?php echo e($cabin->lat); ?>', +'<?php echo e($cabin->lng); ?>');
        });

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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/carlosmartinez/Downloads/laureles-web (6)/resources/views/frontend/detalles.blade.php ENDPATH**/ ?>