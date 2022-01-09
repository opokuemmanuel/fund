
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>funding</title>
    <!-- Bootstrap CSS -->

    <link href="{{ asset('./assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/circular-std/style.css" rel="stylesheet') }}" rel="stylesheet">
    <link href="{{ asset('./assets/libs/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;

        }
    </style>
</head>

<body style="background-image: url('./assets/images/fund.png'); background-repeat: no-repeat;  background-size: 100% 100%;  background-attachment: fixed;">
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a><img height="70" width="90" class="logo-img" src="./assets/images/log.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            <div id="app">
                @if(!empty($successMsg))
                    <div class="alert alert-success">
                        {{$successMsg}}
                    </div>
                @endif
            </div>
            <form method="post" action="{{route("super_sign")}}">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-lg" name="ids" id="username" type="text" placeholder="Id" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="c_password"  type="password" placeholder="Confirm Password">
                </div>


                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{route('addLogin')}}" class="footer-link">Already has an Account? Login</a></div>

        </div>

    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{ asset('./assets/vendor/jquery/jquery-3.3.1.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/bootstrap/js/bootstrap.bundle.js') }}" ></script>

</body>

</html>
