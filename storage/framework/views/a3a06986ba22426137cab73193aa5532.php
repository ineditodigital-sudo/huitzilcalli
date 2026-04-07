<?php
    // var_dump($cabin);
    $cabs = array_column($days->toArray(), 'cabin_id');
?>

<?php if(!empty($cabin)): ?>
    <div class="col-lg-6 col-md-12 mb-3">
        <button type="button" onclick="disableDay(this, <?php echo e($cabin->id); ?> )" class="w-100 btn btn-outline-secondary btn-lg d-flex align-items-center <?php if(!in_array($cabin->id, $cabs)): ?> active <?php endif; ?>" style="min-height: 4.5rem; max-height: 4.5rem;">
            <i class="uil uil-estate fs-5 me-2"></i>
            <?php echo e($cabin->name); ?>

        </button>
    </div>
<?php else: ?>
    <?php $__currentLoopData = $cabins_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c => $cabin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-6 col-md-12 mb-3">
            <button type="button" onclick="disableDay(this, <?php echo e($cabin->id); ?> )" class="w-100 btn btn-outline-secondary btn-lg d-flex align-items-center <?php if(!in_array($cabin->id, $cabs)): ?> active <?php endif; ?>" style="min-height: 4.5rem; max-height: 4.5rem;">
                <i class="uil uil-estate fs-5 me-2"></i>
                <?php echo e($cabin->name); ?>

            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/laurelescalvillo/public_html/temporal.huitzilcalli.com/resources/views/backend/partials/disableDaysCanvas.blade.php ENDPATH**/ ?>