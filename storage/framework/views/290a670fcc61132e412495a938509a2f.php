<?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r => $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="reservation-card p-2 mb-3 position-relative" style="border-radius: 0.5rem; border: 1px solid #eee">
        <div class="row mb-2">
            <div class="col-lg-2 col-md-3 col-3 d-flex justify-content-center align-items-center">
                <div class="bg-light d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 67%; border-radius: 0.5rem">
                    <i class="uil uil-user fs-4 text-secondary"></i>
                </div>
            </div>
            <div class="col-lg-10 col-9 d-flex flex-column justify-content-evenly">
                <p class="fw-bold text-uppercase m-0" style="font-size: 0.8rem; color: #dee2e6;">Cliente</p>
                <p class="m-0"><?php echo e($reservation->customer); ?> <?php if($reservation->phone_number): ?> (<?php echo e($reservation->phone_number); ?>) <?php endif; ?></p>
            </div>
        </div>
        <div class="row mb-2 px-3 calendar-pill">
            <div class="col-5 text-center py-1" style="border: 1px solid #272a2540; border-top-left-radius: 0.5rem; border-bottom-left-radius: 0.5rem">
                <p class="fw-bold text-uppercase m-0" style="font-size: 0.8rem; color: #dee2e6;">Entrada</p>
                <p class="m-0"><?php echo e(date('d/m/Y H:i', strtotime($reservation->start))); ?></p>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-2 d-flex justify-content-center align-items-center bg-secondary">
                <i class="uil uil-calendar-alt fs-4 text-primary"></i>
            </div>
            <div class="col-5 text-center py-1" style="border: 1px solid #272a2540; border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem">
                <p class="fw-bold text-uppercase m-0" style="font-size: 0.8rem; color: #dee2e6;">Salida</p>
                <p class="m-0"><?php echo e(date('d/m/Y H:i', strtotime($reservation->end))); ?></p>
            </div>
        </div>
        
        <?php if($reservation->notes): ?>
            <div class="accordion" id="accordion-<?php echo e($reservation->id); ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($reservation->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($reservation->id); ?>">
                        <?php echo e(__('Notas')); ?>

                    </button>
                    </h2>
                    <div id="collapse-<?php echo e($reservation->id); ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-<?php echo e($reservation->id); ?>">
                        <div class="accordion-body">
                            <?php echo e($reservation->notes); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="dropdown position-absolute top-0 end-0 border-0">
            <span class="badge rounded-pill" style="background-color: <?php echo e(is_null($reservation->cabin->color) ? '#194421' : $reservation->cabin->color); ?>">
                <?php echo e($reservation->cabin->name); ?>

            </span>
            <button type="button" class="btn btn-calendar btn-icon rounded-circle dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="uil uil-setting fs-5"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a style="cursor: pointer" class="dropdown-item" onclick="editRow(<?php echo e($reservation->id); ?>)">Editar</a></li>
                <li><a style="cursor: pointer" class="dropdown-item" onclick="deleteRow(<?php echo e($reservation->id); ?>)">Eliminar</a></li>
            </ul>
        </div>
        
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/huitzilcalli/public_html/resources/views/backend/partials/reservationCard.blade.php ENDPATH**/ ?>