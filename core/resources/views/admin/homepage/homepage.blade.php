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
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
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
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">

                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 id="Ubody" class="text-muted">Accounts</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1" id='total_count'></h1>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Supervisors</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{ $supervisorsCount->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Projects</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1" id='project_count'></h1>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Donations</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">1340</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Accounts</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Name</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">Username</th>
                                                <th class="border-0">Is Verified</th>
                                                <th class="border-0">Date Of Birth</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Projects</h5>
                                <div class="card-body p-0">
                                    <div id="app">
                                        @if(!empty($successMsg))
                                            <div class="alert alert-success">
                                                {{$successMsg}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">User ID</th>
                                                <th class="border-0">Name</th>
                                                <th class="border-0">Budget</th>
                                                <th class="border-0">Created At</th>
                                                <th class="border-0">Donations</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tproject">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->

                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success update">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--                     End of the Update form--}}


<!-- Assign -->
<form action="{{route('assigned_projects')}}" method="POST" class="users-update-record-model form-horizontal">
    @csrf
    <div id="assign" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Assign Supervisor</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name" class="col-md-12 col-form-label">Select a supervisor</label>
                        <div class="col-md-12">
                            <select name="supervisor_id" class="form-control">
                                @foreach($pro as $prod)
                                    <option name="supervisor_id" value="{{$prod->ids}}">
                                        {{$prod->ids}} {{$prod->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="assignBody">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-success update">Assign
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--                     End of the Update form--}}

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        //apiKey: "{{ config('services.firebase.api_key') }}",
        apiKey: "AIzaSyCP_RY0y8n68NiUdjQeq0J7zON2V44z5H8",
        //authDomain: "{{ config('services.firebase.auth_domain') }}",
        authDomain: "afunding-project-2ed93.firebaseapp.com",
        //databaseURL: "{{ config('services.firebase.database_url') }}",
        databaseURL: "https://funding-project-2ed93-default-rtdb.firebaseio.com/",
        //storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        storageBucket: "funding-project-2ed93.appspot.com",
    };
    firebase.initializeApp(config);

    var database = firebase.database();

    var lastIndex = 0;


    // number of users

    firebase.database().ref('profile/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        var total_count = 0;

        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
        		<td>' + value.key + '</td>\
                <td>' + value.displayName + '</td>\
        		<td>' + value.email + '</td>\
                <td>' + value.userName + '</td>\
        		<td>' + value.isVerified + '</td>\
                <td>' + value.dob + '</td>\
        		<td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		 </td>\
        	</tr>');
            }
            lastIndex = index;
            total_count++;
        });

        $('#total_count').html(total_count);
        $('#tbody').html(htmls);
        $("#submitUser").removeClass('desabled');
    });


    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('profile/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Display Name</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.displayName + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Email</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="email" value="' + values.email + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Username</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.userName + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Is Verified</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.isVerified + '"  required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Date Of Birth</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.dob + '" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Location</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="name" value="' + values.location + '" required autofocus>\
		        </div>\
		    </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.update').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var isV = false;
        if(values[3].value == "true"){
            isV = true;
        }
        var postData = {
            displayName: values[0].value,
            email: values[1].value,
            userName: values[2].value,
            isVerified: isV,
            dob: values[4].value,
            location: values[5].value,
        };


        firebase.database().ref('/profile/' + updateID).update(postData);

        $("#update-modal").modal('hide');
    });


    // number of projects

    firebase.database().ref('project/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        var project_count = 0;

        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
        		<td>' + value.key + '</td>\
        		<td>' + value.user.userId + '</td>\
                <td>' + value.user.displayName + '</td>\
                <td>' + value.budget + '</td>\
                <td>' + value.createdAt + '</td>\
        		<td>' + value.donations + '</td>\
        		<td><button data-toggle="modal" data-target="#assign" class="btn btn-info assignSuper" data-id="' + index + '">Assign Supervisor</button>\
        		 </td>\
        	</tr>');
            }
            lastIndex = index;
            project_count++;
        });

        $('#project_count').html(project_count);
        $('#tproject').html(htmls);
        $("#submitUser").removeClass('desabled');
    });


    // Assign Supervisor
    var updateID = 0;
    $('body').on('click', '.assignSuper', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('project/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label"></label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="hidden" class="form-control" name="" value="' + values.name + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">User Id</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="user_id" value="' + values.user.userId + '" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Project Id</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="project_id" value="' + values.key + '"  required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Username</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="username" value="' + values.user.displayName + '"  required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Budget</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="budget" value="' + values.budget + '"  required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Donations</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.donations + '"  required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Date Uploaded</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="name" value="' + values.createdAt + '"  required autofocus>\
		        </div>\
		    </div>';

            $('#assignBody').html(updateData);
        });
    });






</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




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
