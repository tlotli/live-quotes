@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="fro_profile">
                        <div class="row">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="fro_profile-main">
                                    <div class="fro_profile-main-pic">
                                        @if($business_profile->photo == "")
                                            <img src="{{Avatar::create($business_profile->company_name)->toBase64()}}"
                                                 alt=""
                                                 class="rounded-circle">
                                        @else
                                            <img src="{{'/storage/'.$business_profile->photo}}" alt=""
                                                 class="thumb-xl rounded-circle">
                                        @endif
                                    </div>
                                    <div class="fro_profile_user-detail">
                                        <h5 class="fro_user-name">{{$business_profile->company_name}}</h5>
                                        <p class="mb-0 fro_user-name-post">{{$business_profile->company_registration_number}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if($follow_count_init < 1)
                        <button type="button" class="btn btn-primary btn-xl" wire:click="follow"><i
                                class="mdi mdi-account-plus-outline mr-2"></i> Follow
                        </button>
                    @else
                        <button type="button" class="btn btn-warning btn-xl" wire:click="unfollow"><i
                                class="mdi mdi-account-minus-outline mr-2"></i> Unfollow
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body profile-nav">
                    <div class="nav flex-column nav-pills" id="profile-tab" aria-orientation="vertical">

                        @if($state == 0)
                            <a class="nav-link active" id="profile-dash-tab" data-toggle="pill" aria-selected="true"
                               wire:click="profile">Profile</a>
                            <a wire:click="active_bids"
                               class="nav-link d-flex justify-content-between align-items-center"
                               id="profile-pro-stock-tab"
                               data-toggle="pill" aria-selected="false">
                                Active Bids
                                <span class="badge badge-success">{{$quote_count}}</span>
                            </a>
                        @elseif($state == 1)
                            <a class="nav-link" id="profile-dash-tab" data-toggle="pill" aria-selected="false"
                               wire:click="profile">Profile</a>
                            <a wire:click="active_bids"
                               class="nav-link  active d-flex justify-content-between align-items-center"
                               id="profile-pro-stock-tab"
                               data-toggle="pill" aria-selected="true">
                                Active Bids
                                <span class="badge badge-success">{{$quote_count}}</span>
                            </a>
                        @endif

                        <a class="nav-link mb-0" id="profile-settings-tab" data-toggle="pill" aria-selected="false">Settings</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-3">Contact</h4>
                    <ul class="list-unstyled mb-0">
                        <li class=""><i class="mdi mdi-phone mr-2 text-success font-18"></i> <b> phone </b>
                            : {{$business_profile->company_telephone}}
                        </li>
                        <li class="mt-2"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i> <b>
                                Email </b> : {{$business_profile->company_email}}
                        </li>
                        <li class="mt-2"><i class="mdi mdi-home-map-marker text-success font-18 mt-2 mr-2"></i>
                            <b>Address</b> : {{$business_profile->company_address}}

                        </li>
                        <li class="mt-2"><i class="mdi mdi-map-marker-circle text-success font-18 mt-2 mr-2"></i>
                            <b>Province</b> : {{$business_profile->company_province}}
                        </li>
                        <li class="mt-2"><i class="mdi mdi-map-marker-radius text-success font-18 mt-2 mr-2"></i>
                            <b>City</b> : {{$business_profile->company_city}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if($state == 0)
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Company Profile</h4>
                        @if($business_profile->company_profile == "")
                            <p>N/A</p>
                        @else
                            {!! $business_profile->company_profile !!}
                        @endif
                    </div>
                </div>
            </div>
        @elseif($state == 1)
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane fade active show" id="profile-pro-stock">
                            <h4 class="mt-0 header-title mb-3">Active Bids</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr class="align-self-center">
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Closing Date</th>
                                        <th>Sector</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quotes as $q)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>
                                                {{$q->title}}
                                            </td>
                                            <td>{{$q->closing_date}}</td>
                                            <td>{{$q->business_sector->name}}</td>
                                            <td><a href="{{route('bid_detail' , ['id' => $q->id])}}"
                                                   class="btn btn-success btn-xs">View Bid</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
