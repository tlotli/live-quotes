<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Live - Quotes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Get Quotes Fast" name="description" />
    <meta content="Ithateng Solutions" name="author" />
    <link rel="shortcut icon" href="{{asset("assets/images/favicon.ico")}}">
    <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/css/styling.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet" type="text/css" />
</head>

<body class="account-body">

<div class="row vh-100">
    <div class="col-lg-3  pr-0">
        <div class="card mb-0 shadow-none">
            <div class="card-body">

                <div class="px-3">
                    <div class="media">
                        <a href="index.html" class="logo logo-admin"><img src="{{asset("assets/images/logo-sm.png")}}" height="55" alt="logo" class="my-3"></a>
                        <div class="media-body ml-3 align-self-center">
                            <h4 class="mt-0 mb-1">Login on Live - Quotes</h4>
                            <p class="text-muted mb-0">Sign in to continue to Live - Quotes.</p>
                        </div>
                    </div>

                    <form class="form-horizontal my-4" action="index.html">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
{{--                                    <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>--}}
                                </div>
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
{{--                                    <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>--}}
                                </div>
                                <input type="password" class="form-control" id="userpassword">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="pages-recoverpw-2.html" class="text-muted font-13"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                        </div>

                        <div class="form-group mb-0 row">
                            <div class="col-12 mt-2">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
{{--                <div class="account-social text-center">--}}
{{--                    <h6 class="my-4">Or Login With</h6>--}}
{{--                    <ul class="list-inline mb-4">--}}
{{--                        <li class="list-inline-item">--}}
{{--                            <a href="" class="">--}}
{{--                                <i class="fab fa-facebook-f facebook"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="list-inline-item">--}}
{{--                            <a href="" class="">--}}
{{--                                <i class="fab fa-twitter twitter"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="list-inline-item">--}}
{{--                            <a href="" class="">--}}
{{--                                <i class="fab fa-google google"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="m-3 text-center bg-light p-3 text-primary">
                    <h5 class="">Don't have an account ? </h5>
                    <p class="font-13">Join <span>Live-Quotes</span> Now</p>
                    <a href="#" class="btn btn-primary btn-round waves-effect waves-light">Free Resister</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 p-0 d-flex justify-content-center">
        <div class="accountbg d-flex align-items-center">
            <div class="account-title text-white text-center">
                <img src="assets/images/logo-sm.png" alt="" class="thumb-sm">
                <h4 class="mt-3">Welcome To Frogetor</h4>
                <div class="border w-25 mx-auto border-primary"></div>
                <h1 class="">Let's Get Started</h1>
                <p class="font-14 mt-3">Don't have an account ? <a href="" class="text-primary">Sign up</a></p>

            </div>
        </div>
    </div>
</div>
<!-- End Log In page -->


<!-- jQuery  -->
{{--<script src="assets/js/jquery.min.js"></script>--}}
{{--<script src="assets/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="assets/js/metisMenu.min.js"></script>--}}
{{--<script src="assets/js/waves.min.js"></script>--}}
{{--<script src="assets/js/jquery.slimscroll.min.js"></script>--}}

<!-- App js -->
{{--<script src="assets/js/app.js"></script>--}}

</body>
</html>
