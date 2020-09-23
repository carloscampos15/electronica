<div class="sidebar" data-color="blue" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo text-center">
        <h4>{{ __('Sistema de gestión de recolección de heces caninas') }}</h4>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Gestion de usuarios') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'device-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('device.index') }}">
                    <i class="material-icons">construction</i>
                    <p>{{ __('Gestion de dispositivos') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('map') }}">
                    <i class="material-icons">location_ons</i>
                    <p>{{ __('Dispensadores') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
