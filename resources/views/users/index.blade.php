@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Administración de usuarios')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary custom-card-header">
                            <h4 class="card-title ">{{ __('Usuarios') }}</h4>
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
                                    <a href="{{ route('user.create') }}"
                                        class="btn btn-sm btn-primary custom-btn-primary">{{ __('Agregar') }}</a>
                                </div>
                            </div>
                            @if (count($users) == 0)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <span>Actualmente no hay usuarios agregados.</span>
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
                                                {{ __('Email') }}
                                            </th>
                                            <th>
                                                {{ __('Fecha de creación') }}
                                            </th>
                                            <th class="text-right">
                                                {{ __('Acciones') }}
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>
                                                        {{ $user->created_at->format('Y-m-d') }}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        @if ($user->id != auth()->id())
                                                            <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <a rel="tooltip" class="btn btn-warning btn-link"
                                                                    href="{{ route('user.show', $user) }}"
                                                                    data-original-title="" title="">
                                                                    <i class="material-icons">visibility</i>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                                    href="{{ route('user.edit', $user) }}"
                                                                    data-original-title="" title="">
                                                                    <i class="material-icons">edit</i>
                                                                    <div class="ripple-container"></div>
                                                                </a>
                                                                <button type="button" class="btn btn-danger btn-link"
                                                                    data-original-title="" title=""
                                                                    onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                                                                    <i class="material-icons">close</i>
                                                                    <div class="ripple-container"></div>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                                href="{{ route('profile.edit') }}" data-original-title=""
                                                                title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        @endif
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
