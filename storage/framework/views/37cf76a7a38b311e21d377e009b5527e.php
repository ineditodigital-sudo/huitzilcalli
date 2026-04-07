<form id="formSettings" novalidate method="post" autocomplete="off" class="needs-validation">
    <?php echo csrf_field(); ?>
    <div class="row">
        <h2 class="fs-4 text-uppercase fw-bold"><?php echo e(__('Redes Sociales')); ?></h2>
        <div class="col-sm-12 mb-3">
            <label for="facebook" class="form-label"><?php echo e(__('Facebook')); ?></label>
            <div class="input-group has-validation">
                <span class="input-group-text btn btn-outline-secondary" id="basic-addon3">https://facebook.com/</span>
                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="<?php echo e(__('Página de Facebook')); ?>" required value="<?php echo e(Auth()->user()->facebook); ?>">
                <span class="invalid-feedback" for="facebook" role="alert">
                    <strong></strong>
                </span>
            </div>
        </div>
        <div class="col-sm-12 mb-3">
            <label for="instagram" class="form-label"><?php echo e(__('Instagram')); ?></label>
            <div class="input-group has-validation">
                <span class="input-group-text btn btn-outline-secondary" id="basic-addon3">https://instagram.com/</span>
                <input type="text" id="instagram" name="instagram" class="form-control" placeholder="<?php echo e(__('Página de Instagram')); ?>" required value="<?php echo e(Auth()->user()->instagram); ?>">
                <span class="invalid-feedback" for="instagram" role="alert">
                    <strong></strong>
                </span>
            </div>
        </div>
    </div>
    <div class="d-flex w-100 justify-content-end">
        <button class="btn btn-primary" type="button" onclick="submitSettings()"><?php echo e(__('Guardar Configuración')); ?></button>
    </div>
</form><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/partials/settingCard.blade.php ENDPATH**/ ?>