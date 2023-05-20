<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Soyuz is a bootstrap 4x + laravel admin dashboard template">
    <meta name="keywords"
          content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, laravel, clean, crm, ecommerce, hospital, responsive, rtl, sass support, ui kits">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Soyuz - Bootstrap 4x + Laravel Admin Dashboard Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Start css -->
    <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-head">
                                        <a href="index.html" class="logo"><img src="assets/images/logo.svg"
                                                                               class="img-fluid" alt="logo"></a>
                                    </div>
                                    <h4 class="text-primary my-4">Log in !</h4>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="email"
                                               placeholder="Enter Email here" autofocus autocomplete="username"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" id="password"
                                               placeholder="Enter Password here" required
                                               autocomplete="current-password">
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox text-left">
                                                <input name="remember" type="checkbox" class="custom-control-input"
                                                       id="remember_me">
                                                <label class="custom-control-label font-14" for="remember_me">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="forgot-psw">
                                                <a id="forgot-psw" href="user-forgotpsw.html" class="font-14">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in
                                    </button>
                                </form>
                                <p class="mb-0 mt-3">Don't have a account? <a href="{{route('register')}}">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
<script src="{{asset('assets/dashboard/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/dashboard/js/popper.min.js')}}"></script>
<script src="{{asset('assets/dashboard/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/dashboard/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/dashboard/js/detect.js')}}"></script>
<script src="{{asset('assets/dashboard/js/jquery.slimscroll.js')}}"></script>
<!-- End js -->
</body>
</html>
