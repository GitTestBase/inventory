<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<!-- Mirrored from themesbrand.com/velzon/html/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 04:18:58 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    @include('layouts.admin.links')
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.admin.header')
        @include('layouts.admin.leftMenu')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('body')
                </div>
            </div>
        </div>

            @include('layouts.admin.footer')
            @include('layouts.admin.scripts')
            @yield('js')
    </div>
    @stack('scripts')
    <!-- <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button> -->
</body>
</html>