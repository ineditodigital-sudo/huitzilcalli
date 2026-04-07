<?php $__env->startSection('content'); ?>
    <div id="home-section" class="container-fluid" style="overflow-y: hidden;">
        <div class="d-flex flex-column justify-content-center align-items-center position-relative">
            <header id="title-section" class="w-100 row d-flex justify-content-center align-items-center position-fixed top-0">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center align-items-center" style="width:20%; aspect-ratio: 1/1;">
                            <img class="img-fluid w-100" src="<?php echo e(__('https://huitzilcalli.com/resources/img/logo-lg.webp')); ?>" alt="Huitzilcalli">
                        </div>
                        <div class="d-flex flex-column justify-content-evenly ps-3">
                            <h2 class="fw-bolder text-start mb-0 index-main" style="font-family: 'Archivo Narrow'; font-size:40px;";>Huitzilcalli</h2>
                        </div>
                    </div>
                </div>
            </header>
            
            <section class="col-12 position-fixed top-50 start-50 translate-middle" id="cabins-section">
                <div class="row justify-content-evenly align-items-center">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <?php
                            $services_count = count($service->cabins->whereNull('deleted_at')->where('active',1));
                            $service_aux = $service->cabins->whereNull('deleted_at')->where('active',1)->first();  
                        ?>


                        <!--<a href="<?php echo e($services_count==0 ? '#!' : ( $services_count==1 ? ( $service->slug=='cabanas' ? route('detalles', ['slug' => $service_aux->slug]) : route('detallesJacuzzi', ['slug' => $service_aux->slug]) ) : route($service->slug))); ?>" class="btn text-decoration-none text-white w-100 d-flex flex-column p-0 border-0 overflow-hidden cabin-card my-2">-->
                        <a href="<?php echo e(route($service->slug)); ?>" class="btn text-decoration-none text-white w-100 d-flex flex-column p-0 border-0 overflow-hidden cabin-card my-2">
                            <?php if($services_count > 0 && count($service_aux->gallery) > 0): ?>
                                <div class="img-container w-100 d-flex flex-fill" style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem">
                                    <div id="carousel-<?php echo e($service->id); ?>" class="carousel slide carousel-fade w-100 d-flex flex-fill" data-bs-ride="carousel">
                                        <div class="carousel-inner d-flex flex-fill" style="">
                                            <?php $__currentLoopData = $service_aux->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="carousel-item <?php if($g==0): ?> active <?php endif; ?>" style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem; object-fit: cover; background-image: url('https://huitzilcalli.com/public<?php echo e($photo->route); ?>'); background-size: cover; background-repeat:no-repeat; background-position: center;">
                                                <!--<img src="" class="d-block w-100 img-fluid" style="object-fit: cover; background-image: url('https://huitzilcalli.com/public<?php echo e($photo->route); ?>'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;" alt="">-->
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="service-title p-3">
                                <div class=" w-100 d-flex justify-content-center align-items-center">
                                    <i class="uil uil-<?php echo e($service->id==1 ? 'estate' : 'swimmer'); ?> fs-4 me-2 card-icon"></i>
                                    <h1 class="fs-3 mb-0">
                                        <?php echo e($service->name); ?>

                                    </h1>    
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
            
            <footer class="position-fixed bottom-0 w-100 px-2" >
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div class="">
                        <a href="https://facebook.com/<?php echo e($user->facebook); ?>" target="_blank" class="btn btn-outline-secondary btn-icon rounded-circle mx-2" style="width: 3rem; aspect-ratio: 1/1;">
                            <i class="uil uil-facebook-f fs-4"></i>
                        </a>
                        <a href="https://instagram.com/<?php echo e($user->instagram); ?>" target="_blank" class="btn btn-outline-secondary btn-icon rounded-circle mx-2" style="width: 3rem; aspect-ratio: 1/1;">
                            <i class="uil uil-instagram fs-4"></i>
                        </a>
                    </div>
                    <div class="">
                        <!--<button class="btn btn-outline-secondary d-flex align-items-center mx-2 fs-5" type="button" data-bs-toggle="modal" data-bs-target="#more-info" style="border-radius: 3rem;">
                            <i class="uil uil-info-circle fs-4 me-2"></i>
                            M®¢s informaci®Æn
                        </button>-->
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<!-- More info Modal -->
<div class="modal fade" id="more-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">M√°s Informaci√≥n</h1>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        let timeoutId = null;
        const documentHeight = () => {
          clearTimeout(timeoutId); // avoid execution of previous timeouts
          timeoutId = setTimeout(() => {
           const doc = document.documentElement;
           doc.style.setProperty('--doc-height', `${window.innerHeight}px`)
          }, 200);
        };
        window.addEventListener('resize', documentHeight);
        documentHeight();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/huitzilcalli/public_html/resources/views/frontend/index.blade.php ENDPATH**/ ?>