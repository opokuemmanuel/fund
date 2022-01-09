<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet">--}}
<!-- Bootstrap CSS -->
    {{--    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">--}}
    <link href="{{ asset('./assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/libs/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/charts/chartist-bundle/chartist.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/charts/morris-bundle/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/charts/c3charts/c3.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}" rel="stylesheet">

    <title>Funding</title>
</head>

<body>

<div class="dashboard-main-wrapper">

    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="{{route('homepage')}}">Funding</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./assets/images/avatar-1.png" alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="dropdown-item get-started-btn scrollto"><i class="fas fa-cog mr-2"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <a href="{{route('homepage')}}" class="nav-divider" style="color: white" >Menu</a>

                        <li class="nav-item ">
                            <a class="nav-link"   data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard </a>
                            <div id="submenu-1" class="collapse submenu" style="">
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Supervisor</a>
                            <div id="submenu-3" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('add')}}">Add Supervisor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('all')}}">Supervisors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('all_assigned_projects')}}">Assigned projects</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('reports')}}">Reports</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link " href="{{route('show_register')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Register Account </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-10">
                    <div class="row">
                        @foreach($pro as $prod)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Project id:{{$prod->project_id}}</h3>
                                        <h3 class="card-title">Supervisor id:{{$prod->supervisor_id}}</h3>
                                        <a href="{{url('/download/'.$prod->report)}}" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- sidenavbar -->
                <!-- ============================================================== -->

            </div>
        </div>

    </div>

<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- bootstap bundle js -->
<script src="{{ asset('./assets/vendor/bootstrap/js/bootstrap.bundle.js') }}" ></script>
<script src="{{ asset('./assets/vendor/slimscroll/jquery.slimscroll.js') }}" ></script>
<script src="{{ asset('./assets/libs/js/main-js.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/chartist-bundle/chartist.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/sparkline/jquery.sparkline.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/sparkline/jquery.sparkline.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/morris-bundle/raphael.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/morris-bundle/morris.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/c3charts/c3.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/charts/c3charts/C3chartjs.js') }}" ></script>
<script src="{{ asset('./assets/libs/js/dashboard-ecommerce.js') }}" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

