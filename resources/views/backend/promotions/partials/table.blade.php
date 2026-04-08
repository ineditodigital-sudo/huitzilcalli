@foreach($promotions as $k => $promotion)
<tr>
    <td>{{ $k + 1 }}</td>
    <td>
        @if($promotion->image)
            <img src="{{ asset('public/' . $promotion->image) }}" alt="{{ $promotion->title }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
        @else
            <div class="d-flex align-items-center justify-content-center bg-secondary-soft" style="width: 80px; height: 80px; border-radius: 8px;">
                <i class="uil uil-image fs-2 text-muted"></i>
            </div>
        @endif
    </td>
    <td>{{ $promotion->title }}</td>
    <td>{{ Str::limit($promotion->description, 50) }}</td>
    <td>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" onchange="changeStatus({{ $promotion->id }}, this)" @if($promotion->active == 1) checked @endif>
        </div>
    </td>
    <td class="text-end">
        <button class="btn btn-edit btn-icon rounded-circle btn-xs" onclick="editPromotion({{ $promotion->id }})" title="{{ __('Editar') }}">
            <i class="uil uil-edit fs-5"></i>
        </button>
        <button class="btn btn-delete btn-icon rounded-circle btn-xs" onclick="deletePromotion({{ $promotion->id }})" title="{{ __('Eliminar') }}">
            <i class="uil uil-trash fs-5"></i>
        </button>
    </td>
</tr>
@endforeach
