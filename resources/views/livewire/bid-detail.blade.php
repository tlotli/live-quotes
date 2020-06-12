@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-0 mb-4">{{$bid->title}}</h4>
                    <hr>
                    <h5 class="text-muted">Requirements</h5>
                    {!! $bid->requirements !!}
                    <hr>
                    <h5 class="text-muted">Specification</h5>
                    {!! $bid->specification !!}
                    <hr>
                    <h5 class="text-muted">Targeted Sector</h5>

                        {{$bid->business_sector->name}}

                    <hr>
                    <h5 class="text-muted">Closing Date</h5>
                    <p>
                        @if($bid->closing_date == \Carbon\Carbon::today()->toDateString())
                            <span class="badge   badge-danger">Today</span>
                        @else
                            <span class="badge   badge-success">{{$bid->closing_date}}</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">

            @if($check_bid_submission->quote_count < 1)
                <div class="mb-3">
                    <a href="{{route("submit_bid" , ['id' => $bid->id])}}" class="btn btn-success btn-xl btn-block"><i
                            class="mdi mdi-timer mr-2"></i> Apply For Bid
                    </a>
                </div>
            @else
                <div class="mb-3">
                    <a href="{{route("view_submitted_bid" , ['id' => $bid->id])}}" class="btn btn-warning btn-xl btn-block"><i
                            class="mdi mdi-close-circle mr-2"></i> Bid Already Submitted
                    </a>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="media">
                        @if($bid->business_profile->photo != "")
                            <a class="" href="#">
                                <img src="{{'/storage/'.$bid->business_profile->photo}}" alt="user"
                                     class="rounded-circle thumb-lg">
                            </a>
                        @else
                            <a class="" href="#">
                                <img src="{{Avatar::create($bid->business_profile->company_name)->toBase64()}}"
                                     alt="user" class="rounded-circle thumb-lg">
                            </a>
                        @endif
                        <div class="media-body ml-3 align-self-center">
                            <a href="{{route("social_page" , ['id' => $bid->business_profile_id])}}"
                               class="font-14 mb-0"
                               style="font-weight: bold; color: #0b0b0b">{{$bid->business_profile->company_name}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6>About :</h6>
                    @if($bid->business_profile->company_profile != "")
                        <p class="text-muted font-13">{{$bid->business_profile->company_profile}}
                        </p>
                    @else
                        <p class="text-muted font-13">N/A
                        </p>
                    @endif
                    <hr>
                    <div class="button-list btn-social-icon">
                        <button type="button" class="btn btn-facebook btn-round">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-twitter btn-round ml-2">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-info btn-round  ml-2">
                            <i class="fab fa-linkedin"></i>
                        </button>

                        <button type="button" class="btn btn-pink btn-round  ml-2">
                            <i class="fab fa-dribbble"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-3">Contact</h4>
                    <ul class="list-unstyled mb-0">
                        <li class=""><i class="mdi mdi-phone mr-2 text-success font-18"></i> <b> phone </b>
                            : {{$bid->business_profile->company_telephone}}
                        </li>
                        <li class="mt-2"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i> <b>
                                Email </b> : {{$bid->business_profile->company_email}}
                        </li>
                        <li class="mt-2"><i class="mdi mdi-home-map-marker text-success font-18 mt-2 mr-2"></i>
                            <b>Address</b> : {{$bid->business_profile->company_address}}

                        </li>
                        <li class="mt-2"><i class="mdi mdi-map-marker-circle text-success font-18 mt-2 mr-2"></i>
                            <b>Province</b> : {{$bid->business_profile->company_province}}
                        </li>
                        <li class="mt-2"><i class="mdi mdi-map-marker-radius text-success font-18 mt-2 mr-2"></i>
                            <b>City</b> : {{$bid->business_profile->company_city}}
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection


