@extends('layouts.app', ['activePage' => 'device-management', 'titlePage' => __('Administración de dispositivos')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary custom-card-header">
                            <h4 class="card-title ">{{ __('Dispositivos') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('device.create') }}"
                                        class="btn btn-sm btn-primary custom-btn-primary">{{ __('Agregar') }}</a>
                                </div>
                            </div>
                            @if (count($devices) == 0)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <span>Actualmente no hay dispositivos agregados.</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                {{ __('Nombre') }}
                                            </th>
                                            <th>
                                                {{ __('Serial') }}
                                            </th>
                                            <th>
                                                {{ __('Latitud') }}
                                            </th>
                                            <th>
                                                {{ __('Longitud') }}
                                            </th>
                                            <th class="text-right">
                                                {{ __('Acciones') }}
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($devices as $device)
                                                <tr>
                                                    <td>
                                                        {{ $device->name }}
                                                    </td>
                                                    <td>
                                                        {{ $device->serial }}
                                                    </td>
                                                    <td>
                                                        {{ $device->latitude }}
                                                    </td>
                                                    <td>
                                                        {{ $device->longitude }}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <form action="{{ route('device.destroy', $device) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                                href="{{ route('device.edit', $device) }}"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title=""
                                                                onclick="confirm('{{ __('Are you sure you want to delete this device?') }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
