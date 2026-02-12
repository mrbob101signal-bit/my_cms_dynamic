@include('backend.components.Header')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="spinner-grow"
                src="{{ $website?->site_loader_image ? asset($website->site_loader_image) : asset('backend/dist/img/AdminLTELogo.png') }}"
                alt="Site Loader Image">
        </div>

        <!-- Navbar -->
        @include('backend.components.TopBar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.components.sideBar')

        @yield('content')

        @include('backend.components.Footer')
