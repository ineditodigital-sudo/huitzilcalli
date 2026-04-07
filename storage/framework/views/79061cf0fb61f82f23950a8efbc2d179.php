

<?php $__env->startSection('content'); ?>

<?php
    // var_dump($cabins);
?>

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

        <?php $__currentLoopData = $cabins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $cabin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
                $auxImg = [];
                foreach($cabin->gallery as $p => $photo){
                    if(count($auxImg) >= 5){
                        //return;
                    }else{
                        array_push($auxImg,$photo);
                    }
                }

                if(count($auxImg) <= 5 && count($auxImg) > 0) {
                    while(count($auxImg) <= 5){
                        array_push($auxImg,$auxImg[0]);    
                    }
                }
            ?>

            <section class="cabaña-section" id="cabaña-<?php echo e($i+1); ?>">
                <div class="row <?php echo e(($i+1)%2==0 ? 'flex-row-reverse text-secondary' : 'bg-secondary text-light'); ?> justify-content-evenly overflow-hidden" style="padding: 10rem 0;">
                    <div class="col-xl-4 col-lg-5 col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex flex-column w-100 justify-content-center align-items-center cabin-gallery">
                            <a style="border-radius: 1rem; overflow: hidden; max-height: 70%; height: auto; aspect-ratio: 1/1.2; display: flex; border: 0px solid white;" href="/public<?php echo e($auxImg[0]->route); ?>" class="w-75" data-pswp-width="<?php echo e($auxImg[0]->width); ?>" data-pswp-height="<?php echo e($auxImg[0]->height); ?>">
                                <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public<?php echo e($auxImg[0]->route); ?>" alt="Banner">
                            </a>
                            
                            <div class="d-flex flex-wrap w-75 justify-content-between py-3">
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public<?php echo e($auxImg[1]->route); ?>" data-pswp-width="<?php echo e($auxImg[1]->width); ?>" data-pswp-height="<?php echo e($auxImg[1]->height); ?>">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public<?php echo e($auxImg[1]->route); ?>" alt="Banner">
                                </a>
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public<?php echo e($auxImg[2]->route); ?>" data-pswp-width="<?php echo e($auxImg[2]->width); ?>" data-pswp-height="<?php echo e($auxImg[2]->height); ?>">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public<?php echo e($auxImg[2]->route); ?>" alt="Banner">
                                </a>
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public<?php echo e($auxImg[3]->route); ?>" data-pswp-width="<?php echo e($auxImg[3]->width); ?>" data-pswp-height="<?php echo e($auxImg[3]->height); ?>">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public<?php echo e($auxImg[3]->route); ?>" alt="Banner">
                                </a>
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public<?php echo e($auxImg[4]->route); ?>" data-pswp-width="<?php echo e($auxImg[4]->width); ?>" data-pswp-height="<?php echo e($auxImg[4]->height); ?>">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public<?php echo e($auxImg[4]->route); ?>" alt="Banner">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 text-start d-flex flex-column justify-content-center position-relative">
                        <div class="bg-primary-gradient<?php echo e(($i+1)%2==0 ? '2' : ''); ?> position-absolute top-0 <?php echo e(($i+1)%2==0 ? 'end-0 text-end' : 'start-0'); ?> custom-shadow py-3 px-5 mb-5" style="width: 300%; margin-left: -2rem;">
                            <h1 class="fw-bolder text-uppercase text-dark p-0 mb-0"><?php echo e($cabin->name); ?></h1>
                        </div>
                        <p class="fs-5" style="margin-top: <?php echo e(($i+1)%2==0 ? '7' : '5'); ?>rem;"><?php echo e($cabin->description); ?></p>
                        <h4 class="mt-4 text-uppercase px-2" style="font-weight: 300; letter-spacing: 0.5rem">Incluye</h4>
                        <div class="d-flex align-items-center justify-content-start mb-4">
                            <div class="bg-primary" style="height: 0.20rem; width: 40%; border-radius: 5rem; overflow: hidden"></div>
                        </div>

                        <div class="row">
                            <?php $__currentLoopData = $cabin->amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-<?php echo e((strlen($amenitie->title) >= 25 || strlen($amenitie->specifications) >= 30) ? '8' : '4'); ?> col-md-6 mb-3 align-items-center d-flex">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="<?php echo e(($i+1)%2==0 ? 'text-dark' : 'text-light'); ?> rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; <?php echo e(($i+1)%2==0 ? 'background: hsla(95,6%,15%,0.1);' : 'background: #fff4;'); ?>">
                                                <i class="p-0 m-0 uil uil-<?php echo e($amenitie->icon); ?> fs-4"></i>
                                            </span>    
                                        </div>
                                        <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                            <h6 class="m-0 fw-bold"><?php echo e($amenitie->title); ?></h6>
                                            <?php if($amenitie->specifications): ?>
                                                <p class="m-0" style="color: <?php echo e(($i+1)%2==0 ? '#888' : '#bbb'); ?>"><?php echo e($amenitie->specifications); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                        <div class="form-group d-flex mt-4">
                            <a href="<?php echo e(route('detalles',['slug' => $cabin->slug])); ?>" class="btn btn-warning">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/carlosmartinez/Downloads/laureles-web (6)/resources/views/frontend/index.blade.php ENDPATH**/ ?>