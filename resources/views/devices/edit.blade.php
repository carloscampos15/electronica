@extends('layouts.app', ['activePage' => 'device-management', 'titlePage' => __('Administración de dispositivos')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('device.update', $device) }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary custom-card-header">
                                <h4 class="card-title">{{ __('Editar') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('device.index') }}"
                                            class="btn btn-sm btn-primary custom-btn-primary">{{ __('Regresar') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text" placeholder="{{ __('Name') }}"
                                                value="{{ old('name', $device->name) }}" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Serial') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('serial') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}"
                                                name="serial" id="input-serial" type="text" placeholder="{{ __('Serial') }}"
                                                value="{{ old('serial', $device->serial) }}" required />
                                            @if ($errors->has('serial'))
                                                <span id="serial-error" class="error text-danger"
                                                    for="input-serial">{{ $errors->first('serial') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary custom-btn-primary">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
