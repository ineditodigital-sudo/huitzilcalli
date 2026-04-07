<?php $__currentLoopData = $cabins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $cabin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="row-<?php echo e($cabin->id); ?>">
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
                <span class="text-muted text-truncate-2"><?php echo e($cabin->name); ?></span>
            </div>
        </div>
    </td>
    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2"><?php echo e($cabin->description); ?></span>
            </div>
        </div>
    </td>

    <!--
    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2"><?php echo e($cabin->capacity); ?></span>
            </div>
        </div>
    </td>
    -->

    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2">$ <?php echo e(number_format($cabin->precio1, 2)); ?></span>
            </div>
        </div>
    </td>

    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2">$ <?php echo e(number_format($cabin->precio2, 2)); ?></span>
            </div>
        </div>
    </td>
    
    <td>
        <label class="aiz-switch aiz-switch-success mb-0">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" onchange="changeStatus(<?php echo e($cabin->id); ?>, this)" <?php if($cabin->active == 1): ?> checked <?php endif; ?> role="switch" id="flexSwitchCheckDefault">
            </div>
        </label>
    </td>
    
    <td class="text-end d-flex justify-content-evenly">
        <a class="btn btn-add btn-icon rounded-circle btn-xs d-flex aligm-items-center justify-content-center btn-cristal"  href="<?php echo e(route('detalles', ['slug' => $cabin->slug])); ?>" target="_blank" title="<?php echo e(__('Visualizar')); ?>">
            <i class="uil uil-eye d-flex align-items-center justify-content-center fs-5"></i>
        </a>
        <button class="btn btn-edit btn-icon rounded-circle btn-xs d-flex align-items-center justify-content-center" onclick="editRow(<?php echo e($cabin->id); ?>)" title="<?php echo e(__('Editar')); ?>">
            <i class="uil uil-edit d-flex align-items-center justify-content-center fs-5"></i>
        </button>
        <button href="#" class="btn btn-delete btn-icon rounded-circle btn-xs d-flex confirm-delete align-items-center justify-content-center" onclick="deleteRow(<?php echo e($cabin->id); ?>)" title="<?php echo e(__('Eliminar')); ?>">
            <i class="uil uil-trash d-flex align-items-center justify-content-center fs-5"></i>
        </button>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /Users/carlosmartinez/Downloads/laureles-web (6)/resources/views/backend/partials/cabinTable.blade.php ENDPATH**/ ?>