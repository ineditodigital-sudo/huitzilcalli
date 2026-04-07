@php
    // var_dump($cabin);
    $cabs = array_column($days->toArray(), 'cabin_id');
@endphp

@if(!empty($cabin))
    <div class="col-lg-6 col-md-12 mb-3">
        <button type="button" onclick="disableDay(this, {{ $cabin->id }} )" class="w-100 btn btn-outline-secondary btn-lg d-flex align-items-center @if(!in_array($cabin->id, $cabs)) active @endif" style="min-height: 4.5rem; max-height: 4.5rem;">
            <i class="uil uil-estate fs-5 me-2"></i>
            {{ $cabin->name }}
        </button>
    </div>
@else
    @foreach($cabins_cat as $c => $cabin)
        <div class="col-lg-6 col-md-12 mb-3">
            <button type="button" onclick="disableDay(this, {{ $cabin->id }} )" class="w-100 btn btn-outline-secondary btn-lg d-flex align-items-center @if(!in_array($cabin->id, $cabs)) active @endif" style="min-height: 4.5rem; max-height: 4.5rem;">
                <i class="uil uil-estate fs-5 me-2"></i>
                {{ $cabin->name }}
            </button>
        </div>
    @endforeach
@endif