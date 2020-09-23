@extends('layouts.app', ['activePage' => 'dump-management', 'titlePage' => __('Administración de basureros')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary custom-card-header">
                            <h4 class="card-title ">{{ __('Basureros') }}</h4>
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
                                    <a href="{{ route('dump.create') }}"
                                        class="btn btn-sm btn-primary custom-btn-primary">{{ __('Agregar') }}</a>
                                </div>
                            </div>
                            @if (count($dumps) == 0)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <span>Actualmente no hay basureros agregados.</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                {{ __('Dirección') }}
                                            </th>
                                            <th>
                                                {{ __('Peso') }}
                                            </th>
                                            <th>
                                                {{ __('Nivel') }}
                                            </th>
                                            <th>
                                                {{ __('Dispositivo') }}
                                            </th>
                                            <th class="text-right">
                                                {{ __('Acciones') }}
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($dumps as $dump)
                                                <tr>
                                                    <td>
                                                        {{ $dump->address }}
                                                    </td>
                                                    <td>
                                                        {{ $dump->weight }}
                                                    </td>
                                                    <td>
                                                        {{ $dump->level }}
                                                    </td>
                                                    <td>
                                                        {{ $dump->device->name }}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <form action="{{ route('dump.destroy', $dump) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                                href="{{ route('dump.edit', $dump) }}"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title=""
                                                                onclick="confirm('{{ __('Are you sure you want to delete this dump?') }}') ? this.parentElement.submit() : ''">
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
