<!DOCTYPE html>


<html>


<head>


    @include('customer::admin.partials.head')


</head>


<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">


@include('customer::admin.partials.header')


<!-- Content Wrapper. Contains page content -->


    <div class="content-wrapper">


        <!-- Content Header (Page header) -->


        @yield('content')


    </div>


    <!-- /.content-wrapper -->


    @include('customer::admin.partials.footer')


</div>


<!-- ./wrapper -->


@include('customer::admin.partials.scripts')


@yield('script')


</body>


</html>
