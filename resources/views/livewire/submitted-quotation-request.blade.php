@extends('layouts.app_layouts.main_app')

@section('custom-scripts')
    <script src="{{asset("assets/plugins/chartjs/chart.min.js")}}"></script>
@endsection

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-body track-report bg-white">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon-info">
                            <i class="mdi mdi-currency-usd bg-soft-success"></i>
                        </div>

                        @foreach($max_bid as $m)
                            <h4>
                                {{ number_format($m->highest_bid , 2) }}
                            </h4>
                        @endforeach
                        <p class="mb-0 font-13 text-muted">Highest Bid</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-info">
                            <i class="mdi mdi-currency-usd bg-soft-warning"></i>
                        </div>

                        @foreach($average_bid as $m)
                            <h4>
                                {{number_format($m->average_bid ,2)}}
                            </h4>
                        @endforeach
                        <p class="mb-0 font-13 text-muted">Average Bid</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-info">
                            <i class="mdi mdi-currency-usd bg-soft-pink"></i>
                        </div>

                        @foreach($min_bid as $m)
                            <h4>
                                {{ number_format($m->min_bid , 2)}}
                            </h4>
                        @endforeach
                        <p class="mb-0 font-13 text-muted">Lowest Bid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4" x-data="{open : false}">
        @if($updateMode == 0 )
            <div class="col-lg-12">
                <div class="mb-1">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light" wire:click="highest"><i
                                class="mdi mdi-arrow-up-thick"></i> Highest
                        </button>
                        <button type="button" class="btn btn-light" wire:click="lowest"><i
                                class="mdi mdi-arrow-down-thick"></i> Lowest
                        </button>
                    </div>
                </div>
                @foreach($submitted_bids as $s)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block float-right">
                                <h4 class="text-success text-bold"><span
                                        class="badge badge-success"> R{{ number_format($s->total_price , 2) }}</span>
                                </h4>
                            </div>
                            <a class="user-avatar mr-2" href="#">
                                @if($s->photo != "")
                                    <img src="{{asset("/storage/" .$s->photo)}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @else
                                    <img src="{{Avatar::create($s->company_name)->toBase64()}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @endif
                            </a>
                            <h5 class="my-1" @click="open = !open"
                                wire:click="$emit('view_company_info' , {{$s->business_profile_id}})">{{$s->company_name}}</h5>

                            @foreach($average_bid as $m)
                                @if($s->total_price < $m->average_bid )
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-success"><i
                                                class="mdi mdi-trending-down"></i> R{{ number_format( ($m->average_bid - $s->total_price) , 2)   }} </span>
                                        Below average price</p>
                                @elseif($s->total_price > $m->average_bid )
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-danger"><i
                                                class="mdi mdi-trending-up"></i> R{{ number_format( ($s->total_price - $m->average_bid  ) , 2)   }} </span>
                                        Above average price</p>
                                @else
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-primary"><i
                                                class="mdi mdi-trending-up"></i> R{{ number_format( ($s->total_price - $m->average_bid  ) , 2)   }} </span>
                                        Same as average price</p>
                                @endif
                            @endforeach

                            <div class="row justify-content-center">
                                <div class="col-12">

                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id ,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-xs ">View
                                        Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>

                                    <button class="btn btn-primary btn-xs " @click="open = !open"
                                            wire:click="$emit('view_company_info' , {{$s->business_profile_id}})">
                                        Previous Quotes <i
                                            class="fas fa-gavel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif($updateMode == 1)
            <div class="col-lg-12">
                <div class="mb-1">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" wire:click="highest"><i
                                class="mdi mdi-arrow-up-thick"></i> Highest
                        </button>
                        <button type="button" class="btn btn-light" wire:click="lowest"><i
                                class="mdi mdi-arrow-down-thick"></i> Lowest
                        </button>
                    </div>
                </div>
                @foreach($highest_bid_submitted as $s)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block float-right">
                                <h4 class="text-success text-bold"><span
                                        class="badge badge-success"> R{{ number_format($s->total_price , 2) }}</span>
                                </h4>
                            </div>
                            <a class="user-avatar mr-2" href="#">
                                @if($s->photo != "")
                                    <img src="{{asset("/storage/" .$s->photo)}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @else
                                    <img src="{{Avatar::create($s->company_name)->toBase64()}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @endif
                            </a>
                            <h5 class="my-1" @click="open = !open"
                                wire:click="$emit('view_company_info' , {{$s->business_profile_id}})">{{$s->company_name}}</h5>

                            @foreach($average_bid as $m)
                                @if($s->total_price < $m->average_bid )
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-success"><i
                                                class="mdi mdi-trending-down"></i> R{{ number_format( ($m->average_bid - $s->total_price) , 2)   }} </span>
                                        Below average price</p>
                                @elseif($s->total_price > $m->average_bid )
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-danger"><i
                                                class="mdi mdi-trending-up"></i> R{{ number_format( ($s->total_price - $m->average_bid  ) , 2)   }} </span>
                                        Above average price</p>
                                @else
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-primary"><i
                                                class="mdi mdi-trending-up"></i> R{{ number_format( ($s->total_price - $m->average_bid  ) , 2)   }} </span>
                                        Same as average price</p>
                                @endif
                            @endforeach

                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id ,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-xs">View Quote
                                        <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                    <button class="btn btn-primary btn-xs " @click="open = !open"
                                            wire:click="$emit('view_company_info' , {{$s->business_profile_id}})">
                                        Previous Quotes <i
                                            class="fas fa-gavel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif($updateMode == 2)
            <div class="col-lg-12">
                <div class="mb-1">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light" wire:click="highest"><i
                                class="mdi mdi-arrow-up-thick"></i> Highest
                        </button>
                        <button type="button" class="btn btn-success" wire:click="lowest"><i
                                class="mdi mdi-arrow-down-thick"></i> Lowest
                        </button>
                    </div>
                </div>
                @foreach($lowest_bid_submitted as $s)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block float-right">
                                <h4 class="text-success text-bold"><span
                                        class="badge badge-success"> R{{ number_format($s->total_price , 2) }}</span>
                                </h4>
                            </div>
                            <a class="user-avatar mr-2" href="#">
                                @if($s->photo != "")
                                    <img src="{{asset("/storage/" .$s->photo)}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @else
                                    <img src="{{Avatar::create($s->company_name)->toBase64()}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @endif
                            </a>
                            <h5 class="my-1" @click="open = !open"
                                wire:click="$emit('view_company_info' , {{$s->business_profile_id}})">{{$s->company_name}}</h5>

                            @foreach($average_bid as $m)
                                @if($s->total_price < $m->average_bid )
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-success"><i
                                                class="mdi mdi-trending-down"></i> R{{ number_format( ($m->average_bid - $s->total_price) , 2)   }} </span>
                                        Below average price</p>
                                @elseif($s->total_price > $m->average_bid )
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-danger"><i
                                                class="mdi mdi-trending-up"></i> R{{ number_format( ($s->total_price - $m->average_bid  ) , 2)   }} </span>
                                        Above average price</p>
                                @else
                                    <p class="mb-2 mt-2 text-muted text-truncate text-capitalize"><span
                                            class="text-primary"><i
                                                class="mdi mdi-trending-up"></i> R{{ number_format( ($s->total_price - $m->average_bid  ) , 2)   }} </span>
                                        Same as average price</p>
                                @endif
                            @endforeach

                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id ,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-xs ">View
                                        Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                    <button class="btn btn-primary btn-xs " @click="open = !open"
                                            wire:click="$emit('view_company_info' , {{$s->business_profile_id}})">
                                        Previous Quotes <i
                                            class="fas fa-gavel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif($updateMode == 3)
            <div class="col-lg-12">

                <div class="mb-1">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light" wire:click="remove_filter"> Remove Filter <i
                                class="mdi mdi-alpha-x-circle"></i>
                        </button>
                    </div>
                </div>
                @foreach($filtered_bid_submitted as $s)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block float-right">
                                <h4 class="text-success text-bold"><span
                                        class="badge badge-success"> R{{ number_format($s->total_price , 2) }}</span>
                                </h4>
                            </div>
                            <a class="user-avatar mr-2" href="#">
                                @if($s->photo != "")
                                    <img src="{{asset("/storage/" .$s->photo)}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @else
                                    <img src="{{Avatar::create($s->company_name)->toBase64()}}" alt="user"
                                         class="thumb-md rounded-circle">
                                @endif
                            </a>
                            <h5 class="my-1">{{$s->company_name}}</h5>
                            <p class="text-muted mb-2">Mobile App</p>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-sm ">View
                                        Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <livewire:bid-company-detail/>
    </div>

@endsection


