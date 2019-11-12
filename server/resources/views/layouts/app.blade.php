<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CoffeeSign') }} | Admin</title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('admin/index') }}" class="site_title">
                            <i class="fa fa-diamond"></i> <span> {{ config('app.name', 'CoffeeSign') }} </span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ url('admin/users') }}"><i class="fa fa-users"></i>Users</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->email }}
                                    <span class=" fa fa-angle-down"></span> 
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="{{ route('admin.settings') }}">
                                            <i class="fa fa-cog pull-right"></i>
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i>
                                            Log Out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Copyright &copy; <?php echo date("Y"); ?>. CoffeeSign.io - All Rights Reserved
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('admin/vendors/nprogress/nprogress.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('admin/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin/js/custom.js') }}"></script>
	
</body>
</html>
