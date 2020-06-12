@extends('layouts.app_layouts.main_app')

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title text-success">Search Bids</h4>
                    <div class="form-group ">
                        <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-search"></i></button>
                                                </span>
                            <input type="text" class="form-control" placeholder="Search For Bids">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        @foreach($companies as $comp)
            <div class="col-lg-3" x-data="{isOpen : false}">
                <div class="card profile-card">
                    <div class="card-body border-bottom  p-0">
                        <div class="media p-3  align-items-center">
                            @if($comp->photo == "")
                                <img src="{{Avatar::create($comp->company_name)->toBase64()}}" alt="user"
                                     class="rounded-circle thumb-xl">
                            @else
                                <img src="{{'/storage/'.$comp->photo}}" alt="user"
                                     class="rounded-circle thumb-xl">
                            @endif

                            <div class="media-body ml-3  align-self-center">
                                <h5 class="mb-1 text-muted">{{$comp->company_name}}</h5>
                                <p class="mb-0 font-12 text-muted"><i
                                        class="fas fa-map-marker-alt mr-2"></i>{{$comp->company_city . ' , ' . $comp->company_province }}
                                </p>
                            </div>
                            <a class="btn btn-light btn-sm" @click="isOpen = !isOpen" x-show="!isOpen"><i
                                    class="fas fa-plus"></i></a>
                            <a class="btn btn-light btn-sm" @click="isOpen = !isOpen" x-show="isOpen"><i
                                    class="fas fa-minus"></i></a>
                        </div>

                    </div>

                    <div x-show="isOpen">
                        <div class="card-body pb-0">
                            <h6 class="text-center">Activity level : 90%</h6>
                            <p class="font-14 text-muted text-center">Contrary to popular belief, Lorem Ipsum is not
                                simply
                                random text.</p>
                            <ul class="list-inline list-unstyled profile-socials text-center mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class=""><i class="fab fa-facebook-f bg-soft-primary"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class=""><i class="fab fa-twitter bg-soft-info"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class=""><i class="fab fa-dribbble bg-soft-danger"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body pb-0 px-0">
                            <div class="row text-center border-top m-0">
                                <div class="col-4 border-right p-3">
                                    @foreach($follows as $f)
                                        @if($f->followee != $comp->follower)
                                            <a href="#">
                                                <i class="fas fa-user-plus text-primary font-20"></i>
                                            </a>
                                        @else
                                            <a href="#">
                                                <i class="fas fa-user-minus text-warning font-20"></i>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-4 border-right p-3">
                                    <a href="#">
                                        <i class="fas fa-comment-alt text-info font-20"></i>
                                    </a>
                                </div>
                                <div class="col-4 p-3">
                                    <a href="#">
                                        <i class="fas fa-heart text-danger font-20"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
