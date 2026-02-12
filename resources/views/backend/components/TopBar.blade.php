@php
    $authUser = auth()->user();
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('website.home') }}" target="_blank" class="nav-link topbar-link">
                <i class="fas fa-globe"></i>
                <span>View Website</span>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.clear') }}" class="nav-link topbar-link">
                <i class="fas fa-broom"></i>
                <span>Clear Cache</span>
            </a>
        </li>
        <li class="nav-item d-none d-md-inline-block">
            <a href="{{ request()->fullUrl() }}" class="nav-link topbar-link">
                <i class="fas fa-sync-alt"></i>
                <span>Refresh</span>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
                <img src="{{ asset('backend') }}/dist/img/chhinh.png" alt="User Avatar" class="img-size-20 mr-2 img-circle"
                    height="30">
                <span class="d-none d-sm-inline-block">
                    {{ \Illuminate\Support\Str::limit($authUser?->name ?? 'Admin', 18) }}
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right p-0 admin-user-menu">
                <div class="p-3 border-bottom">
                    <div class="font-weight-bold">{{ $authUser?->name ?? 'Admin User' }}</div>
                    <small class="text-muted">{{ $authUser?->email ?? 'No email available' }}</small>
                </div>

                <a href="{{ route('website.home') }}" target="_blank" class="dropdown-item">
                    <i class="fas fa-external-link-alt mr-2"></i> Visit Website
                </a>

                <div class="dropdown-divider m-0"></div>

                <form action="{{ route('logout') }}" method="POST" class="d-block">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
