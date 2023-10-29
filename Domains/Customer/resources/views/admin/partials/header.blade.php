<!-- Navbar -->


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('customers.index')}}" class="brand-link">
        <img src="{{asset('AdminLTE/dist/img/logo-techno.png')}}" alt="">
        <div class="name__customer">
            <img src="{{asset('AdminLTE/dist/img/customerimg.png')}}" alt="">
            <span class="brand-text font-weight-light"> Hi </span>
        </div>
        <!--name__customer-->
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar customer panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a class="nav-link">
                        <p>
                            Customers
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customers.index')}}" class="nav-link">
                                <p>Customers List</p>
                            </a>
                        </li>
                        <li class="nav-item customernav">
                            <a href="{{route('customers.create')}}" class="nav-link">
                                <p>Create Customer +</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->


</aside>
