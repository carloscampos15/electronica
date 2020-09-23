@extends('layouts.app', ['activePage' => 'dump-management', 'titlePage' => __('Administración de basureros')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('dump.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        {{-- 'name', 'serial' --}}

                        <div class="card ">
                            <div class="card-header card-header-primary custom-card-header">
                                <h4 class="card-title">{{ __('Agregar basurero') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('dump.index') }}"
                                            class="btn btn-sm btn-primary custom-btn-primary">{{ __('Regresar') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                name="address" id="input-address" type="text"
                                                placeholder="{{ __('Dirección') }}" value="{{ old('address') }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('address'))
                                                <span id="address-error" class="error text-danger"
                                                    for="input-address">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Peso') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"
                                                name="weight" id="input-weight" type="text" placeholder="{{ __('Peso') }}"
                                                value="{{ old('weight') }}" required="true" aria-required="true" />
                                            @if ($errors->has('weight'))
                                                <span id="weight-error" class="error text-danger"
                                                    for="input-weight">{{ $errors->first('weight') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nivel') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                                name="level" id="input-level" type="text" placeholder="{{ __('Nivel') }}"
                                                value="{{ old('level') }}" required="true" aria-required="true" />
                                            @if ($errors->has('level'))
                                                <span id="level-error" class="error text-danger"
                                                    for="input-level">{{ $errors->first('level') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Dispositivo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('device_id') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('device_id') ? ' is-invalid' : '' }}"
                                                name="device_id" id="input-device_id" type="text" value="{{ old('device_id') }}"
                                                required="true" aria-required="true">
                                                <option disabled selected>-- Nombre del dispositivo --</option>
                                                @foreach ($devices as $device)
                                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('device_id'))
                                                <span id="device_id-error" class="error text-danger"
                                                    for="input-device_id">{{ $errors->first('device_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary custom-btn-primary">{{ __('Crear') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
