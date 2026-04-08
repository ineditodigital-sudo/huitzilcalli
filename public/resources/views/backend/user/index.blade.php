@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h4">{{ __('Perfil') }}</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-5 col-sm-12 mb-3" id="profile-card">
        <div class="card position-relative">
            <div class="card-header d-flex align-items-center">
                <i class="uil uil-user me-3 fs-5"></i>
                <h2 class="fs-4 fw-bold mb-0">Administrador</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 d-flex align-items-center justify-content-center mb-3">
                        <img src="{{ __('https://huitzilcalli.com/resources/img/logo.png') }}" alt="Huitzilcalli" class="img-fluid rounded-circle p-2 bg-light" style="aspect-ratio: 1/1; max-width: 5rem;" />
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 d-flex flex-column justify-content-evenly mb-3">
                        <h1 class="fs-5 text-uppercase fw-bold mb-0">{{ __('Administrador') }}</h1>
                        <p class="mb-0 ">{{ Auth::user()->username }}</p>
                    </div>
                </div>
                <hr class="mb-3 mt-0" style="color: #ccc" />
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <div class="bg-light p-2 d-flex align-items-center justify-content-center" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 3rem;">
                                    <i class="uil uil-user fs-5"></i>
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column justify-content-evenly">
                                <p class="fw-bold mb-0">{{ __('Nombre') }}</p>
                                <p class="mb-0">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <div class="bg-light p-2 d-flex align-items-center justify-content-center" style="border-radius: 0.5rem; aspect-ratio: 1/1; width: 3rem;">
                                    <i class="uil uil-whatsapp fs-5"></i>
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column justify-content-evenly">
                                <p class="fw-bold mb-0">{{ __('WhatsApp') }}</p>
                                <p class="mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown position-absolute top-0 end-0 border-0 mt-2 me-2">
                <button type="button" class="mt-2 me-2 btn btn-calendar btn-icon rounded-circle dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="uil uil-setting fs-5"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a style="cursor: pointer" onclick="editUser();" class="dropdown-item">Editar</a></li>
                    <li><a style="cursor: pointer" onclick="changePassword();" class="dropdown-item">Cambiar Contraseña</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <i class="uil uil-setting me-3 fs-5"></i>
                <h2 class="fs-4 fw-bold mb-0">Configuración</h2>
            </div>
            <div class="card-body" id="settings-card">
                <form id="formSettings" novalidate method="post" autocomplete="off" class="needs-validation">
                    @csrf
                    <div class="row">
                        <h2 class="fs-4 text-uppercase fw-bold">{{ __('Redes Sociales') }}</h2>
                        <div class="col-sm-12 mb-3">
                            <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text btn btn-outline-secondary" id="basic-addon3">https://facebook.com/</span>
                                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="{{ __('Página de Facebook') }}" required value="{{ Auth()->user()->facebook }}">
                                <span class="invalid-feedback" for="facebook" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text btn btn-outline-secondary" id="basic-addon3">https://instagram.com/</span>
                                <input type="text" id="instagram" name="instagram" class="form-control" placeholder="{{ __('Página de Instagram') }}" required value="{{ Auth()->user()->instagram }}">
                                <span class="invalid-feedback" for="instagram" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h2 class="fs-4 text-uppercase fw-bold">{{ __('Descuento para reservaciones') }}</h2>
                        <div class="col-sm-12 mb-3">
                            <label for="reservation_discount" class="form-label">{{ __('Descuento por reservación de jacuzzi por día completo') }}</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text btn btn-outline-secondary" id="basic-addon3">%</span>
                                <input type="text" id="reservation_discount" name="reservation_discount" class="form-control" placeholder="{{ __('20') }}" required value="{{ Auth()->user()->reservation_discount }}">
                                <span class="invalid-feedback" for="reservation_discount" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex w-100 justify-content-end">
                        <button class="btn btn-primary text-white" type="button" onclick="submitSettings()">{{ __('Guardar Configuración') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!-- Edit User Modal -->
<div class="modal fade" id="edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUser" novalidate method="post" autocomplete="off" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="username" class="form-label">{{ __('Usuario') }}</label>
                            <div class="input-group has-validation">
                                <input type="text" id="username" name="username" class="form-control" placeholder="{{ __('Usuario') }}" required value="{{ Auth::user()->username }}">
                                <span class="invalid-feedback" for="username" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mb-3">
                            <label for="name" class="form-label">{{ __('Nombre') }}</label>
                            <div class="input-group has-validation">
                                <input type="name" id="name" name="name" class="form-control" placeholder="{{ __('Nombre') }}" required value="{{ Auth::user()->name }}">
                                <span class="invalid-feedback" for="name" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mb-3">
                            <label for="phone" class="form-label">{{ __('Número de WhatsApp') }}</label>
                            <div class="input-group has-validation">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="{{ __('+52 1 449 000 0000') }}" required value="{{ Auth::user()->phone }}">
                                <span class="invalid-feedback" for="phone" role="alert">
                                    <strong></strong>
                                </span>
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

<!-- Change Password Modal -->
<div class="modal fade" id="edit-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Cambiar Contraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formPassword" novalidate method="post" autocomplete="off" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="old_password" class="form-label">{{ __('Contraseña Actual') }}</label>
                            <div class="input-group has-validation">
                                <input type="password" id="old_password" name="old_password" class="form-control" placeholder="{{ __('Contraseña Actual') }}" required>
                                <button type="button" onclick="togglePassword('old_password')" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ __('Mostrar Contraseña') }}">
                                    <i class="uil uil-eye" id="btnTogglePassword"></i>
                                </button>
                                <span class="invalid-feedback" for="old_password" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mb-3">
                            <label for="new_password" class="form-label">{{ __('Nueva Contraseña') }}</label>
                            <div class="input-group has-validation">
                                <input type="password" id="new_password" name="new_password" class="form-control" placeholder="{{ __('Nueva Contraseña') }}" required>
                                <button type="button" onclick="togglePassword('new_password')" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ __('Mostrar Contraseña') }}">
                                    <i class="uil uil-eye" id="btnTogglePassword"></i>
                                </button>
                                <span class="invalid-feedback" for="new_password" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar')  }}</button>
                <button type="button" id="submitPassword" onClick="submitPassword()" class="btn btn-primary">{{ __('Guardar') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const togglePassword = (id) => {
        if($('#'+id).attr('type') == 'text'){
            $('#'+id).attr('type', 'password');
        }else{
            $('#'+id).attr('type', 'text');
        }
    }

    const loadData = () => {
        $.ajax({
            url: "{{ route('admin.profile.show') }}",
            method: 'GET',
            success: (res) => {
                // console.log({res});
                $('#profile-card').html(res.profile_card)
            },
            error: (error) => {
                showToast('error', 'Error al obtener datos');
            }
        })
    }
    
    const loadSettingsData = () => {
        $.ajax({
            url: "{{ route('admin.get.settings') }}",
            method: 'GET',
            success: (res) => {
                // console.log({res});
                $('#settings-card').html(res.settings_card)
            },
            error: (error) => {
                showToast('error', 'Error al obtener datos');
            }
        })
    }
    
    const editUser = () => {
        // loadData();
        $.ajax({
            url: "{{ route('admin.profile.show', ['json'=>true]) }}",
            method: 'GET',
            success: (res) => {
                $('#username').val(res.username);
                $('#name').val(res.name);
                $('#phone').val(res.phone);
                $('#edit-user').modal('show');
            },
            error: (error) => {
                showToast('error', 'Error al obtener datos');
            }
        })
        
    }
    
    const changePassword = () => {
        $('#edit-password').modal('show');
    }
    
    const submitData = () => {
        $.ajax({
            url: "{{ route('admin.edit') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                'username': $('#username').val(),
                'name': $('#name').val(),
                'phone': $('#phone').val(),
            },
            success: (data) => {
                // console.log({data});
                
                showToast('success', 'Perfil actualizado');
                $('#edit-user').modal('hide');
                loadData();
                resetForm();
            },
            error: (error) => {
                // console.log({error});
                let errors = error.responseJSON.errors;
                
                showToast('error', 'Error al actualizar el registro');

                document.querySelectorAll('#formUser .form-control').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                Object.entries(errors).forEach(([e, value]) => {
                    document.getElementById(e).classList.toggle('is-invalid');
                    document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                })
            }
        });
    }
    
    const submitPassword = () => {
        $.ajax({
            url: "{{ route('admin.password') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                'old_password': $('#old_password').val(),
                'new_password': $('#new_password').val(),
            },
            success: (data) => {
                
                showToast('success', 'Contraseña actualizada');
                $('#edit-password').modal('hide');
                
                document.getElementById('formPassword').reset();
                $('#formPassword .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
            },
            error: (error) => {
                let errors = error.responseJSON.errors;
                
                showToast('error', 'Error al actualizar contraseña');

                document.querySelectorAll('#formPassword .form-control').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                Object.entries(errors).forEach(([e, value]) => {
                    document.getElementById(e).classList.toggle('is-invalid');
                    document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                })
            }
        });
    }
    
    const submitSettings = () => {
        $.ajax({
            url: "{{ route('admin.update.settings') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                'facebook': $('#facebook').val(),
                'instagram': $('#instagram').val(),
                'reservation_discount': $('#reservation_discount').val()
            },
            success: (data) => {
                
                showToast('success', 'Configuración actualizada');
                loadSettingsData();
                
                document.getElementById('formSettings').reset();
                $('#formSettings .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
            },
            error: (error) => {
                let errors = error.responseJSON.errors;
                
                showToast('error', 'Error al guardar configuración');

                document.querySelectorAll('#formSettings .form-control').forEach(el => {
                    el.classList.remove('is-invalid');
                });

                Object.entries(errors).forEach(([e, value]) => {
                    document.getElementById(e).classList.toggle('is-invalid');
                    document.querySelector(`span[for="${e}"] strong`).innerHTML = value;
                })
            }
        });
    }
    
    const resetForm = () => {
        document.getElementById('formUser').reset();
        $('#formUser .form-control').toArray().forEach((el)=>{$(el).removeClass('is-invalid')});
    }
    
</script>
@endsection