@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Administración de usuarios')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary custom-card-header">
                            <h4 class="card-title">{{ __('Ver información del usuario') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('user.index') }}"
                                        class="btn btn-sm btn-primary custom-btn-primary">{{ __('Regresar') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input disabled class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" id="input-name" type="text" placeholder="{{ __('Name') }}"
                                            value="{{ old('name', $user->name) }}"="true" aria-="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Apellido') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                        <input disabled
                                            class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                            name="surname" id="input-surname" type="text" placeholder="{{ __('Apellido') }}"
                                            value="{{ old('surname', $user->surname) }}"="true" aria-="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Cedula') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('cedula') ? ' has-danger' : '' }}">
                                        <input disabled
                                            class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}"
                                            name="cedula" id="input-cedula" type="text" placeholder="{{ __('Cedula') }}"
                                            value="{{ old('cedula', $user->cedula) }}"="true" aria-="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Celular') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <input disabled class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" id="input-phone" type="text" placeholder="{{ __('Celular') }}"
                                            value="{{ old('phone', $user->phone) }}"="true" aria-="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Dirección') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                        <input disabled
                                            class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                            name="address" id="input-address" type="text"
                                            placeholder="{{ __('Dirección') }}"
                                            value="{{ old('address', $user->address) }}"="true" aria-="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Card id') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('card') ? ' has-danger' : '' }}">
                                        <input disabled class="form-control{{ $errors->has('card') ? ' is-invalid' : '' }}"
                                            name="card" id="input-card" type="text" placeholder="{{ __('Card id') }}"
                                            value="{{ old('card', $user->card->card) }}"="true" aria-="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input disabled class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" id="input-email" type="email" placeholder="{{ __('Email') }}"
                                            value="{{ old('email', $user->email) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
