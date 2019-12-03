@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Dispensadores')])

@section('content')
<div class="row">
        <div class="col-12 text-right">
          <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar') }}</a>
        </div>
</div>
<div id="map">
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initGoogleMaps();
  });
</script>
@endpush
