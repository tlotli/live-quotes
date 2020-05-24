<div>
    <div class="row vh-100">
        <div class="col-lg-3  pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">

                    <div class="px-3">
                        <div class="media">
                            <a href="index.html" class="logo logo-admin"><img src="{{asset('assets/images/logo-sm.png')}}" height="55" alt="logo" class="my-3"></a>
                            <div class="media-body ml-3 align-self-center">
                                <h4 class="mt-0 mb-1">Register Your Account Here</h4>
                            </div>
                        </div>

                        <form class="form-horizontal my-4" wire:submit.prevent="register">

                            <div class="form-group @error('name') has-error @enderror">
                                <label for="username" @error('name') class="text-danger" @enderror>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('name') form-control-danger @enderror" id="name" wire:model.lazy="name" value="{{old('name')}}">
                                </div>
                                <div class="form-control-feedback text-danger">@error('name') {{$message}} @enderror</div>
                            </div>

                            <div class="form-group  @error('email') has-error @enderror">
                                <label for="email"  @error('email') class="text-danger" @enderror>Email Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control  @error('email') form-control-danger @enderror" id="email" wire:model.lazy="email" value="{{old('email')}}">
                                </div>
                                <div class="form-control-feedback text-danger">@error('email') {{$message}} @enderror</div>
                            </div>

                            <div class="form-group @error('password') has-error @enderror">
                                <label for="password" @error('password') class="text-danger" @enderror>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') form-control-danger @enderror" id="password" wire:model.lazy="password">
                                </div>
                                <div class="form-control-feedback text-danger">@error('password') {{$message}} @enderror</div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password_confirmation" wire:model.lazy="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">
                                            <span class="font-13 text-muted mb-0">By registering you agree to the Frogetor <a href="#">Terms of Use</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="m-3 text-center bg-light p-3 text-primary">
                        <h5 class="">Already have an account ? </h5>
{{--                        <p class="font-13">Login Frogetor Now</p>--}}
                        <a href="{{url('/')}}" class="btn btn-primary btn-round waves-effect waves-light px-3">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0 d-flex justify-content-center">
            <div class="accountbg d-flex align-items-center">
                <div class="account-title text-white text-center">
                    <img src="assets/images/logo-sm.png" alt="" class="thumb-sm">
{{--                    <h4 class="mt-3">Welcome To Frogetor</h4>--}}
                    <div class="border w-25 mx-auto border-primary"></div>
                    <h1 class="">Let's Get Started</h1>
                    <p class="font-14 mt-3">Already have an account ? <a href="" class="text-primary">Login</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
