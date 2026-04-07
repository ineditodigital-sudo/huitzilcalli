<form id="formDiscount" novalidate method="post" autocomplete="off" class="needs-validation">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="reservation_discount" class="form-label"><?php echo e(__('Descuento por reserva de día completo (%)')); ?></label>
                <div class="input-group has-validation">
                    <span class="input-group-text btn btn-outline-secondary" id="basic-addon1">%</span>
                    <input type="text" id="reservation_discount" name="reservation_discount" class="form-control" placeholder="<?php echo e(__('20')); ?>" required value="<?php echo e(Auth()->user()->reservation_discount); ?>">
                    <span class="invalid-feedback" for="reservation_discount" role="alert">
                        <strong></strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="text-end">
                <button type="button" onclick="submitDiscount()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</form><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/partials/settingDiscountCard.blade.php ENDPATH**/ ?>