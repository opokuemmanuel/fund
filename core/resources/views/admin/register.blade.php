<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Funding</title>

    <link href="{{ asset('./assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/libs/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/datepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/inputmask/css/inputmask.css') }}" rel="stylesheet">

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
                            <a class="nav-link"   data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            <div id="submenu-1" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"  aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2" style="color: white">E-Commerce</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-finance.html" style="color: white">Finance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dashboard-sales.html" style="color: white">Sales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"  aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1" style="color: white">Infulencer</a>
                                    </li>
                                </ul>
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
                                        <a class="nav-link" href="pages/chart-charts.html">Assigned projects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('reports')}}">Reports</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('show_register')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Register Account </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Register aAdmin</h5>
                                <div id="app">
                                    @if(!empty($successMsg))
                                        <div class="alert alert-success">
                                            {{$successMsg}}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{route('reg')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required class="form-control" placeholder="username" name="user">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required class="form-control" placeholder="password" name="password">
                                        </div>

                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p>Add Account ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" type="button">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>
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
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
{{--<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>--}}
{{--<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>--}}
{{--<script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>--}}
{{--<script src="../assets/libs/js/main-js.js"></script>--}}
{{--<script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>--}}


<script src="{{ asset('./assets/vendor/jquery/jquery-3.3.1.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/bootstrap/js/bootstrap.bundle.js') }}" ></script>
<script src="{{ asset('./assets/vendor/slimscroll/jquery.slimscroll.js') }}" ></script>
<script src="{{ asset('./assets/libs/js/main-js.js') }}" ></script>
<script src="{{ asset('./assets/vendor/inputmask/js/jquery.inputmask.bundle.js') }}" ></script>
<script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
</script>
</body>

</html>

