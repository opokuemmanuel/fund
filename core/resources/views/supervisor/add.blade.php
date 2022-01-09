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
                                <h5 class="card-header">Add Supervisor</h5>
                                <div id="app">
                                    @if(!empty($successMsg))
                                        <div class="alert alert-success">
                                            {{$successMsg}}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{route('add_supervisor')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="staff_id" name="staff_id">
                                        </div>

                                        <div class="form-group">
                                           <select class="form-control" name="gender">
                                               <option disabled>Gender</option>
                                               <option>Male</option>
                                               <option>Female</option>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                <input type="text" name="dob" class="form-control datetimepicker-input" placeholder="date of birth" data-target="#datetimepicker4" />
                                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="house no." name="house_no">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="place of work" name="work">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="card">
                                                <option disabled>Choose id card </option>
                                                <option>Voters id</option>
                                                <option>National Id</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="enter id number" name="card_no">
                                        </div>
                                        <div class="form-group">
                                            <label>Upload ID Image</label>
                                            <input type="file" class="form-control" placeholder="place of residence" name="card_image">
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input type="file" class="form-control" placeholder="place of residence" name="photo">
                                        </div>

                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p>Add Supervisor ?</p>
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



<script src="{{ asset('./assets/vendor/jquery/jquery-3.3.1.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/bootstrap/js/bootstrap.bundle.js') }}" ></script>
<script src="{{ asset('./assets/vendor/slimscroll/jquery.slimscroll.js') }}" ></script>
<script src="{{ asset('./assets/libs/js/main-js.js') }}" ></script>
<script src="{{ asset('./assets/vendor/inputmask/js/jquery.inputmask.bundle.js') }}" ></script>
<script src="{{ asset('./assets/vendor/datepicker/moment.js') }}" ></script>
<script src="{{ asset('./assets/vendor/datepicker/tempusdominus-bootstrap-4.js') }}" ></script>
<script src="{{ asset('./assets/vendor/datepicker/datepicker.js') }}" ></script>


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

