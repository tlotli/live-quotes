<div>
    <body class="account-body">

    <div class="row vh-100">
        <div class="col-lg-3  pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">


                    @if(session()->has('error'))
                        <div class="alert icon-custom-alert alert-outline-danger alert-success-shadow" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon"></i>
                            <div class="alert-text">
                                <strong>Warning</strong> {{session('error')}}
                            </div>
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <strong>Success</strong> {{session('message')}}
                            </div>
                        </div>
                    @endif

                    <div class="px-3">
                        <div class="media">
                            <a href="{{url('/')}}" class="logo logo-admin"><img
                                    src="{{asset("assets/images/logo-sm.png")}}" height="55" alt="logo"
                                    class="my-3"></a>
                            <div class="media-body ml-3 align-self-center">
                                <h4 class="mt-0 mb-1">Login on Live - Quotes</h4>
                                <p class="text-muted mb-0">Sign in to continue to Live - Quotes.</p>
                            </div>
                        </div>

                        <form class="form-horizontal my-4" wire:submit.prevent="login" >
                            <div class="form-group @error('email') has-error @enderror">
                                <label for="email" @error('email') class="text-danger" @enderror>Email</label>
                                <div class="input-group mb-3">
                                    <input type="text"
                                           class="form-control @error('email') form-control-danger @enderror" id="email"
                                           wire:model.lazy="email">
                                </div>
                                <div class="form-control-feedback text-danger">@error('email') {{$message}} @enderror</div>
                            </div>

                            <div class="form-group  @error('password') has-error @enderror">
                                <label for="password" @error('password') class="text-danger" @enderror>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control  @error('password') form-control-danger @enderror" id="password " wire:model.lazy="password">
                                </div>
                                <div class="form-control-feedback text-danger">@error('password') {{$message}} @enderror</div>
                            </div>

                            <div class="form-group ">
                                <a href="pages-recoverpw-2.html" class="text-muted font-13"><i class="mdi mdi-lock"></i>
                                    Forgot your password?</a>
                            </div>

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                        In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="m-3 text-center bg-light p-3 text-primary">
                        <h5 class="">Don't have an account ? </h5>
                        <a href="{{url('/register')}}" class="btn btn-primary btn-round waves-effect waves-light">Register
                            Here</a>
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
                    <p class="font-14 mt-3">Don't have an account ? <a href="{{url('/register')}}" class="text-primary">Sign
                            up</a></p>

                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    {{--<script src="assets/js/app.js"></script>--}}

    </body>
</div>
