@extends('backend.layouts.app')

@section('content')

@php 
    //var_dump($cabins[4]->amenities[0]->title) 
@endphp

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h4">{{ __('Cabañas') }}</h1>
        </div>
        <div class="col text-end">
            <div class="btn-group">
                <a href="" onclick="newCabin()" data-bs-toggle="modal" data-bs-target="#new-cabin" class="btn btn-circle btn-info">
                    <span>{{ __('Nuevo') }}</span>
                </a>
            </div>
            <div class="btn-group">
                <button type="button" id="btn-table-view" onclick="toggleView('table')" class="btn btn-circle btn-outline-info active">
                    <span>
                        <i class="uil uil-list-ul"></i>
                    </span>
                </button>
                <button type="button" id="btn-cards-view" onclick="toggleView('cards')" class="btn btn-circle btn-outline-info">
                    <span>
                        <i class="uil uil-apps"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="card d-none">
    <div class="card-body">
        <div id="grid">

        </div>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive" id="table-section">
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
                    <th>{{ __('Nombre')}}</th>
                    <th data-breakpoints="lg">{{ __('Descripción') }}</th>
                    <!--
                    <th data-breakpoints="lg">{{ __('Capacidad') }}</th>
                    -->
                    <th data-breakpoints="md">{{ __('Precio Dom-Vie') }}</th>
                    <th data-breakpoints="md">{{ __('Precio Sábado') }}</th>
                    <th data-breakpoints="md">{{ __('Estatus')}}</th>
                    <th data-breakpoints="sm" class="text-end">{{ __('Opciones') }}</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach($cabins as $k => $cabin)
                <tr id="row-{{ $cabin->id }}">
                    <td>
                        <!-- <div class="form-group d-inline-block">
                            <label class="aiz-checkbox">
                                <input type="checkbox" class="check-one" name="id[]" value="">
                                <span class="aiz-square-check"></span>
                            </label>
                        </div> -->
                        {{ $k+1 }}
                    </td>
                    <td>
                        <div class="row gutters-5 w-300px w-md-300px mw-100">
                            <!-- <div class="col-auto">
                                <img src="" alt="Image" class="size-50px img-fit">
                            </div> -->
                            <div class="col">
                                <span class="text-muted text-truncate-2">{{ $cabin->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td style="max-width: 10rem">
                        <div class="row gutters-5 w-300px w-md-300px mw-100">
                            <div class="col">
                                <span class="text-muted text-truncate-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">{{ $cabin->description }}</span>
                            </div>
                        </div>
                    </td>

                    
                    <!--<td>-->
                    <!--    <div class="row gutters-5 w-200px w-md-300px mw-100">-->
                    <!--        <div class="col">-->
                    <!--            <span class="text-muted text-truncate-2">{{ $cabin->capacity }}</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</td>-->

                    <td style="max-width: 10rem; min-width: 10rem;">
                        <div class="row gutters-5 w-200px w-md-300px mw-100">
                            <div class="col">
                                <span class="text-muted text-truncate-2">$ {{ number_format($cabin->precio1, 2) }}</span>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="row gutters-5 w-200px w-md-300px mw-100">
                            <div class="col">
                                <span class="text-muted text-truncate-2">$ {{ number_format($cabin->precio2, 2) }}</span>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" onchange="changeStatus({{ $cabin->id }}, this)" @if($cabin->active == 1) checked @endif role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </label>
                    </td>
                    
                    <td class="text-end d-flex justify-content-evenly">
                        <a class="btn btn-add btn-icon rounded-circle btn-xs d-flex aligm-items-center justify-content-center btn-cristal"  href="{{ route('detalles', ['slug' => $cabin->slug]) }}" target="_blank" title="{{ __('Visualizar') }}">
                            <i class="uil uil-eye d-flex align-items-center justify-content-center fs-5"></i>
                        </a>
                        <a class="btn btn-calendar btn-icon rounded-circle btn-xs d-flex aligm-items-center justify-content-center btn-cristal"  href="{{ route('reservaciones.cabaña', ['service_type' => 'cabañas' ,'slug' => $cabin->slug]) }}" target="_blank" title="{{ __('Crear Reservación') }}">
                            <i class="uil uil-calendar-alt d-flex align-items-center justify-content-center fs-5"></i>
                        </a>
                        <button class="btn btn-edit btn-icon rounded-circle btn-xs d-flex align-items-center justify-content-center" onclick="editRow({{ $cabin->id }})" title="{{ __('Editar') }}">
                            <i class="uil uil-edit d-flex align-items-center justify-content-center fs-5"></i>
                        </button>
                        <button href="#" class="btn btn-delete btn-icon rounded-circle btn-xs d-flex confirm-delete align-items-center justify-content-center" onclick="deleteRow({{ $cabin->id }})" title="{{ __('Eliminar') }}">
                            <i class="uil uil-trash d-flex align-items-center justify-content-center fs-5"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row d-none" id="cards-section">
    @foreach($cabins as $c => $cabin)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
        <div class="card position-relative">
            <div class="d-flex" style="min-height: 15rem; max-height: 12rem; @if($cabin->active == 0) filter: grayscale(1); @endif">
                @if(count($cabin->gallery) > 0)
                <div id="carousel-{{ $cabin->id }}" class="carousel slide w-100 flex-fill" data-bs-ride="carousel">
                    <div class="carousel-inner" style="min-height: 15rem; max-height: 12rem;">
                        @foreach($cabin->gallery as $g => $photo)
                        <div class="carousel-item @if($g==0) active @endif" style="object-fit: cover; background-image: url('https://huitzilcalli.com/public{{ $photo->route }}'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;">
                            <!--<img src="" class="d-block w-100 img-fluid" style="object-fit: cover; background-image: url('https://huitzilcalli.com/public{{ $photo->route }}'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;" alt="">-->
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $cabin->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $cabin->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="card-body" style="@if($cabin->active == 0) filter: grayscale(1); @endif">
                <h1 class="fs-5 fw-bold text-uppercase d-flex alig-items-center"><i class="uil uil-estate me-2 fw-5"></i>{{ $cabin->name }}</h1>
                <p class="mb-2 text-break" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">{{ $cabin->description }}</p>
                <div class="d-flex flex-row flex-wrap align-items-center justify-content-evenly">
                    @foreach($cabin->amenities as $a => $amenitie)
                    <div class="bg-light p-2 d-flex align-items-center justify-content-center mx-1 mb-2" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 2.5rem;">
                        <i class=" uil uil-{{ $amenitie->icon }}" title="{{ $amenitie->title }}"></i>
                    </div>
                    @endforeach
                </div>
                <div class="mt-2 pt-2" style="border-top: 1px solid #eee">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <div class="btn btn-outline-secondary py-2 px-4 d-flex ps-2" style="border-radius: 0.5rem; cursor: default;">
                            <div class="d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 2rem; height: auto;">
                                <i class="uil uil-dollar-sign-alt fs-4"></i>
                            </div>
                            <div class="d-flex flex-column justify-content-evenly">
                                <p class="mb-0 fw-bold">{{ __('Dom-Vie') }}</p>
                                <p class="mb-0">$ {{ number_format($cabin->precio1, 2) }}</p>
                            </div>
                        </div>
                        <div class="btn btn-outline-secondary py-2 px-4 d-flex ps-2" style="border-radius: 0.5rem; cursor: default;">
                            <div class="d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; width: 1.5rem; height: auto;">
                                <i class="uil uil-dollar-sign-alt fs-4"></i>
                            </div>
                            <div class="d-flex flex-column justify-content-evenly">
                                <p class="mb-0 fw-bold">{{ __('Sab.') }}</p>
                                <p class="mb-0">$ {{ number_format($cabin->precio2, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <label class="position-absolute top-0 start-0 aiz-switch aiz-switch-success mb-0 ms-3 mt-3" style="z-index: 1000;">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onchange="changeStatus({{ $cabin->id }}, this)" @if($cabin->active == 1) checked @endif role="switch" id="flexSwitchCheckDefault">
                </div>
            </label>
            <div class="dropdown position-absolute top-0 end-0 border-0" style="z-index: 1000">
                <button type="button" class="bg-light mt-2 me-2 btn btn-calendar btn-icon rounded-circle dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="uil uil-setting fs-5"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a href="{{ route('detalles', ['slug' => $cabin->slug]) }}" style="cursor: pointer" class="dropdown-item">Visualizar</a></li>
                    <li><a href="{{ route('reservaciones.cabaña', ['service_type' => 'cabañas' ,'slug' => $cabin->slug]) }}" target="_blank" class="dropdown-item">Reservar</a></li>
                    <li><a style="cursor: pointer" class="dropdown-item" onclick="editRow({{ $cabin->id }})">Editar</a></li>
                    <li><a style="cursor: pointer" class="dropdown-item" onclick="deleteRow({{ $cabin->id }})">Eliminar</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('modal')
<!-- New Cabin Modal -->
<div class="modal fade" id="new-cabin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="new-cabin-title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCabaña" novalidate method="post" autocomplete="off" class="needs-validation">
                @csrf
                <input type="text" id="cabin_id" name="cabin_id" readonly hidden disabled>
                <input type="text" id="amenities" name="amenities" readonly hidden disabled>
                <div class="modal-body">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-pills nav-fill mb-4 p-1 bg-light rounded-pill" id="cabinTabs" role="tablist" style="border: 1px solid #eee;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill fw-bold text-uppercase small" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                                <i class="uil uil-info-circle me-1"></i> {{ __('Info Básica') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold text-uppercase small" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="false">
                                <i class="uil uil-map-marker me-1"></i> {{ __('Ubicación') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold text-uppercase small" id="amenities-tab-nav" data-bs-toggle="tab" data-bs-target="#amenities-pane" type="button" role="tab" aria-controls="amenities-pane" aria-selected="false">
                                <i class="uil uil-star me-1"></i> {{ __('Amenidades') }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold text-uppercase small" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false">
                                <i class="uil uil-image-v me-1"></i> {{ __('Galería') }}
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="cabinTabContent">
                        <!-- Tab 1: Info Básica -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="row">
                                <div class="col-sm-7 mb-3">
                                    <label for="name" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Nombre') }}</label>
                                    <div class="input-group has-validation">
                                        <input type="text" id="name" name="nombre" class="form-control rounded-3" placeholder="{{ __('Nombre de la cabaña') }}" required>
                                        <span class="invalid-feedback" for="name" role="alert"><strong></strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <label for="capacity" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Cupo') }}</label>
                                    <div class="input-group">
                                        <input type="number" step="1" id="capacity" name="capacidad" class="form-control rounded-3" placeholder="{{ __('Cupo') }}" required>
                                        <span class="invalid-feedback" for="capacity" role="alert"><strong></strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-3">
                                    <label for="color" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Color') }}</label>
                                    <div class="input-group has-validation">
                                        <input type="color" id="color" name="color" class="form-control form-control-color w-100 rounded-3" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="description" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Descripción') }}</label>
                                    <div class="input-group has-validation">
                                        <textarea type="text" id="description" maxlength="500" name="descripción" rows="4" class="form-control rounded-3" style="resize: none;" placeholder="{{ __('Descripción detallada') }}" required></textarea>
                                        <span class="invalid-feedback" for="description" role="alert"><strong></strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="precio1" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Precio: Domingo a Viernes') }}</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text bg-light border-end-0 text-muted">$</span>
                                        <input type="number" id="precio1" name="precio1" class="form-control rounded-3 ps-1" placeholder="0.00" required>
                                        <span class="invalid-feedback" for="precio1" role="alert"><strong></strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="precio2" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Precio: Sábado') }}</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text bg-light border-end-0 text-muted">$</span>
                                        <input type="text" id="precio2" name="precio2" class="form-control rounded-3 ps-1" placeholder="0.00" required>
                                        <span class="invalid-feedback" for="precio2" role="alert"><strong></strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="entrada" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Hora Entrada') }}</label>
                                    <input type="time" id="entrada" name="entrada" class="form-control rounded-3" required>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="salida" class="form-label px-2 fw-bold small text-muted text-uppercase">{{ __('Hora Salida') }}</label>
                                    <input type="time" id="salida" name="salida" class="form-control rounded-3" required>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 2: Ubicación -->
                        <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                            <div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-3">
                                <i class="uil uil-info-circle fs-4 me-2"></i>
                                <span class="small">{{ __('Arrastra el marcador en el mapa para ajustar la ubicación exacta de la cabaña.') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div id="map-form" class="rounded-3 shadow-sm border" style="min-height: 25rem; width: 100%;"></div>
                                </div>
                                <div class="col-sm-6 d-none">
                                    <input type="text" id="lat" name="latitud" readonly value="21.92147554276003">
                                    <input type="text" id="lng" name="longitud" readonly value="-102.6948151589334">
                                </div>
                            </div>
                        </div>

                        <!-- Tab 3: Amenidades -->
                        <div class="tab-pane fade" id="amenities-pane" role="tabpanel" aria-labelledby="amenities-tab-nav">
                            <div class="bg-light p-3 rounded-3 mb-4 shadow-sm border">
                                <div class="row align-items-end">
                                    <div class="col-xl-2 col-lg-3 col-md-4 mb-3 mb-md-0">
                                        <label class="form-label fw-bold small text-muted text-uppercase">{{ __('Ícono') }}</label>
                                        <select id="icon" class="form-select icon-select rounded-3">
                                            <option value="users-alt">&#xea11; Habitantes</option>
                                            <option value="restaurant">&#xe9a8; Cocina</option>
                                            <option value="bath">&#xec4a; Baño</option>
                                            <option value="swimmer">&#xeb20; Alberca</option>
                                            <option value="fire">&#xec4d; Fogata</option>
                                            <option value="trees">&#xeadf; Exterior</option>
                                            <option value="tv-retro">&#xe975; TV</option>
                                            <option value="wifi">&#xe97f; Wi-Fi</option>
                                            <option value="bed">&#xeb29; Camas</option>
                                            <option value="estate">&#xeca5; Estructura</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-8 mb-3 mb-md-0">
                                        <label class="form-label fw-bold small text-muted text-uppercase">{{ __('Título') }}</label>
                                        <input type="text" id="title" class="form-control rounded-3" placeholder="Ej: Habitaciones">
                                    </div>
                                    <div class="col-xl-5 col-lg-3 col-md-9 mb-3 mb-lg-0">
                                        <label class="form-label fw-bold small text-muted text-uppercase">{{ __('Especificaciones') }}</label>
                                        <input type="text" id="specifications" class="form-control rounded-3" placeholder="Ej: 2 camas matrimoniales">
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-3">
                                        <button type="button" onclick="saveAmenidad()" class="btn btn-primary w-100 rounded-3 py-2 text-uppercase fw-bold small">
                                            <i class="uil uil-plus me-1"></i> {{ __('Añadir') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3" id="amenidades-container" style="max-height: 300px; overflow-y: auto;">
                                <!-- Se llenará dinámicamente -->
                            </div>
                        </div>

                        <!-- Tab 4: Galería -->
                        <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                            <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-3">
                                <i class="uil uil-image-v fs-4 me-2"></i>
                                <span class="small">{{ __('Sube imágenes de alta calidad para que tu cabaña resalte. Puedes arrastrar varias a la vez.') }}</span>
                            </div>
                            <div id="drop" class="rounded-3 border-dashed border-2 p-4 text-center bg-light" style="min-height: 15rem; cursor: pointer; border: 2px dashed #ccc;">
                                <!-- Dropzone/ImageUploader se inicializa aquí -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar')  }}</button>
                <button type="button" id="submitData" onClick="submitData()" class="btn btn-primary text-white">{{ __('Guardar') }}</button>
            </div>
        </div>
    </div>
</div>

<div id="loader" class="loading d-flex justify-content-center align-items-center">
    <div class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb-ZeMACsdzDw_3WHtkVhg6vbWVXjfRaw" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            //initDropzone();
            // initGrid();
        }, false);

        let marker;
        let myDropzone;

        const newCabin = () => {
            $('#new-cabin-title').text('Nueva Cabaña');
            resetForm();
            //initDropzone();
            initImageUploader();
            initMap();
        }

        const initMap = (lat = 22.050476, lng = -102.351323) => {

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
                url: "{{ route('cabañas.show', ['id' => 0]) }}",
                method: 'GET',
                success: (res) => {
                    // if(res.table_view){
                        $('#table-body').html(res.table_view);
                    // }
                    $('#cards-section').html(res.detail_view);
                }
            })
        }

        const editRow = (id) => {
            $('#new-cabin-title').text('Editar Cabaña');
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
                        $('#precio1').val(datos.precio1);
                        $('#precio2').val(datos.precio2);
                        $('#entrada').val(datos.entrada);
                        $('#salida').val(datos.salida);
                        $('#color').val((datos.color==null) ? '#194421' : datos.color);

                        initMap(+datos.lat, +datos.lng);

                        //initDropzone(datos.gallery);
                        initImageUploader(datos.gallery);

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
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
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

        const initDropzone = (gallery = []) => {
            document.getElementById('drop').classList = 'dropzone';

            let id = document.getElementById('cabin_id').value;
            $('#drop').html('');
            try{
                myDropzone.destroy();
            }catch(e){

            }

            myDropzone = new Dropzone("#drop", {
                url: "/admin/cabañas/upload/" + (id == '' ? 0 : id) ,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                uploadMultiple: true,
                addRemoveLinks: true,
                autoProcessQueue: false,
                parallelUploads: 30,
                maxFiles: 30,
                acceptedFiles: 'image/*',
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

            gallery.forEach(photo => {
                let name = photo.route.split('/');
                let mockFile = { name: name[name.length-1], size: photo.size };
                myDropzone.options.addedfile.call(myDropzone, mockFile);
                myDropzone.options.thumbnail.call(myDropzone, mockFile, photo.route);
                myDropzone.emit("complete", mockFile);
            })

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

        const initImageUploader = (gallery = []) => {
            $('#drop').html('');
            let preloaded = [];
            gallery.forEach(photo => {
                preloaded.push({
                    id: photo.id,
                    src: '/public/'+photo.route
                });
                console.log("RUTA PARA SUBIR LA BENDITA FOTO:::", photo.route);
            })

            $('#drop').imageUploader({
                label: 'Arrastre y suelte archivos aquí o haga clic',
                preloaded: preloaded,
                extensions: ['.jpg', '.jpeg', '.webp', '.png', '.HEIF', '.HEIC', '.heic', '.heif', '.JPG', '.JPEG', '.WEBP', '.PNG'],
                mimes: ['image/jpeg', 'image/png', 'image/webp', 'image/heif', 'image/heic', 'image/heif-sequence', 'image/heic-sequence'],
                // mimes: [],
                // extensions: [],
                maxSize: 10 * 1024 * 1024,
                maxFiles: 25,
            })
        }

        const submitData = () => {
            let auxId = document.getElementById('cabin_id').value;
            let auxAmenities = document.getElementById('amenities').value;
            // document.getElementById('formCabaña').submit();

            
            let formData = new FormData();
            Array.from($('input[name="images[]"]')[0].files).forEach((file, index) => {
                formData.append('gallery[]', file); 
            });
            // if($('input[name="images[]"]')[0].files.length > 0){
            //     if($('input[name="images[]"]')[0].files.length == 1){
            //         formData.append('gallery[]', $('input[name="images[]"]')[0].files[0]); 
            //     }else if($('input[name="images[]"]')[0].files.length > 1){
            //         $('input[name="images[]"]')[0].files.forEach((file, index) => {
            //             formData.append('gallery[]', file); 
            //         });
            //     }
                
            // }
            
            let preloaded = [];
            $('input[name="preloaded[]"]').toArray().forEach(item => {
                formData.append('preloaded[]', item.value);
                preloaded.push(item.value);
            })
            

            //console.log({preloaded});

            $.ajax({
                url: "{{ route('cabañas.store') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id: (auxId != '' ? auxId : 0),
                    name: document.getElementById('name').value,
                    description: document.getElementById('description').value,
                    capacity: document.getElementById('capacity').value,
                    precio1: document.getElementById('precio1').value,
                    precio2: document.getElementById('precio2').value,
                    entrada: document.getElementById('entrada').value,
                    salida: document.getElementById('salida').value,
                    lat: document.getElementById('lat').value,
                    lng: document.getElementById('lng').value,
                    amenities: auxAmenities != '' ? auxAmenities : '[]',
                    color: document.getElementById('color').value,
                    //gallery: formData.getAll('gallery[]'),
                    //preloaded: preloaded
                },
                //body: formData,
                // data: formData,
                beforeSend: () => {
                    // document.getElementById('loader').classList.toggle('show');
                    if(!document.getElementById('loader').classList.contains('show')){
                        document.getElementById('loader').classList.add('show');
                    }
                    
                    // document.querySelectorAll(`.invalid-feedback`).forEach(el => {
                    //     let list = el.classList.value;
                    //     // console.log({list});
                    //     if(!list.includes('d-none')){
                    //         el.classList.add('d-none');
                    //     }
                    // })
                },
                success: (response) => {
                  let cabinId = response.cabin_id;
                 

                        let fd = new FormData($('#formCabaña')[0]);

                            $.ajax({
                                url: "/admin/cabañas/upload/" + (cabinId == '' ? 0 : cabinId) ,
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: (data) => {
                                    console.log({data})

                                    if(auxId != ''){
                                        showToast('success', 'Registro actualizado');
                                    }else{
                                        showToast('success', 'Registro creado');
                                    }

                                    loadData();
                                    resetForm();
                                    
                                    $('#new-cabin').modal('hide');
                                },
                                error: (error) => {
                                    if(auxId != ''){
                                        showToast('error', 'Error al actualizar el registro');
                                    }else{
                                        showToast('error', 'Error al crear el registro');
                                    }
                                    console.log({error})
                                },
                                complete: () => {
                                    // document.getElementById('loader').classList.toggle('show');
                                    document.getElementById('loader').classList.remove('show');
                                }
                            })
                       
                },
                error: (error) => {
                    console.log({error});
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
                    document.getElementById('loader').classList.remove('show');
                },
                complete: () => {
                    // document.getElementById('loader').classList.remove('show');
                }
                
            })
        }

        const changeStatus = (id,el) => {
            console.log({id, el});
            $.ajax({
                url: '{{ route("cabaña.status") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
                    el.checked = el.checked ? false : true;
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
                url: '{{ route("cabañas.list") }}',
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

        const toggleView = (viewType) => {
            if(viewType == 'table'){
                $('#table-section').removeClass('d-none');
                if(!$('#cards-section').hasClass('d-none')){
                    $('#cards-section').addClass('d-none');    
                }
                if(!$('#btn-table-view').hasClass('active')){
                    $('#btn-table-view').addClass('active');
                }
                $('#btn-cards-view').removeClass('active');
            }else{
                $('#cards-section').removeClass('d-none');
                if(!$('#table-section').hasClass('d-none')){
                    $('#table-section').addClass('d-none');    
                }
                if(!$('#btn-cards-view').hasClass('active')){
                    $('#btn-cards-view').addClass('active');
                }
                $('#btn-table-view').removeClass('active');
            }
        }
    </script>
@endsection