<?php $__currentLoopData = $jacuzzis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $jacuzzi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="row-<?php echo e($jacuzzi->id); ?>">
    <td>
        <!-- <div class="form-group d-inline-block">
            <label class="aiz-checkbox">
                <input type="checkbox" class="check-one" name="id[]" value="">
                <span class="aiz-square-check"></span>
            </label>
        </div> -->
        <?php echo e($k+1); ?>

    </td>
    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <!-- <div class="col-auto">
                <img src="" alt="Image" class="size-50px img-fit">
            </div> -->
            <div class="col">
                <span class="text-muted text-truncate-2"><?php echo e($jacuzzi->name); ?></span>
            </div>
        </div>
    </td>
    <td style="max-width: 10rem">
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;"><?php echo e($jacuzzi->description); ?></span>
            </div>
        </div>
    </td>

    <!--
    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2"><?php echo e($jacuzzi->capacity); ?></span>
            </div>
        </div>
    </td>
    -->

    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2">$ <?php echo e(number_format($jacuzzi->precio1, 2)); ?></span>
            </div>
        </div>
    </td>

    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2">$ <?php echo e(number_format($jacuzzi->precio2, 2)); ?></span>
            </div>
        </div>
    </td>
    
    <td>
        <label class="aiz-switch aiz-switch-success mb-0">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" onchange="changeStatus(<?php echo e($jacuzzi->id); ?>, this)" <?php if($jacuzzi->active == 1): ?> checked <?php endif; ?> role="switch" id="flexSwitchCheckDefault">
            </div>
        </label>
    </td>
    
    <td class="text-end d-flex justify-content-evenly">
        <a class="btn btn-add btn-icon rounded-circle btn-xs d-flex aligm-items-center justify-content-center btn-cristal"  href="<?php echo e(route('detallesJacuzzi', ['slug' => $jacuzzi->slug])); ?>" target="_blank" title="<?php echo e(__('Visualizar')); ?>">
            <i class="uil uil-eye d-flex align-items-center justify-content-center fs-5"></i>
        </a>
        <a class="btn btn-calendar btn-icon rounded-circle btn-xs d-flex aligm-items-center justify-content-center btn-cristal"  href="<?php echo e(route('reservaciones.jacuzzi', ['slug' => $jacuzzi->slug])); ?>" target="_blank" title="<?php echo e(__('Crear Reservación')); ?>">
            <i class="uil uil-calendar-alt d-flex align-items-center justify-content-center fs-5"></i>
        </a>
        <button class="btn btn-edit btn-icon rounded-circle btn-xs d-flex align-items-center justify-content-center" onclick="editRow(<?php echo e($jacuzzi->id); ?>)" title="<?php echo e(__('Editar')); ?>">
            <i class="uil uil-edit d-flex align-items-center justify-content-center fs-5"></i>
        </button>
        <button href="#" class="btn btn-delete btn-icon rounded-circle btn-xs d-flex confirm-delete align-items-center justify-content-center" onclick="deleteRow(<?php echo e($jacuzzi->id); ?>)" title="<?php echo e(__('Eliminar')); ?>">
            <i class="uil uil-trash d-flex align-items-center justify-content-center fs-5"></i>
        </button>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/laurelescalvillo/public_html/resources/views/backend/partials/jacuzziTable.blade.php ENDPATH**/ ?>