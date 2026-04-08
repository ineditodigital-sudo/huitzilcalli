@extends('backend.layouts.app')

@section('content')


<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h4">{{ __('Horarios') }}</h1>
        </div>
        <div class="col text-end">
            <div class="btn-group">
                <a href="" onclick="newSchedule()" data-bs-toggle="modal" data-bs-target="#new-schedule" class="btn btn-circle btn-info">
                    <span>{{ __('Nuevo') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
    <div class="card">
        <div class="card-body" id="discount-card">
            <form id="formDiscount" novalidate method="post" autocomplete="off" class="needs-validation">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="reservation_discount" class="form-label">{{ __('Descuento por reserva de día completo (%)') }}</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text btn btn-outline-secondary" id="basic-addon1">%</span>
                                <input type="text" id="reservation_discount" name="reservation_discount" class="form-control" placeholder="{{ __('20') }}" required value="{{ Auth()->user()->reservation_discount }}">
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
            </form>
        </div>
    </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body table-responsive" id="table-section">
                <table class="table aiz-table mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Inicio')}}</th>
                            <th>{{ __('Fin') }}</th>
                            <th data-breakpoints="sm" class="text-end">{{ __('Opciones') }}</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach($schedules as $k => $schedule)
                        <tr id="row-{{ $schedule->id }}">
                            <td>
                                {{ $k+1 }}
                            </td>
                            <td>
                                <div class="row gutters-5 w-300px w-md-300px mw-100">
                                    <div class="col">
                                        <span class="text-muted text-truncate-2">{{ substr($schedule->start_time, 0, 5) }} hrs.</span>
                                    </div>
                                </div>
                            </td>
                            <td style="max-width: 10rem">
                                <div class="row gutters-5 w-300px w-md-300px mw-100">
                                    <div class="col">
                                        <span class="text-muted text-truncate-2">{{ substr($schedule->end_time, 0, 5) }} hrs.</span>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="text-end d-flex justify-content-evenly">
                                <button class="btn btn-edit btn-icon rounded-circle btn-xs d-flex align-items-center justify-content-center" onclick="editRow({{ $schedule->id }})" title="{{ __('Editar') }}">
                                    <i class="uil uil-edit d-flex align-items-center justify-content-center fs-5"></i>
                                </button>
                                <button href="#" class="btn btn-delete btn-icon rounded-circle btn-xs d-flex confirm-delete align-items-center justify-content-center" onclick="deleteRow({{ $schedule->id }})" title="{{ __('Eliminar') }}">
                                    <i class="uil uil-trash d-flex align-items-center justify-content-center fs-5"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('modal')
<!-- New Schedule Modal -->
<div class="modal fade" id="new-schedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="new-schedule-title"></h1>
                <button type="button" onclick="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formSchedule" novalidate method="post" autocomplete="off" class="needs-validation">
                @csrf
                <input type="text" id="schedule_id" name="schedule_id" readonly hidden disabled>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">{{ __('Inicio') }}</label>
                                <div class="input-group has-validation">
                                    <input type="time" id="start_time" name="start_time" class="form-control" required>
                                    <span class="invalid-feedback" for="start_time" role="alert">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">{{ __('Fin') }}</label>
                                <div class="input-group has-validation">
                                    <input type="time" id="end_time" name="end_time" class="form-control" required>
                                    <span class="invalid-feedback" for="end_time" role="alert">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar')  }}</button>
                <button type="button" id="submitData" onClick="submitData()" class="btn btn-primary">{{ __('Guardar') }}</button>
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
<script>
    const closeModal = () => {
        $('#new-schedule').modal('hide');
    }

    const newSchedule = () => {
        $('#new-schedule-title').text('Nuevo Horario');
        resetForm();
    }

    const resetForm = () => {
        document.getElementById('formSchedule').reset();
        $('#formSchedule .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
    }

    const loadData = () => {
        $.ajax({
            url: "{{ route('jacuzzi.horarios.show', ['id' => 0]) }}",
            method: 'GET',
            success: (res) => {
                $('#table-body').html(res.table_view);
            }
        })
    }

    const submitData = () => {
        let auxId = document.getElementById('schedule_id').value;

        $.ajax({
            url: "{{ route('jacuzzi.horarios.store'); }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                id: (auxId != '' ? auxId : 0),
                start_time: document.getElementById('start_time').value,
                end_time: document.getElementById('end_time').value,
                service_id: 2
            },
            beforeSend: () => {
                if(!document.getElementById('loader').classList.contains('show')){
                    document.getElementById('loader').classList.add('show');
                }
                
            },
            success: (data) => {
                console.log({data})

                if(auxId != ''){
                    showToast('success', 'Registro actualizado');
                }else{
                    showToast('success', 'Registro creado');
                }

                loadData();
                resetForm();
                
                $('#new-schedule').modal('hide');
            },
            error: (error) => {
                console.log({error});
                let errors = error.responseJSON.errors;

                if(auxId != ''){
                    showToast('error', 'Error al actualizar el registro');
                }else{
                    showToast('error', 'Error al crear el registro');
                }

                document.querySelectorAll('#formSchedule .form-control').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                Object.entries(errors).forEach(([e, value]) => {
                    document.getElementById(e).classList.toggle('is-invalid');
                    document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                })
            },
            complete: () => {
                document.getElementById('loader').classList.remove('show');
            }
            
        })
    }

    const editRow = (id) => {
        $('#new-schedule-title').text('Editar Horario');
        // console.log({id});
        $.ajax({
            url: '/admin/horarios/ver/'+id,
            method: 'GET',
            beforeSend: () => {
                resetForm();
            },
            success: (res) => {
                // console.log({data: res.data});
                let datos = res.data;
                if(datos){
                    $('#schedule_id').val(datos.id);
                    $('#start_time').val(datos.start_time);
                    $('#end_time').val(datos.end_time);
                    
                    $('#new-schedule').modal('show');
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
            title: 'Eliminar Horario',
            text: "¿Estás seguro que quieres eliminar este horario?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f4a83e',
            cancelButtonColor: '#ff5b64',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/horarios/eliminar/"+id,
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

    const submitDiscount = () => {
        $.ajax({
            url: "{{ route('admin.update.jacuzzi_discount') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                'reservation_discount': $('#reservation_discount').val()
            },
            success: (data) => {
                
                showToast('success', 'Configuración actualizada');
                
                loadSettingsData();
                
                document.getElementById('formDiscount').reset();
                $('#formDiscount .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
            },
            error: (error) => {
                let errors = error.responseJSON.errors;
                
                showToast('error', 'Error al guardar descuento');

                document.querySelectorAll('#formDiscount .form-control').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                Object.entries(errors).forEach(([e, value]) => {
                    document.getElementById(e).classList.toggle('is-invalid');
                    document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                })
            }
        });
    }

    const loadSettingsData = () => {
        $.ajax({
            url: "{{ route('admin.get.settings_discount') }}",
            method: 'GET',
            success: (res) => {
                // console.log({res});
                $('#discount-card').html(res.settings_card)
            },
            error: (error) => {
                showToast('error', 'Error al obtener datos');
            }
        })
    }

</script>
@endsection
