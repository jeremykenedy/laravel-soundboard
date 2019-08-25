<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        {{-- Toggler --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Brand --}}
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpg') }}">
            {!! trans('admin.brand') !!}
        </a>

        {{-- User --}}
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="{{ $currentUser->name }}" src="{{ Gravatar::fallback(asset('images/avatar-default.png'))->get($currentUser->email) }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">
                        {!! trans('admin.dropdown.welcome') !!}
                    </h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>
                            {!! trans('admin.dropdown.myprofile') !!}
                        </span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>
                            {!! trans('admin.dropdown.logout') !!}
                        </span>
                    </a>
                </div>
            </li>
        </ul>

        {{-- Collapse --}}
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.jpg') }}">
                            <span class="text-primary">
                                {!! trans('admin.brand') !!}
                            </span>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('admin') ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fas fa-tachometer-alt text-primary"></i>
                        {!! trans('admin.sidebar.dashboard') !!}
                    </a>
                </li>
                @if($currentUser->hasPermission('perms.super.admin') || $currentUser->hasPermission('perms.admin'))
                    <li class="nav-item {{ Request::is('sounds') || Request::routeIs('createsound') || Request::routeIs('editsound') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('sounds') }}">
                            <i class="ni ni-sound-wave text-primary"></i>
                            {!! trans('admin.sidebar.sounds') !!}
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('themes') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('themes') }}">
                            <i class="fas fa-palette text-primary"></i>
                            {!! trans('admin.sidebar.themes') !!}
                        </a>
                    </li>
                @endif
                @if($currentUser->hasPermission('perms.super.admin'))
                    <li class="nav-item {{ Request::is('user') || Request::routeIs('user.edit') || Request::routeIs('user.create') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="fas fa-users text-primary"></i>
                            {!! trans('admin.sidebar.user-admin') !!}
                        </a>
                    </li>
                    <li class="nav-item {{ (Request::is('roles') || Request::is('permissions')) ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('laravelroles::roles.index') }}">
                            <i class="fas fa-user-shield text-primary"></i>
                            {!! trans('admin.sidebar.roles-admin') !!}
                        </a>
                    </li>
                    <li class="nav-item {{ (Request::is('activity') || Request::is('activity/cleared')) ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('activity') }}">
                            <i class="fas fa-coins text-primary"></i>
                            {!! trans('admin.sidebar.activity') !!}
                        </a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('laravelPhpInfo::phpinfo') ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('laravelPhpInfo::phpinfo') }}">
                            <i class="fab fa-php text-primary"></i>
                            {!! trans('admin.sidebar.php-info') !!}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
