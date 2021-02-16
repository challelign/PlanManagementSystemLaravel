{{--first payied money --}}
<div class="form-group row">
    <label for="wuloabel"
           class="col-md-2 col-form-label text-md-right">{{ __('Wullo Abel') }}</label>
    <div class="col-md-3">
        <input id="wuloabel" type="number"
               class="form-control @error('wuloabel') is-invalid @enderror" min="0"
               name="wuloabel"
               value="{{ old('wuloabel') }}" required autocomplete="wuloabel"
               autofocus>
        @error('wuloabel')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    {{--end date--}}

    <label for="enddate"
           class="col-md-2 col-form-label text-md-right ">{{ __('End Date') }}</label>
    <div class="col-md-3">
        <input id="enddate" type="number" min="0"
               class="form-control @error('enddate') is-invalid @enderror"
               name="enddate"
               value="{{ old('enddate') }}" required autocomplete="enddate"
               autofocus>

        @error('enddate')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>
{{--first payied money --}}
<div class="form-group row">
    <label for="wuloabel"
           class="col-md-2 col-form-label text-md-right">{{ __('Wullo Abel') }}</label>
    <div class="col-md-3">
        <input id="wuloabel" type="number"
               class="form-control @error('wuloabel') is-invalid @enderror" min="0"
               name="wuloabel"
               value="{{ old('wuloabel') }}" required autocomplete="wuloabel"
               autofocus>
        @error('wuloabel')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    {{--end date--}}

    <label for="enddate"
           class="col-md-2 col-form-label text-md-right ">{{ __('End Date') }}</label>
    <div class="col-md-3">
        <input id="enddate" type="number" min="0"
               class="form-control @error('enddate') is-invalid @enderror"
               name="enddate"
               value="{{ old('enddate') }}" required autocomplete="enddate"
               autofocus>

        @error('enddate')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>
{{--first payied money --}}
<div class="form-group row">
    <label for="wuloabel"
           class="col-md-2 col-form-label text-md-right">{{ __('Wullo Abel') }}</label>
    <div class="col-md-3">
        <input id="wuloabel" type="number"
               class="form-control @error('wuloabel') is-invalid @enderror" min="0"
               name="wuloabel"
               value="{{ old('wuloabel') }}" required autocomplete="wuloabel"
               autofocus>
        @error('wuloabel')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    {{--end date--}}

    <label for="enddate"
           class="col-md-2 col-form-label text-md-right ">{{ __('TOTAL') }}</label>
    <div class="col-md-3">
        <input id="enddate" type="number" min="0"
               class="form-control @error('enddate') is-invalid @enderror"
               name="enddate"
               value="{{ old('enddate') }}" required autocomplete="enddate"
               autofocus>

        @error('enddate')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

</div>
