@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('smartpetbin.com')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @forelse ($dumps as $dump)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary custom-card-header">
                                <h4 class="card-title ">{{ $dump->device->name }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-left">Serial: {{ $dump->device->serial }}</p>
                                <p class="text-left">Ubicación: 1233265</p>
                                <p class="text-left">Peso: {{ $dump->weight }}</p>
                                <p class="text-left">Ultimo evento: hola mundo</p>
                                <p class="text-left">Señal: alta</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $dump->level }}%;"
                                        aria-valuenow="{{ $dump->level }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $dump->level }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            <span>Actualmente no hay basureros agregados.</span>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });

    </script>
@endpush
