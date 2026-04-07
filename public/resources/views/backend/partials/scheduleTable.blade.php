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