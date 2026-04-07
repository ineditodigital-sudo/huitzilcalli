<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h4"><?php echo e(__('Reservaciones')); ?> <?php if(!empty($cabin)): ?> - <?php echo e($cabin->name); ?> <?php endif; ?></h1>
        </div>

        <div class="col text-end">
            <div class="btn-group">
                <button onclick="newReservation()" data-bs-toggle="modal" data-bs-target="#new-reservation" class="btn btn-circle btn-info">
                    <span><?php echo e(__('Nuevo')); ?></span>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" id="btn-table-view" onClick="toggleView('table')" class="btn btn-circle btn-outline-info">
                    <span>
                        <i class="uil uil-list-ul"></i>
                    </span>
                </button>
                <button type="button" id="btn-calendar-view" onClick="toggleView('calendar')" class="btn btn-circle btn-outline-info active">
                    <span>
                        <i class="uil uil-apps"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive d-none" id="table-section">
        <table class="table aiz-table mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Cabaña')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(__('Cliente')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(__('Fechas')); ?></th>
                    <th data-breakpoints="md"><?php echo e(__('Notas')); ?></th>
                    <th data-breakpoints="sm" class="text-end"><?php echo e(__('Opciones')); ?></th>
                </tr>
            </thead>
            <tbody id="table-body">
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
                                    <span class="text-muted text-truncate-2"><?php echo e(date('d/m/Y H:i', strtotime($reservation->start))); ?> hrs. - <?php echo e(date('d/m/Y H:i', strtotime($reservation->end))); ?> hrs.</span>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<div id="calendar-section" class="row">
    <div class="col-lg-4 mb-3">
        <div class="card revs-card-container" style="max-height: 80vh; height: 80vh; min-height: 80vh;">
            <div class="card-header d-flex align-items-center">
                <i class="uil uil-schedule me-3 fs-5"></i>
                <h2 class="fs-4 fw-bold mb-0">Reservaciones</h2>
            </div>
            
            <form class="form-group" id="reservation-form">
                <div class="row justify-content-start px-2">
                    <div class="col-12">
                        <div class="d-flex">
                            <input type="text" name="nombreCliente" id="nombreReserva" placeholder="Buscar por nombre" class="form-control w-100">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex mt-3 mb-2">
                            <input type="date" name="fechaReserva" id="fechaReserva" class="form-control">
                            <i class="uil uil-multiply ms-2" style="align-self: center; display: none;" id="limpiarInput"></i>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body overflow-auto">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    
    <button class="btn btn-primary d-none" type="button" id="canvasBtn" data-bs-toggle="offcanvas" data-bs-target="#disableDaysCanvas" aria-controls="offcanvasWithBothOptions">Enable both scrolling & backdrop</button>
    
    <div class="offcanvas offcanvas-start shadow border-0" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="disableDaysCanvas" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">&nbsp;</h5>
            <button type="button" class="btn-close" id="closeCanvasBtn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <input type="text" hidden name="selectedDay" id="selectedDay" />
            <h2 class="fs-2 fw-bold text-capitalize" id="selectedDayText"></h2>
            <div class="d-flex align-items-center justify-content-start mb-3">
                <div class="bg-primary" style="height: 0.35rem; width: 80%; border-radius: 5rem; overflow: hidden"></div>
            </div>
            <div class="form-text d-flex text-secondary"><i class="uil uil-info-circle me-1"></i><p>Haz clic en el nombre de la cabaña para cambiar su estatus en el día seleccionado.</p></div>
            <!--<p class="fs-5 text-secondary"><?php echo e(__('Deshabilitar esta fecha para las siguientes cabañas:')); ?></p>-->
            <div class="row mb-1">
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="d-flex w-100 align-items-center">
                        <div class="bg-secondary me-2" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 1.5rem; height: auto;"></div>
                        <p class="mb-0"><?php echo e(__('Habilitado')); ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="d-flex w-100 align-items-center">
                        <div class="border border-secondary border-1 me-2" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 1.5rem; height: auto;"></div>
                        <p class="mb-0"><?php echo e(__('Deshabilitado')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row" id="canvas-body">
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<!-- New Cabin Modal -->
<div class="modal fade" id="new-reservation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="new-reservation-title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formReservation" novalidate method="post" autocomplete="off" class="needs-validation">
                <?php echo csrf_field(); ?>
                <input type="text" id="reservation_id" name="reservation_id" readonly hidden disabled>
                <div class="modal-body">
                    <div class="row">
                        <!--<h2 class="h5 mt-3 fw-bold"><?php echo e(__('Información Básica')); ?></h2>-->
                        <div class="col-sm-6 mb-3 <?php if(!empty($cabin)): ?> d-none <?php endif; ?>">
                            <label for="basic-url" class="form-label"><?php echo e(__('Cabaña')); ?></label>
                            <div class="input-group has-validation">
                                <select type="text" id="cabin_id" name="cabin_id" class="form-select" placeholder="<?php echo e(__('Cabaña')); ?>" required>
                                    <?php $__currentLoopData = $cabins_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cabin_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cabin_cat->id); ?>" <?php if(!empty($cabin) && $cabin->id == $cabin_cat->id): ?> selected <?php endif; ?> class="fs-5"><?php echo e($cabin_cat->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="invalid-feedback" for="cabin_id" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-<?php echo e((!empty($cabin)) ? '12' : '6'); ?> mb-3">
                            <label for="basic-url" class="form-label"><?php echo e(__('Cliente')); ?></label>
                            <div class="input-group has-validation">
                                <input type="text" id="customer" maxlength="255" name="customer" class="form-control" placeholder="<?php echo e(__('Nombre del cliente')); ?>" required />
                                <span class="invalid-feedback" for="customer" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-4 mb-3">
                            <label for="basic-url" class="form-label"><?php echo e(__('Teléfono')); ?></label>
                            <div class="input-group has-validation">
                                <input type="text" id="phone_number" maxlength="20" name="phone_number" class="form-control" placeholder="<?php echo e(__('Número telefónico del cliente')); ?>" required />
                                <span class="invalid-feedback" for="phone_number" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="basic-url" class="form-label"><?php echo e(__('Entrada')); ?></label>
                            <div class="input-group has-validation">
                                <input type="datetime-local" id="start" name="start" class="form-control" placeholder="<?php echo e(__('Hora y Día de Llegada')); ?>" required />
                                <span class="invalid-feedback" for="start" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="basic-url" class="form-label"><?php echo e(__('Salida')); ?></label>
                            <div class="input-group has-validation">
                                <input type="datetime-local" id="end" name="end" class="form-control" placeholder="<?php echo e(__('Hora y Día de Salida')); ?>" required />
                                <span class="invalid-feedback" for="end" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mb-3">
                            <label for="basic-url" class="form-label"><?php echo e(__('Notas')); ?></label>
                            <div class="input-group has-validation">
                                <textarea type="text" id="notes" maxlength="500" name="notes" rows="4" class="form-control" style="resize: none;" placeholder="<?php echo e(__('Notas de la resrevación')); ?>" required></textarea>
                                <span class="invalid-feedback" for="notes" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancelar')); ?></button>
                <button type="button" id="submitData" onClick="submitData()" class="btn btn-primary text-white"><?php echo e(__('Guardar')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        const newReservation = () => {
            $('#new-reservation-title').text('Nueva Reservación');
            // resetForm();
        }
        
        var calendar;
        var myp;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            
            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                selectable: false,
                locale: 'es',
                showNonCurrentDates: true,
                dateClick: function(info) {
                    console.log({info});
                    // console.log({date: info.date.toLocaleDateString("es-MX", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })})
                    
                    $('#selectedDay').val(info.dateStr);
                    
                    let dayText = info.date.toLocaleDateString("es-MX", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                    $('#selectedDayText').text(dayText);
                    
                    $.ajax({
                        url: '<?php echo e(route('reservaciones.dia')); ?>',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        data: {
                            'date': info.dateStr,
                            <?php if(!empty($cabin)): ?>
                            'cabin_id': '<?php echo e($cabin->id); ?>',
                            <?php endif; ?>
                        },
                        success: (res) => {
                            // console.log({res});
                            // $('#canvas-body').html(res.canvas_view);
                        },
                        error: (error) => {
                            console.log({error});
                            showToast('error', 'Error al obtener datos');
                        }
                    })
                    
                    if(!$('#disableDaysCanvas').hasClass('show')){
                        // $('#canvasBtn').click();
                    }
                    
                    try{
                        myp.hide();
                    }catch(e){}
                    
                    let end = info.date;
                    end.setDate(end.getDate() + 1);
                    
                    let list = '';
                    $.ajax({
                        url: "<?php echo e(route('reservaciones.dia2', ['service_type' => 'cabañas'])); ?>",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        data: {
                            'start': info.dateStr,
                            'end': end.getFullYear() + '-' + (end.getMonth()+1) + '-' + end.getDate()
                        },
                        success: (res) => {
                            console.log({r: res.data});
                            
                            list = '';
                            
                            if(res.data){
                                res.data.forEach(reservation => {
                                    list += `<li><strong>${reservation.cabinName}</strong>: ${reservation.customer}</li>`;
                                });
                            }
                            
                            let textDate = '';
                            myp = new bootstrap.Popover(info.dayEl, {
                                trigger: 'focus', 
                                content: `
                                    <div class="d-flex flex-column position-relative">
                                        <h6 class="text-center fw-bold">${info.dateStr}</h6>
                                        <ul class="mb-0">
                                            ${list}
                                        </ul>
                                        <a class="bg-transparent btn btn-light position-absolute top-0 end-0 d-none" onclick="dimissPopover()">
                                            <i class="uil uil-times"></i>
                                        </a>
                                    </div>
                                `, 
                                placement: 'top', 
                                html: true
                            });
                            
                            myp.show();
                            
                            // $('#canvas-body').html(res.canvas_view);
                        },
                        error: (error) => {
                            console.log({error});
                            showToast('error', 'Error al obtener datos');
                        }
                    })
                    
                    
                    
                },
                select: function(info) {
                  console.log({sel: info});
                  
                  let end = new Date(info.end);
                  end.setDate(end.getDate() - 1);
                  // let auxEnd = new Date(d.end - 1);
                  let dateObj = {
                      start: (new Intl.DateTimeFormat('es-MX', { dateStyle: 'full', timeStyle: 'short', timeZone: 'America/Mexico_City' }).format(new Date(info.start))),
                      end: (new Intl.DateTimeFormat('es-MX', { dateStyle: 'full', timeStyle: 'short', timeZone: 'America/Mexico_City' }).format(new Date(end)))
                  }
                  selectedDates = dateObj;
                  
                  // console.log({dateObj});
                },
                unselect: function(e, view){
                    myp.hide();
                },
                eventSourceFailure: (error) => {
                    if (error instanceof JsonRequestError) {
                        console.log(`Request to ${error.response.url} failed`);
                        showToast('error', 'Error al obtener reservaciones');
                    }
                }
                /*
                initialEvents: [
                    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r => $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            start: '<?php echo e($reservation->start); ?>',
                            end: '<?php echo e($reservation->end); ?>',
                            title: '<?php echo e($reservation->customer); ?> - <?php echo e($reservation->cabin->name); ?>',
                            displayEventTime: false,
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
                */
            });
            
            if(isMobile()){
                calendar.setOption('eventDisplay', 'list-item');
                calendar.setOption('displayEventTime', false);
                
                calendar.setOption('eventSources', [
                    'https://huitzilcalli.com/admin/rev/cabañas/mobilejson/<?php if(!empty($cabin)): ?><?php echo e($cabin->id); ?><?php else: ?><?php echo e(__('0')); ?><?php endif; ?>',
                    'https://huitzilcalli.com/admin/dias/json/<?php if(!empty($cabin)): ?><?php echo e($cabin->id); ?><?php else: ?><?php echo e(__('0')); ?><?php endif; ?>'
                ]);
            }else{
                //calendar.setOption('eventDisplay', 'list-item');
                calendar.setOption('displayEventTime', false);
                
                calendar.setOption('eventSources', [
                    'https://huitzilcalli.com/admin/res/cabañas/json/<?php if(!empty($cabin)): ?><?php echo e($cabin->id); ?><?php else: ?><?php echo e(__('0')); ?><?php endif; ?>',
                    'https://huitzilcalli.com/admin/dias/json/<?php if(!empty($cabin)): ?><?php echo e($cabin->id); ?><?php else: ?><?php echo e(__('0')); ?><?php endif; ?>'
                ]);
            }
            
            calendar.render();
            
            $(document).bind('click', function (e) {
                dimissPopover();
            });
        });
        
        const dimissPopover = () => {
            try{
                myp.hide();
            }catch(e){}
        }
        
        const toggleView = (viewType) => {
            if(viewType == 'table'){
                $('#table-section').removeClass('d-none');
                if(!$('#calendar-section').hasClass('d-none')){
                    $('#calendar-section').addClass('d-none');    
                }
                if(!$('#btn-table-view').hasClass('active')){
                    $('#btn-table-view').addClass('active');
                }
                $('#btn-calendar-view').removeClass('active');
            }else{
                $('#calendar-section').removeClass('d-none');
                if(!$('#table-section').hasClass('d-none')){
                    $('#table-section').addClass('d-none');    
                }
                if(!$('#btn-calendar-view').hasClass('active')){
                    $('#btn-calendar-view').addClass('active');
                }
                $('#btn-table-view').removeClass('active');
                calendar.updateSize();
            }
        }
        
        const loadData = () => {
            <?php
                $params = [];
                if(!empty($cabin)){
                    $params = ['service_type' => 'cabañas', 'id' => 0, 'cabin_id' => $cabin->id];
                }else{
                    $params = ['service_type' => 'cabañas', 'id' => 0];
                }
            ?>
            
            $.ajax({
                url: "<?php echo e(route('reservaciones.show', $params)); ?>",
                method: 'GET',
                success: (res) => {
                    // if(res.table_view){
                        $('#table-body').html(res.table_view);
                    // }
                    $($('#calendar-section .card-body')[0]).html(res.detail_view);
                    
                    //calendar.removeAllEvents();
                    calendar.refetchEvents();
                },
                error: (error) => {
                    console.log({error});
                    showToast('error', 'Error al obtener datos');
                } 
            })
        }

        
        const editRow = (id) => {
            $('#new-reservation-title').text('Editar Reservación');
            let params = '';
            
            $.ajax({
                url: '/admin/reserva/ver/'+id,
                method: 'GET',
                beforeSend: () => {
                    resetForm();
                },
                success: (res) => {
                    let datos = res.data;
                    if(datos){
                        $('#reservation_id').val(datos.id);
                        $('#cabin_id').val(datos.cabin_id);
                        $('#customer').val(datos.customer);
                        $('#phone_number').val(datos.phone_number);
                        $('#start').val(datos.start);
                        $('#end').val(datos.end);
                        $('#notes').val(datos.notes);
                        
                        $('#new-reservation').modal('show');
                    }
                },
                error: (error) => {
                    console.log({error});
                    showToast('error', 'Error al cargar datos');
                }
            })
        }
        
        const deleteRow = (id) => {
            Swal.fire({
                title: 'Eliminar Reservación',
                text: "¿Estás seguro que quieres eliminar esta reservación?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f4a83e',
                cancelButtonColor: '#ff5b64',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/reserva/eliminar/"+id,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        success: () => {
                            loadData();
                            showToast('success', 'Registro eliminado');
                        },
                        error: (error) => {
                            console.log({error});
                            showToast('error', 'Error al eliminar el registro');
                        }
                    })
                }
            })
        }
        
        const submitData = () => {
            let auxId = document.getElementById('reservation_id').value;
            
            $.ajax({
                url: "<?php echo e(route('reservaciones.store', ['service_type' => 'cabañas'])); ?>",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                data: {
                    id: (auxId != '' ? auxId : 0),
                    cabin_id: document.getElementById('cabin_id').value,
                    customer: document.getElementById('customer').value,
                    phone_number: document.getElementById('phone_number').value,
                    start: document.getElementById('start').value,
                    end: document.getElementById('end').value,
                    notes: document.getElementById('notes').value
                },
                success: () => {
                    if(auxId != ''){
                        showToast('success', 'Registro actualizado');
                    }else{
                        showToast('success', 'Registro creado');
                    }

                    loadData();
                    resetForm();
                    
                    $('#new-reservation').modal('hide');
                },
                error: (error) => {
                    let errors = error.responseJSON.errors;

                    if(auxId != ''){
                        showToast('error', 'Error al actualizar el registro');
                    }else{
                        showToast('error', 'Error al crear el registro');
                    }

                    document.querySelectorAll('#formReservation .form-control').forEach(el => {
                        el.classList.remove('is-invalid');
                    });

                    Object.entries(errors).forEach(([e, value]) => {
                        document.getElementById(e).classList.toggle('is-invalid');
                        document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                    })
                }
                
            })
        }
        
        const resetForm = () => {
            document.getElementById('formReservation').reset();
            $('#formReservation .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
        }
        
        const disableDay = (btn, cabin_id) => {
            $(btn).toggleClass('active');
            $.ajax({
                url: "/admin/deshabilitar/dia",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                data: {
                    'date': $('#selectedDay').val(),
                    'cabin_id': cabin_id,
                    'status': ($(btn).hasClass('active')) ? 1 : 0,
                },
                success: (res) => {
                    // console.log({res});
                    showToast('success', 'Registro actualizado');
                },
                error: (error) => {
                    console.log({error})
                    $(btn).toggleClass('active');
                    showToast('error', 'Error al deshabilitar día');
                },
                complete: () => {
                    calendar.refetchEvents()
                }
            });
        }
        
        const isMobile = () => {
            return (
                navigator.userAgent.match(/Android/i)
             || navigator.userAgent.match(/webOS/i)
             || navigator.userAgent.match(/iPhone/i)
             || navigator.userAgent.match(/iPad/i)
             || navigator.userAgent.match(/iPod/i)
             || navigator.userAgent.match(/BlackBerry/i)
             || navigator.userAgent.match(/Windows Phone/i)
            )
        }


        const loadFilteredData = (startDate) => {
            <?php
                $params = [
                    'start' => isset($startDate) ? $startDate : null,
                ];
            ?>
            
                console.log('Fecha de inicio seleccionada:', startDate); 
            $.ajax({
                url: "<?php echo e(route('reservaciones.search')); ?>?start=" + startDate + "&service_type=cabañas",
                method: 'GET',
                success: (res) => {
                    console.log("RES:::::", res);
                    $('#table-body').html(res.table_view);
                    // }
                    $($('#calendar-section .card-body')[0]).html(res.detail_view);
                    
                    //calendar.removeAllEvents();
                    calendar.refetchEvents();
                },
                error: (error) => {
                    console.log({ error });
                    showToast('error', 'Error al obtener datos');
                } 
            });
        };

        const loadDataByName = (name) => {
            <?php
                $params = [
                    'name' => isset($name) ? $name : null,
                    'service_type' => "cabañas"
                ];

            ?>
            
                console.log('Nombre buscado:', name); 
            $.ajax({
                url: "<?php echo e(route('reservaciones.searchByName')); ?>?name=" + name + "&service_type=cabañas", 
                method: 'GET',
                success: (res) => {
                    console.log("RES:::::", res);
                    
                    $('#table-body').html(res.table_view);
                    // }
                    $($('#calendar-section .card-body')[0]).html(res.detail_view);
                    
                    //calendar.removeAllEvents();
                    calendar.refetchEvents();
                },
                error: (error) => {
                    console.log({ error });
                    showToast('error', 'Error al obtener datos');
                } 
            });
        };


        $(document).ready(() => {
            
            $('#reservation-form').on('submit', function(e) {
                e.preventDefault(); // Evitar el envío del formulario

                const startDate = $('#fechaReserva').val(); 
                const nombre = $('#nombreReserva').val();
                console.log("DATOS A ENVIAR AL FILTRO::: ", {startDate, nombre});
                if (startDate) {
                    loadFilteredData(startDate);
                }
            });

            $('#nombreReserva').on('input', function() {
                const name = $(this).val();
                console.log("Nombre ingresado: ", name);
                $('#fechaReserva').val('');
                $('#limpiarInput').hide();
                loadDataByName(name);
            });

            $('#fechaReserva').on('change', function() {
                const startDate = $(this).val();
                console.log("Fecha seleccionada: ", startDate);
                $('#limpiarInput').show();
                $('#nombreReserva').val('');
                loadFilteredData(startDate);
            });

            $('#limpiarInput').on('click', function() {
                $('#fechaReserva').val('');
                $(this).hide();
                loadData();
            });
        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/huitzilcalli/public_html/resources/views/backend/reservation/index.blade.php ENDPATH**/ ?>