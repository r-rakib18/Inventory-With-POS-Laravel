<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project | @yield('title')</title>
    @include('layouts.partials.styles')
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
            <!-- Preloader -->
        @include('layouts.partials.preloader')

        <!--Header Navbar -->
        @include('layouts.navbar.partial.header')
        <!-- /.navbar -->

            <!-- Main Sidebar Container -->
        @include('layouts.navbar.sidebar')

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('layouts.partials.breadcrumb')
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
        </div><!-- /.container-fluid -->
        <!-- /.content-wrapper -->

        <!-- /.content-wrapper -->

        @include('layouts.footer.footer')
    <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->

<!-- jQuery -->
    @include('layouts.partials.scripts')
    @yield('scripts')
</body>
</html>