

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <section style="min-height: 100vh;" class="main-section">
            <div class="row" style="min-height: 100vh;">
                <div class="col-lg-7 text-center d-flex flex-column justify-content-center align-items-center" style="padding: 5rem 12rem">
                    <h1 class="fw-bolder text-uppercase mb-0" style="font-size: 2.5rem;">Cabañas</h1>
                    <h1 class="text-uppercase fw-lighter" style="font-size: 5rem">Los Laureles</h1>
                    <p class="my-4 mb-5 fs-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus illo maxime repudiandae ipsum libero optio quia officiis, itaque magnam cupiditate maiores!.</p>
                    <a class="btn btn-primary" href="#cabaña-1">Ver Cabañas</a>
                </div>
                <div class="col-lg-5 text-center d-flex flex-column justify-content-center align-items-center">
                    <img class="img-fluid" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                </div>
            </div>
        </section>

        <section class="cabaña-section" id="cabaña-1">
            <div class="row bg-secondary justify-content-evenly text-light overflow-hidden" style="padding: 10rem 0;">
                <div class="col-xl-4 col-lg-5 col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center cabin-gallery">
                        <a style="border-radius: 1rem; overflow: hidden; max-height: 70%; height: auto; aspect-ratio: 1/1.2; display: flex; border: 0px solid white;" href="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" class="w-75" data-pswp-width="1168" data-pswp-height="1752">
                            <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner">
                        </a>
                        
                        <div class="d-flex flex-wrap w-75 justify-content-between py-3">
                            <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" data-pswp-width="1168" data-pswp-height="1752">
                                <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" data-pswp-width="1168" data-pswp-height="1752">
                                <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" data-pswp-width="1168" data-pswp-height="1752">
                                <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" data-pswp-width="1168" data-pswp-height="1752">
                                <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/15-min.webp')); ?>" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 text-start d-flex flex-column justify-content-center position-relative">
                    <div class="bg-primary-gradient position-absolute top-0 start-0 custom-shadow py-3 px-5 mb-5" style="width: 300%; margin-left: -2rem;">
                        <h1 class="fw-bolder text-uppercase text-dark p-0 mb-0">Villa Magnolia</h1>
                    </div>
                    <p class="fs-5" style="margin-top: 0rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique a, vel ipsum ad alias doloremque minima perferendis placeat consectetur labore</p>
                    <h4 class="mt-4 text-uppercase px-2" style="font-weight: 300; letter-spacing: 0.5rem">Incluye</h4>
                    <div class="d-flex align-items-center justify-content-start mb-4">
                        <div class="bg-primary" style="height: 0.20rem; width: 40%; border-radius: 5rem; overflow: hidden"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-user fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Cupo</h6>
                                    <p class="m-0" style="color: #bbb">2-3 personas</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-8 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-restaurant fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Concina Equipada</h6>
                                    <p class="m-0" style="color: #bbb">Con utencilio necesarios para concinar tus alimentos</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-bath fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">1 Baño Completo</h6>
                                    <p class="m-0 d-none" style="color: #bbb"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-swimmer fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Alberca</h6>
                                    <p class="m-0" style="color: #bbb">Calefacción +$400</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-fire fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Fogatero</h6>
                                    <p class="m-0" style="color: #bbb">15kg de leña +$150</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-tv-retro fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Smart TV</h6>
                                    <p class="m-0 d-none" style="color: #bbb"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-light rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: #fff4">
                                        <i class="p-0 m-0 uil uil-wifi fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Wifi</h6>
                                    <p class="m-0 d-none" style="color: #bbb"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex mt-4">
                        <a href="<?php echo e(route('detalles',['slug' => 'cabaña-1'])); ?>" class="btn btn-warning">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="cabaña-section" id="cabaña-2">
            <div class="row justify-content-evenly flex-row-reverse overflow-hidden" style="padding: 10rem 0;">
                <div class="col-xl-4 col-lg-5 col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center cabin-gallery">
                        <a style="border-radius: 1rem; overflow: hidden" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" class="w-75" data-pswp-width="100" data-pswp-height="100">
                            <img tyle="" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                        </a>
                        
                        <div class="d-flex flex-wrap w-75 justify-content-between py-3">
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 text-start d-flex flex-column justify-content-center position-relative">
                    <div class="bg-primary-gradient2 position-absolute top-0 end-0 custom-shadow py-3 px-5 mb-5 text-end" style="width: 300%; margin-right: -2rem;">
                        <h1 class="fw-bolder text-uppercase text-dark p-0 mb-0">Cabaña 2</h1>
                    </div>
                    <p class="fs-5" style="margin-top: 5.5rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique a, vel ipsum ad alias doloremque minima perferendis placeat consectetur labore</p>
                    <h4 class="mt-4 text-uppercase px-2" style="font-weight: 300; letter-spacing: 0.5rem">Amenidades</h4>
                    <div class="d-flex align-items-center justify-content-start mb-4">
                        <div class="bg-primary" style="height: 0.20rem; width: 40%; border-radius: 5rem; overflow: hidden"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                        <i class="p-0 m-0 uil uil-bath fs-4"></i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Amenidad 1</h6>
                                    <p class="m-0" style="color: #bbb">términos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex mt-4">
                        <a href="<?php echo e(route('detalles',['slug' => 'cabaña-2'])); ?>" class="btn btn-warning">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="cabaña-section" id="cabaña-3">
            <div class="row bg-secondary justify-content-evenly text-light overflow-hidden" style="padding: 10rem 0;">
                <div class="col-xl-4 col-lg-5 col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center cabin-gallery">
                        <a style="border-radius: 1rem; overflow: hidden" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" class="w-75" data-pswp-width="100" data-pswp-height="100">
                            <img tyle="" class="img-fluid bg-light w-100" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                        </a>
                        
                        <div class="d-flex flex-wrap w-75 justify-content-between py-3">
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                            <a style="border-radius: 1rem; overflow: hidden; width: 20%" href="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" data-pswp-width="100" data-pswp-height="100">
                                <img style=" aspect-ratio: 1/1;" class="img-fluid bg-light" src="<?php echo e(Vite::asset('resources/img/logo.png')); ?>" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 text-start d-flex flex-column justify-content-center">
                    <h1 class="fw-bolder text-uppercase bg-primary text-dark py-3 px-5 mb-5" style="width: 300%; margin-left: -2rem;">Cabaña 3</h1>
                    <p style="margin-top: 5.5rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique a, vel ipsum ad alias doloremque minima perferendis placeat consectetur labore</p>
                    <h4 class="fw-bold mt-4">Amenidades</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-2 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-dark rounded bg-light d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1;">
                                        <i class="p-0 m-0">S</i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-2 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Amenidad 1</h6>
                                    <p class="m-0" style="color: #bbb">términos</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 mb-2 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-dark rounded bg-light d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1;">
                                        <i class="p-0 m-0">S</i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-2 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Amenidad 2</h6>
                                    <p class="m-0" style="color: #bbb">términos</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-2 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-dark rounded bg-light d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1;">
                                        <i class="p-0 m-0">S</i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-2 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Amenidad 3</h6>
                                    <p class="m-0" style="color: #bbb">términos</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-2 align-items-center d-flex">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="text-dark rounded bg-light d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1;">
                                        <i class="p-0 m-0">S</i>
                                    </span>    
                                </div>
                                <div class="d-flex w-100 flex-column ps-2 d-flex justify-content-center">
                                    <h6 class="m-0 fw-bold">Amenidad 4</h6>
                                    <p class="m-0" style="color: #bbb">términos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex mt-4">
                        <a href="<?php echo e(route('detalles',['slug' => 'cabaña-3'])); ?>" class="btn btn-warning">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="module">
        import PhotoSwipeLightbox from "<?php echo e(Vite::asset('resources/js/photoswipe-lightbox.esm.js')); ?>";
        import PhotoSwipe from "<?php echo e(Vite::asset('resources/js/photoswipe.esm.js')); ?>";

        const lightbox = new PhotoSwipeLightbox({
            gallery: '.cabin-gallery',
            children: 'a',
            pswpModule: PhotoSwipe
        });

        lightbox.init();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laureles-web\resources\views/frontend/index.blade.php ENDPATH**/ ?>