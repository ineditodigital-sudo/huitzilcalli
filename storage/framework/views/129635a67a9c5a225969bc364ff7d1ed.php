<div class="card position-relative">
    <div class="card-header d-flex align-items-center">
        <i class="uil uil-user me-3 fs-5"></i>
        <h2 class="fs-4 fw-bold mb-0">Administrador</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 d-flex align-items-center justify-content-center mb-3">
                <img src="<?php echo e(__('https://huitzilcalli.com/resources/img/logo.png')); ?>" alt="Huitzilcalli" class="img-fluid rounded-circle p-2 bg-light" style="aspect-ratio: 1/1; max-width: 5rem;" />
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 d-flex flex-column justify-content-evenly mb-3">
                <h1 class="fs-5 text-uppercase fw-bold mb-0"><?php echo e(__('Administrador')); ?></h1>
                <p class="mb-0 "><?php echo e(Auth::user()->username); ?></p>
            </div>
        </div>
        <hr class="mb-3 mt-0" style="color: #ccc" />
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-3 d-flex align-items-center justify-content-center">
                        <div class="bg-light p-2 d-flex align-items-center justify-content-center" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 3rem;">
                            <i class="uil uil-user fs-5"></i>
                        </div>
                    </div>
                    <div class="col-9 d-flex flex-column justify-content-evenly">
                        <p class="fw-bold mb-0"><?php echo e(__('Nombre')); ?></p>
                        <p class="mb-0"><?php echo e(Auth::user()->name); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-3 d-flex align-items-center justify-content-center">
                        <div class="bg-light p-2 d-flex align-items-center justify-content-center" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 3rem;">
                            <i class="uil uil-whatsapp fs-5"></i>
                        </div>
                    </div>
                    <div class="col-9 d-flex flex-column justify-content-evenly">
                        <p class="fw-bold mb-0"><?php echo e(__('WhatsApp')); ?></p>
                        <p class="mb-0"><?php echo e(Auth::user()->phone); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dropdown position-absolute top-0 end-0 border-0 mt-2 me-2">
        <button type="button" class="mt-2 me-2 btn btn-calendar btn-icon rounded-circle dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="uil uil-setting fs-5"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
            <li><a style="cursor: pointer" onclick="editUser();" class="dropdown-item">Editar</a></li>
            <li><a style="cursor: pointer" onclick="changePassword();" class="dropdown-item">Cambiar Contraseña</a></li>
        </ul>
    </div>
</div><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/partials/userCard.blade.php ENDPATH**/ ?>