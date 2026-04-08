@foreach($reservations as $k => $reservation)
    <tr id="row-{{ $reservation->id }}">
        <td>
            {{ $k+1 }}
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2">{{ $reservation->cabin->name }}</span>
                </div>
            </div>
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2">{{ $reservation->customer }}</span>
                </div>
            </div>
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2">{{ date('d/m/Y H:i', strtotime($reservation->start)) }} hrs. - {{ date('d/m/Y H:i', strtotime($reservation->end)) }} hrs.</span>
                </div>
            </div>
        </td>
        <td>
            <div class="row gutters-5 w-200px w-md-300px mw-100">
                <div class="col">
                    <span class="text-muted text-truncate-2">{{ $reservation->notes }}</span>
                </div>
            </div>
        </td>
        <td class="text-end d-flex justify-content-evenly">
            <button class="btn btn-edit btn-icon rounded-circle btn-xs d-flex align-items-center justify-content-center" onclick="editRow({{ $reservation->id }})" title="{{ __('Editar') }}">
                <i class="uil uil-edit d-flex align-items-center justify-content-center fs-5"></i>
            </button>
            <button href="#" class="btn btn-delete btn-icon rounded-circle btn-xs d-flex confirm-delete align-items-center justify-content-center" onclick="deleteRow({{ $reservation->id }})" title="{{ __('Eliminar') }}">
                <i class="uil uil-trash d-flex align-items-center justify-content-center fs-5"></i>
            </button>
        </td>
    </tr>
@endforeach