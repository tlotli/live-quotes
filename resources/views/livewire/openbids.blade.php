@extends('layouts.app_layouts.main_app')

@section('main-section')

    <div class="row">

        {{--        @if($updateMode == 0)--}}
        <div class="col-lg-8">
            @foreach($quotes as $q)
                <div class="card card-post-aside card-post-1 blog-card">
                    <div class="card-body">

                        <h4 class="mt-2">
                            @if($q->business_profile->photo != "")
                                <a class="user-avatar mr-2">
                                    <img src="{{'storage/'.$q->business_profile->photo}}" alt="user"
                                         class="rounded-circle thumb-md"/>
                                    {{$q->title}}
                                </a>
                            @else
                                <a class="user-avatar mr-2">
                                    <img src="{{Avatar::create($q->business_profile->company_name)->toBase64()}}"
                                         alt="user"
                                         class="rounded-circle thumb-md"/>
                                    {{$q->title}}
                                </a>
                            @endif
                        </h4>

                        <div class="meta-box">
                            <ul class="p-0 mt-2 list-inline">
                                <li class="list-inline-item">
                                    <span class="font-12 text-muted"><i class="fas far fa-building mr-2"></i>{{$q->business_profile->company_name}}</span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="font-12 text-muted"><i class="fas fa-wrench mr-2"></i>{{$q->business_sector->name}}</span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="font-12 text-muted"><i class="far fa-calendar-alt mr-2"></i>{{$q->closing_date}}</span>
                                </li>
                            </ul>
                        </div>
                        <p class="text-muted">{{$q->specification}}</p>
                        <a href="" class="float-right text-muted"><i
                                class="far fa-bookmark text-danger mr-1"></i>788</a>
                        <a href="{{route('bid_detail' , ['id' => $q->id])}}" class="btn btn-info  btn-sm">View Bid
                            <i
                                class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            @endforeach
            {!! $quotes->links() !!}
        </div>


        <div class="col-lg-4">

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title text-success">Search Bids</h4>
                    <div class="form-group ">
                        <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fas fa-search"></i></button>
                                                </span>
                            <input type="text" class="form-control" wire:model="searchTerm"
                                   placeholder="Search For Bids">
                        </div>
                    </div>
                </div>
            </div>

            <div  x-data="{Incomplete_bids_open : false}">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="far fa-calendar-alt font-18 text-success"></i>
                        </div>
                        <span class="font-12 badge badge-success">Number Of Bids In Drafts</span>
                        <h4 class="font-weight-bold text-success">{{$incomplete_bids->quotation_count}}</h4>
                        <button class="btn btn-success btn-square btn-skew waves-effect waves-light  btn-xs" @click="Incomplete_bids_open = !Incomplete_bids_open" wire:click="$emit('view_incomplete_bid')"> View Bids</button>
                    </div>
                </div>
                <livewire:view-incomplete-bid/>
            </div>

            <div  x-data="{Expiring_bids_open : false}">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="far fa-calendar-alt font-18 text-danger"></i>
                        </div>
                        <span class="font-12 badge badge-danger">Bids Expiring Today</span>
                        <h4 class="font-weight-bold text-danger">{{$expiry_bids->quotation_count}}</h4>
                        <button class="btn btn-danger btn-square btn-skew waves-effect waves-light btn-xs" @click="Expiring_bids_open = !Expiring_bids_open" wire:click="$emit('expired_bids')"> View Bids</button>
                    </div>
                </div>
                <livewire:view-expiring-bid/>
            </div>

        </div>
    </div>

@endsection
