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
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <!-- <div class="col-auto">
                <img src="" alt="Image" class="size-50px img-fit">
            </div> -->
            <div class="col">
                <span class="text-muted text-truncate-2">{{ $cabin->name }}</span>
            </div>
        </div>
    </td>
    <td style="max-width: 10rem">
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">{{ $cabin->description }}</span>
            </div>
        </div>
    </td>

    <!--
    <td>
        <div class="row gutters-5 w-200px w-md-300px mw-100">
            <div class="col">
                <span class="text-muted text-truncate-2">{{ $cabin->capacity }}</span>
            </div>
        </div>
    </td>
    -->

    <td>
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