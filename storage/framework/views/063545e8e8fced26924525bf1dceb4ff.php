

<?php $__env->startSection('content'); ?>

<?php //var_dump($cabins[4]->amenities[0]->title) ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h4"><?php echo e(__('Cabañas')); ?></h1>
        </div>
        <div class="col text-end">
            <div class="btn-group">
                <a href="" onclick="newCabin()" data-bs-toggle="modal" data-bs-target="#new-cabin" class="btn btn-circle btn-info">
                    <span><?php echo e(__('Nuevo')); ?></span>
                </a>
            </div>
            <div class="btn-group">
                <a href="<?php echo e(route('cabañas.create')); ?>" class="btn btn-circle btn-outline-info active">
                    <span>
                        <i class="uil uil-list-ul"></i>
                    </span>
                </a>
                <a href="<?php echo e(route('cabañas.create')); ?>" class="btn btn-circle btn-outline-info">
                    <span>
                        <i class="uil uil-apps"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div id="grid">

        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table aiz-table mb-0 align-middle">
            <thead>
                <tr>
                    <th>
                        <!-- <div class="form-group">
                            <div class="aiz-checkbox-inline">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-all">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </div> -->
                        #
                    </th>
                    <th><?php echo e(__('Nombre')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(__('Descripción')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(__('Capacidad')); ?></th>
                    <th data-breakpoints="md"><?php echo e(__('Activo')); ?></th>
                    <th data-breakpoints="sm" class="text-end"><?php echo e(__('Opciones')); ?></th>
                </tr>
            </thead>
            <tbody id="table-body">
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

                    <td>
                        <div class="row gutters-5 w-200px w-md-300px mw-100">
                            <div class="col">
                                <span class="text-muted text-truncate-2"><?php echo e($cabin->capacity); ?></span>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<!-- New Cabin Modal -->
<div class="modal fade" id="new-cabin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo e(__('Nueva Cabaña')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('cabañas.create')); ?>" id="formCabaña" novalidate method="post" autocomplete="off" class="needs-validation">
                <?php echo csrf_field(); ?>
                <input type="text" id="cabin_id" name="cabin_id" readonly disabled>
                <input type="text" id="amenities" name="amenities" readonly disabled>
                <div class="modal-body">
                    <div class="row">
                        <h2 class="h5 mt-3 fw-bold"><?php echo e(__('Información Básica')); ?></h2>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="basic-url" class="form-label"><?php echo e(__('Nombre')); ?></label>
                                    <div class="input-group">
                                        <!-- <span class="input-group-text">
                                            <i class="uil uil-estate"></i>
                                        </span> -->
                                        <input type="text" id="name" name="nombre" class="form-control" placeholder="<?php echo e(__('Nombre de la cabaña')); ?>" required>
                                        <span class="invalid-feedback" for="name" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="basic-url" class="form-label"><?php echo e(__('Descripción')); ?></label>
                                    <div class="input-group">
                                        <textarea type="text" id="description" maxlength="500" name="descripción" rows="4" class="form-control" style="resize: none;" placeholder="<?php echo e(__('Descripción de la cabaña')); ?>" required></textarea>
                                        <span class="invalid-feedback" for="description" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="basic-url" class="form-label"><?php echo e(__('Cupo')); ?></label>
                                    <div class="input-group">
                                        <input type="number" step="1" id="capacity" name="capacidad" class="form-control" placeholder="<?php echo e(__('Cupo de la cabaña')); ?>" required>
                                        <span class="invalid-feedback" for="capacity" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="basic-url" class="form-label"><?php echo e(__('Latitud')); ?></label>
                                    <div class="input-group">
                                        <input type="text" id="lat" name="latitud" class="form-control" placeholder="<?php echo e(__('Latitud')); ?>" required value="21.92147554276003" readonly>
                                        <span class="invalid-feedback" for="lat" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="basic-url" class="form-label"><?php echo e(__('Longitud')); ?></label>
                                    <div class="input-group">
                                        <input type="text" id="lng" name="longitud" class="form-control" placeholder="<?php echo e(__('Longitud')); ?>" required value="-102.6948151589334" readonly>
                                        <span class="invalid-feedback" for="lng" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="basic-url" class="form-label"><?php echo e(__('Ubicación')); ?></label>
                                    <div id="map-form" class="bg-primary" style="min-height: 17rem;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row d-flex">
                                <h2 class="h5 mt-3 fw-bold">Elementos Incluidos</h2>

                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-1 col-lg-2 col-md-3 col-sm-3 mb-3">
                                            <label for="basic-url" class="form-label"><?php echo e(__('Ícono')); ?></label>
                                            <div class="input-group">
                                                <select type="text" id="icon" name="icon" class="form-select icon-select" placeholder="<?php echo e(__('Icono')); ?>" required>
                                                    <option value="users-alt" class="fs-5"> &#xea11; </option>
                                                    <option value="restaurant" class="fs-5"> &#xe9a8; </option>
                                                    <option value="bath" class="fs-5"> &#xec4a; </option>
                                                    <option value="swimmer" class="fs-5"> &#xeb20; </option>
                                                    <option value="fire" class="fs-5"> &#xec4d; </option>
                                                    <option value="tv-retro" class="fs-5"> &#xe975; </option>
                                                    <option value="wifi" class="fs-5"> &#xe97f; </option>
                                                </select>
                                                <span class="invalid-feedback" for="icon" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-3 mb-3">
                                            <label for="basic-url" class="form-label"><?php echo e(__('Título')); ?></label>
                                            <div class="input-group">
                                                <input type="text" id="title" name="title" class="form-control" placeholder="<?php echo e(__('Título')); ?>" required>
                                                <span class="invalid-feedback" for="title" role="alert">
                                                    <strong>Este campo es obligatorio</strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="basic-url" class="form-label"><?php echo e(__('Especificaciones')); ?></label>
                                            <div class="input-group">
                                                <input type="text" id="specifications" name="specifications" class="form-control" placeholder="<?php echo e(__('Especificaciones')); ?>" required>
                                                <span class="invalid-feedback" for="specifications" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <label for="">&nbsp;</label>
                                            <button type="button" onclick="saveAmenidad()" class="btn btn-outline-secondary btn-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="uil uil-save fs-5 d-flex align-items-center justify-content-center"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="amenidades-container">
                                    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 d-flex align-items-center mb-3 amenidad-card" id="amenidad-1">
                                        <div class="d-flex flex-fill p-2 rounded-3 position-relative" style="border: 1px solid #e2e2e2">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                                    <i class="p-0 m-0 uil uil-bath fs-4"></i>
                                                </span>    
                                            </div>
                                            <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                                <h6 class="m-0 fw-bold">Amenidad 1</h6>
                                                <p class="m-0" style="color: #bbb">términos</p>
                                            </div>
                                            <button type="button" onclick="removeItem(1)" class="btn btn-xs btn-danger text-white badge-pill position-absolute top-0 start-100 translate-middle p-1 rounded-circle d-flex justify-content-center align-items-center">
                                                <i class="uil uil-times d-flex align-items-center justify-content-center"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row d-flex">
                                <h2 class="h5 mt-3 fw-bold">Galería</h2>
                            </div>
                            <div id="drop" style="min-height: 8rem; width: 100%; border-radius: 0.5rem; border: 1px solid #ccc">
                            </div>
                        </div>
                    
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancelar')); ?></button>
                <button type="button" id="submitData" onClick="submitData()" class="btn btn-primary"><?php echo e(__('Guardar')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb-ZeMACsdzDw_3WHtkVhg6vbWVXjfRaw" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initDropzone();
            // initGrid();
        }, false);

        let marker;
        let myDropzone;

        const newCabin = () => {
            resetForm();
            initMap();
        }

        const initMap = (lat = 21.92147554276003, lng = -102.6948151589334) => {

            let myLatLng = { lat: lat, lng: lng };
            map = new google.maps.Map(document.getElementById("map-form"), {
                center: myLatLng, 
                zoom: 15,
            });

            marker = new google.maps.Marker({
                position: myLatLng,
                title: "Ubicación",
                map: map,
                draggable: true,
            });

            marker.addListener("dragend", (e)=>{
                // console.log({
                //     lat: e.latLng.lat(),
                //     lng: e.latLng.lng()
                // });

                document.getElementById('lat').value = e.latLng.lat();
                document.getElementById('lng').value = e.latLng.lng();
            });
        }

        const loadData = () => {
            $.ajax({
                url: "<?php echo e(route('cabañas.show', ['id' => 0])); ?>",
                method: 'GET',
                success: (res) => {
                    if(res.table_view){
                        $('#table-body').html(res.table_view);
                    }
                }
            })
        }

        const editRow = (id) => {
            // console.log({id});
            $.ajax({
                url: '/admin/cabañas/ver/'+id,
                method: 'GET',
                beforeSend: () => {
                    resetForm();
                },
                success: (res) => {
                    // console.log({data: res.data});
                    let datos = res.data;
                    if(datos){
                        $('#cabin_id').val(datos.id);
                        
                        $('#amenities').val(JSON.stringify(datos.amenities));
                        $('#name').val(datos.name);
                        $('#description').val(datos.description);
                        $('#lat').val(datos.lat);
                        $('#lng').val(datos.lng);
                        $('#capacity').val(datos.capacity);
                        initMap(+datos.lat, +datos.lng);

                        let html = '';
                        datos.amenities.forEach((el, count) => {
                            html += `
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 d-flex align-items-center mb-3 amenidad-card" id="amenidad-${el.id}">
                                    <div class="d-flex flex-fill p-2 rounded-3 position-relative" style="border: 1px solid #e2e2e2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                                <i class="p-0 m-0 uil uil-${el.icon} fs-4"></i>
                                            </span>    
                                        </div>
                                        <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                            <h6 class="m-0 fw-bold">${el.title}</h6>
                                            <p class="m-0" style="color: #bbb">${el.specifications}</p>
                                        </div>
                                        <button type="button" onclick="removeItem(${el.id})" class="btn btn-xs btn-danger text-white badge-pill position-absolute top-0 start-100 translate-middle p-1 rounded-circle d-flex justify-content-center align-items-center">
                                            <i class="uil uil-times d-flex align-items-center justify-content-center"></i>
                                        </button>
                                    </div>
                                </div>
                            `;
                        })
                        document.getElementById('amenidades-container').innerHTML = html;
                        $('#new-cabin').modal('show');
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
                title: 'Eliminar Cabaña',
                text: "¿Estás seguro que quieres eliminar esta cabaña?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f4a83e',
                cancelButtonColor: '#ff5b64',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/cabañas/eliminar/"+id,
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
                }else{

                }
            })
        }

        const saveAmenidad = () => {
            let icon = document.getElementById('icon').value;
            let title = document.getElementById('title').value;
            let specifications = document.getElementById('specifications').value;

            if(title.trim() == ''){
                if(!$('#title').hasClass('is-invalid')){
                    $('#title').addClass('is-invalid')
                }
                // if($('span[for="title"]').hasClass('d-none')){
                //     $('span[for="title"]').removeClass('d-none')
                // }
                return;
            }
            
                $('#title').removeClass('is-invalid')
            // console.log({ icon, title, specifications});

            let elements = document.getElementsByClassName('amenidad-card');
            let count = elements.length>0 ? elements[elements.length-1].id.split('-')[1] : 0;

            let auxAmenities = document.getElementById('amenities');
            let amenities = JSON.parse(auxAmenities.value != '' ? auxAmenities.value : '[]');
            // console.log(amenities);
            amenities.push({ id: count+1, icon, title, specifications})
            auxAmenities.value = JSON.stringify(amenities);

            let html = document.getElementById('amenidades-container').innerHTML;
            html += `
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 d-flex align-items-center mb-3 amenidad-card" id="amenidad-${count+1}">
                    <div class="d-flex flex-fill p-2 rounded-3 position-relative" style="border: 1px solid #e2e2e2">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="text-dark rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; background: hsla(95,6%,15%,0.1)">
                                <i class="p-0 m-0 uil uil-${icon} fs-4"></i>
                            </span>    
                        </div>
                        <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                            <h6 class="m-0 fw-bold">${title}</h6>
                            <p class="m-0" style="color: #bbb">${specifications}</p>
                        </div>
                        <button type="button" onclick="removeItem(${count+1})" class="btn btn-xs btn-danger text-white badge-pill position-absolute top-0 start-100 translate-middle p-1 rounded-circle d-flex justify-content-center align-items-center">
                            <i class="uil uil-times d-flex align-items-center justify-content-center"></i>
                        </button>
                    </div>
                </div>
            `;

            document.getElementById('amenidades-container').innerHTML = html;

            document.getElementById('icon').value = 'users-alt';
            document.getElementById('title').value = '';
            document.getElementById('specifications').value = '';
        }

        const removeItem = (id) => {
            document.getElementById('amenidad-'+id).remove();
            let auxAmenities = document.getElementById('amenities');
            let amenities = JSON.parse(auxAmenities.value);
            // console.log(amenities);

            let index = amenities.findIndex((el) => el.id === id);
            if(index != -1){
                amenities.splice(index,1);
            }
            // amenities.push({ id: count+1, icon, title, specifications})
            auxAmenities.value = JSON.stringify(amenities);
        }

        const initDropzone = () => {
            document.getElementById('drop').classList = 'dropzone';

            let id = document.getElementById('cabin_id').value;

            myDropzone = new Dropzone("#drop", {
                url: "/admin/upload/" + (id == '' ? 0 : id) ,
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                uploadMultiple: true,
                addRemoveLinks: true,
                autoProcessQueue: false,
                parallelUploads: 30,
                maxFiles: 30,
                init: () => {
                    // console.log({this: myDropzone});
                    // let myDropzone2 = this;

                    // document.getElementById('submitData').addEventListener("click", function(e) {
                    //     e.preventDefault();
                    //     e.stopPropagation();
                    //     myDropzone.processQueue();
                    // });
                }
            });

            myDropzone.on("sendingmultiple", function() {
                console.log('sending');
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            myDropzone.on("successmultiple", function(files, response) {
                console.log('success');
                
                let auxId = document.getElementById('cabin_id').value;
                if(auxId != ''){
                    showToast('success', 'Registro actualizado');
                }else{
                    showToast('success', 'Registro creado');
                }

                loadData();
                resetForm();

                $('#new-cabin').modal('hide');
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });
            myDropzone.on("errormultiple", function(files, response) {
                let auxId = document.getElementById('cabin_id').value;
                if(auxId != ''){
                    showToast('error', 'Error al actualizar imágenes');
                }else{
                    showToast('success', 'Error al registrar imágenes');
                }
                
                console.log('error');
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            }); 
        }

        const submitData = () => {
            let auxId = document.getElementById('cabin_id').value;
            let auxAmenities = document.getElementById('amenities').value;
            // document.getElementById('formCabaña').submit();
            $.ajax({
                url: "<?php echo e(route('cabañas.store')); ?>",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                data: {
                    id: (auxId != '' ? auxId : 0),
                    name: document.getElementById('name').value,
                    description: document.getElementById('description').value,
                    capacity: document.getElementById('capacity').value,
                    lat: document.getElementById('lat').value,
                    lng: document.getElementById('lng').value,
                    amenities: auxAmenities != '' ? auxAmenities : '[]',
                },
                beforeSend: () => {
                    // document.querySelectorAll(`.invalid-feedback`).forEach(el => {
                    //     let list = el.classList.value;
                    //     // console.log({list});
                    //     if(!list.includes('d-none')){
                    //         el.classList.add('d-none');
                    //     }
                    // })
                },
                success: () => {
                    let aux = myDropzone.getQueuedFiles();
                    // console.log({aux});

                    if(myDropzone.getQueuedFiles().length > 0){
                        myDropzone.options.url = "/admin/upload/" + (auxId == '' ? 0 : auxId);
                        myDropzone.processQueue();
                    }else{
                        if(auxId != ''){
                            showToast('success', 'Registro actualizado');
                        }else{
                            showToast('success', 'Registro creado');
                        }

                        loadData();
                        resetForm();
                        $('#new-cabin').modal('hide');
                    }

                    // loadData();
                    //resetForm();
                },
                error: (error) => {
                    let errors = error.responseJSON.errors;

                    if(auxId != ''){
                        showToast('error', 'Error al actualizar el registro');
                    }else{
                        showToast('error', 'Error al crear el registro');
                    }

                    document.querySelectorAll('#formCabaña .form-control').forEach(el => {
                        el.classList.remove('is-invalid');
                    });

                    Object.entries(errors).forEach(([e, value]) => {
                        document.getElementById(e).classList.toggle('is-invalid');
                        document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                        // document.querySelector(`span[for="${e}"]`).classList.toggle('d-none');
                    })
                }
                
            })
        }

        const changeStatus = (id,el) => {
            console.log({id, el});
            $.ajax({
                url: '<?php echo e(route("cabaña.status")); ?>',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                data: {
                    id: id,
                    status: el.checked ? 1 : 0
                },
                success: (res) => {
                    // console.log('Actualizado correctamente')
                    showToast('success', 'Estatus actualizado');
                },
                error: (error) => {
                    showToast('error', 'Error al actualizar estatus');
                }
            })
        }

        const resetForm = () => {
            document.getElementById('formCabaña').reset();
            $('#formCabaña .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
            document.getElementById('amenidades-container').innerHTML = '';
        }

        const initGrid = () => {
            $.ajax({
                url: '<?php echo e(route("cabañas.list")); ?>',
                method: 'GET',
                success: (res) => {
                    $("#grid").dxDataGrid({
                        dataSource: res.data,
                        keyExpr: "id",
                        columnFixing: { enabled: true },
                        filterRow: { visible: true },
                        searchPanel: { visible: true },
                        responsive: {enabled: true},
                        editing: {
                            mode: "popup",
                            allowUpdating: true,
                            allowDeleting: true,
                            allowAdding: false,
                            useIcons: true
                        },
                        columns: [
                            {
                                dataField: 'name',
                                caption: 'Nombre'
                            },{
                                dataField: 'description',
                                caption: 'Descripción',
                            },{
                                dataField: 'capacity',
                                caption: 'Capacidad'
                            },{
                                dataField: 'active',
                                caption: 'Estatus'
                            }
                        ],
                        initNewRow: function(e) {
                            // e.preventDefault();
                            console.log('new-modal');
                        }
                    });
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laureles-web\resources\views/backend/cabin/index.blade.php ENDPATH**/ ?>