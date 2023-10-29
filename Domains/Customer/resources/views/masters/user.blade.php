<!DOCTYPE html>


<html>


<head>


    @include('user.partials.head')


</head>


<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">


@include('user.partials.header')


<!-- Content Wrapper. Contains page content -->


    <div class="content-wrapper">


        <!-- Content Header (Page header) -->


        @yield('content')


    </div>


    <!-- /.content-wrapper -->


    @include('user.partials.footer')


</div>


<!-- ./wrapper -->


@include('user.partials.scripts')


@yield('script')


</body>


</html>
