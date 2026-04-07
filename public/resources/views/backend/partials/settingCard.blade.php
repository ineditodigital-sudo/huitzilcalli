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