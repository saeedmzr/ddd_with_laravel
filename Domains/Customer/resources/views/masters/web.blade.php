<!DOCTYPE html>


<html dir="ltr" lang="en">


<head>


    @include('web.partials.head')


</head>


<body>


<div class="container-fluid">


    @include('web.partials.header')


    <main id='app' class="row">


        @yield('content')


    </main>


    @include('web.partials.footer')


</div>


@include('web.partials.scripts')


@yield('script')


</body>


</html>
