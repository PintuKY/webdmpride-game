<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Panel</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (request()->is('admin/coupons/create') || request()->is('admin/orders'))
    @else
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    @endif
</head>
<script type="text/javascript">
    var site_url = "{{ url('/') }}";
    var map_array = [];
</script>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/admin/home') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">

                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <div class="row">
                        {{-- <div class="col-md-2">
                            <a href="{{ url('/admin/notifications') }}" class="nav-link"><i class="fa fa-bell"></i></a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ url('/admin/change-password') }}" class="nav-link">Change Password</a>
                        </div> --}}
                        <div class="col-md-3">
                            <a href="{{ url('/admin/logout') }}"
                                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                                class="nav-link">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="index3.html" class="brand-link">
      <img src="{{ asset('/admin/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a> -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    @if (Auth::user()->profile_photo )
                    <div class="image">
                        <img src="{{ asset('storage/ProfilePic/'.Auth::user()->profile_photo) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    @else
                    <div class="image">
                        <img src="{{ asset('admin/images/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    @endif
                    <div class="info">
                        <a href="#" class="d-block">{{ @Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('/admin/home') }}"
                                class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ request()->is('admin/customers') || request()->is('admin/inactive-userst') ? 'has-treeview menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/customers') || request()->is('admin/inactive-customers') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Customer Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/customers') }}"
                                        class="nav-link {{ request()->is('admin/customers') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Customers
                                        </p>
                                    </a>
                                </li>
                            </ul>

                        </li>




                        <li
                            class="nav-item {{ request()->is('admin/wallet/request') || request()->is('admin/wallet/request/completed') ? 'has-treeview menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/wallet/request') || request()->is('admin/wallet/request/completed') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Add Money Requests
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/wallet/request') }}"
                                        class="nav-link {{ request()->is('admin/wallet/request') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                             Request
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/wallet/request/completed') }}"
                                        class="nav-link {{ request()->is('admin/wallet/request/completed') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Completed Request
                                        </p>
                                    </a>
                                </li>
                            </ul>

                        </li>


                        {{--  --}}
                        <li
                        class="nav-item {{ request()->is('admin/withdrawals/show') || request()->is('admin/withdrawals/request/completed') ? 'has-treeview menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/withdrawals/show') || request()->is('admin/withdrawals/request/completed') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Withdrawal Requests
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/admin/withdrawals/show') }}"
                                    class="nav-link {{ request()->is('admin/withdrawals/show') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                         Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/withdrawals/request/completed') }}"
                                    class="nav-link {{ request()->is('admin/withdrawals/request/completed') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Completed  Request
                                    </p>
                                </a>
                            </li>
                        </ul>

                    </li>



                    <li
                        class="nav-item {{ request()->is('admin/bank/request') || request()->is('admin/bank/request/completed') ? 'has-treeview menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/bank/request') || request()->is('admin/bank/request/completed') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Bank Requests
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/admin/bank/request') }}"
                                    class="nav-link {{ request()->is('admin/bank/request') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                         Bank Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/bank/request/completed') }}"
                                    class="nav-link {{ request()->is('admin/bank/request/completed') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Completed  Request
                                    </p>
                                </a>
                            </li>
                        </ul>

                    </li>



                        <li
                            class="nav-item {{ request()->is('admin/bet') || request()->is('admin/bet/record') ? 'has-treeview menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/bet') || request()->is('admin/bet/record') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Bet
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/bet') }}"
                                        class="nav-link {{ request()->is('admin/bet') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All bet
                                        </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ url('/admin/bet/record') }}"
                                        class="nav-link {{ request()->is('admin/bet/record') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Bet Record
                                        </p>
                                    </a>
                                </li>
                            </ul>

                        </li>


                        <li
                            class="nav-item {{ request()->is('admin/game') || request()->is('admin/game/record') ? 'has-treeview menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/game') || request()->is('admin/game/record') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Games
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/game') }}"
                                        class="nav-link {{ request()->is('admin/game') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Games
                                        </p>
                                    </a>
                                </li>

                            </ul>

                        </li>


                        <li
                        class="nav-item {{ request()->is('admin/settings') || request()->is('admin/change-password')  || request()->is('admin/update/profile')  || request()->is('admin/update/bank/details') ? 'has-treeview menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/settings') || request()->is('admin/change-password') || request()->is('admin/update/profile')  || request()->is('admin/update/bank/details') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/admin/change-password') }}"
                                    class="nav-link {{ request()->is('admin/change-password') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Change Password
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/update/profile') }}"
                                    class="nav-link {{ request()->is('admin/update/profile') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                         Profile
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/update/bank/details') }}"
                                    class="nav-link {{ request()->is('admin/update/bank/details') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        UPI Details
                                    </p>
                                </a>
                            </li>

                        </ul>

                    </li>



                    <li
                    class="nav-item {{ request()->is('admin/content') || request()->is('admin/content/record') ? 'has-treeview menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/content') || request()->is('admin/content/record') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            App Content
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/content') }}"
                                class="nav-link {{ request()->is('admin/content') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                 Content
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('#') }}"
                                class="nav-link {{ request()->is('admin/content') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All Content
                                </p>
                            </a>
                        </li> --}}

                    </ul>

                </li>



                        {{-- <li class="nav-item">
                            <a href="{{ url('/admin/test') }}"
                                class="nav-link {{ request()->is('admin/test') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Test Game
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->

        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCncxlXHlXMLPHmLitzZ5RFW6axrycN1ng&libraries=places'>
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".change_order_status").on('change', function() {
                var order_status = $(this).val();
                if (order_status == 'complete') {
                    $("#file_products_" + $(this).attr('id')).show();
                } else {
                    $("#file_products_" + $(this).attr('id')).hide();
                }
                if (order_status == 'cancel') {
                    $("#cancel_text_" + $(this).attr('id')).show();
                } else {
                    $("#cancel_text_" + $(this).attr('id')).hide();
                }
            });

        });
    </script>
</body>

</html>
