@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h4">{{ __('Promociones') }}</h1>
        </div>
        <div class="col text-end">
            <div class="btn-group">
                <button onclick="newPromotion()" data-bs-toggle="modal" data-bs-target="#promotion-modal" class="btn btn-circle btn-info">
                    <span>{{ __('Nueva Promoción') }}</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table aiz-table mb-0 align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Imagen') }}</th>
                    <th>{{ __('Título') }}</th>
                    <th data-breakpoints="lg">{{ __('Descripción') }}</th>
                    <th data-breakpoints="md">{{ __('Estatus') }}</th>
                    <th class="text-end">{{ __('Opciones') }}</th>
                </tr>
            </thead>
            <tbody id="table-body">
                @include('backend.promotions.partials.table', ['promotions' => $promotions])
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('modal')
<!-- Promotion Modal -->
<div class="modal fade" id="promotion-modal" tabindex="-1" aria-labelledby="promotionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-title">{{ __('Nueva Promoción') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="promotion-form" novalidate method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="promotion_id" name="id" value="0">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('Título') }}</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('Descripción') }}</label>
                            <textarea id="description" name="description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('Enlace Externo (Opcional)') }}</label>
                            <input type="url" id="external_link" name="external_link" class="form-control" placeholder="https://...">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('Estatus') }}</label>
                            <select name="active" id="active" class="form-control">
                                <option value="1">{{ __('Activo') }}</option>
                                <option value="0">{{ __('Inactivo') }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">{{ __('Imagen') }}</label>
                            <input type="file" id="image" name="image" class="form-control" accept="image/*">
                            <div id="image-preview" class="mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-primary text-white">{{ __('Guardar') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const newPromotion = () => {
        $('#modal-title').text('Nueva Promoción');
        $('#promotion_id').val(0);
        $('#promotion-form')[0].reset();
        $('#image-preview').html('');
    }

    const editPromotion = (id) => {
        $('#modal-title').text('Editar Promoción');
        $.ajax({
            url: `/admin/promociones/ver/${id}`,
            method: 'GET',
            success: (res) => {
                const data = res.data;
                $('#promotion_id').val(data.id);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#external_link').val(data.external_link);
                $('#active').val(data.active);
                
                if (data.image) {
                    $('#image-preview').html(`<img src="/public/${data.image}" class="img-fluid" style="max-height: 100px;">`);
                } else {
                    $('#image-preview').html('');
                }
                
                $('#promotion-modal').modal('show');
            }
        });
    }

    const deletePromotion = (id) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/promociones/eliminar/${id}`,
                    method: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: (res) => {
                        loadPromotions();
                        showToast('success', res.message);
                    }
                });
            }
        });
    }

    const changeStatus = (id, status) => {
        $.ajax({
            url: '{{ route("promociones.status") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                status: status.checked ? 1 : 0
            },
            success: (res) => {
                showToast('success', res.message);
            }
        });
    }

    const loadPromotions = () => {
        $.ajax({
            url: '/admin/promociones/ver/0',
            method: 'GET',
            success: (res) => {
                $('#table-body').html(res.table_view);
            }
        });
    }

    $('#promotion-form').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        $.ajax({
            url: '{{ route("promociones.store") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: (res) => {
                $('#promotion-modal').modal('hide');
                loadPromotions();
                showToast('success', res.message);
            },
            error: (err) => {
                showToast('error', 'Error al guardar la promoción');
            }
        });
    });
</script>
@endsection
