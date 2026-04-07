<?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="row-<?php echo e($reservation->id); ?>">
        <td>
            <?php echo e($k+1); ?>

        </td>
        <td style="min-width: 8rem; max-width: 8rem;">
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2"><?php echo e($reservation->cabin->name); ?></span>
                </div>
            </div>
        </td>
        <td style="min-width: 10rem; max-width: 10rem;">
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2"><?php echo e($reservation->customer); ?></span>
                </div>
            </div>
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2"> <?php echo e(date('d/m/Y', strtotime($reservation->start))); ?></span>
                </div>
            </div>
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2"> <?php if($reservation->full_day_discount==null): ?> <?php echo e(date('H:i', strtotime($reservation->start))); ?> - <?php echo e(date('H:i', strtotime($reservation->end))); ?> hrs. <?php else: ?> Todo el día <?php endif; ?></span>
                </div>
            </div>
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2"><?php echo e($reservation->notes); ?></span>
                </div>
            </div>
        </td>
        <td class="text-end d-flex justify-content-evenly">
            <button class="btn btn-edit btn-icon rounded-circle btn-xs d-flex align-items-center justify-content-center" onclick="editRow(<?php echo e($reservation->id); ?>)" title="<?php echo e(__('Editar')); ?>">
                <i class="uil uil-edit d-flex align-items-center justify-content-center fs-5"></i>
            </button>
            <button href="#" class="btn btn-delete btn-icon rounded-circle btn-xs d-flex confirm-delete align-items-center justify-content-center" onclick="deleteRow(<?php echo e($reservation->id); ?>)" title="<?php echo e(__('Eliminar')); ?>">
                <i class="uil uil-trash d-flex align-items-center justify-content-center fs-5"></i>
            </button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/partials/jacuzzis/reservationTable.blade.php ENDPATH**/ ?>