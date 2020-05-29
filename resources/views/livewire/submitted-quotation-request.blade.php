@extends('layouts.app_layouts.main_app')

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

    <div class="row mt-4">

{{--        <div class="col-lg-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="mt-0 header-title">Filter Bids</h4>--}}
{{--                    <form wire:submit.prevent="filter_bids">--}}
{{--                        <div class="form-group ">--}}
{{--                            <input type="text" class="form-control  @error('min') border-danger @enderror" name="min" value="{{old('min')}}" placeholder="Min"--}}
{{--                                   wire:model.lazy="min">--}}
{{--                            <div--}}
{{--                                class="form-control-feedback text-danger">@error('min') {{$message}} @enderror</div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <input type="text" class="form-control   @error('max') border-danger @enderror" placeholder="Max" value="{{old('max')}}" name="max"--}}
{{--                                   wire:model.lazy="max">--}}
{{--                            <div--}}
{{--                                class="form-control-feedback text-danger">@error('max') {{$message}} @enderror</div>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary btn-block btn-square waves-effect waves-light"><i--}}
{{--                                class="mdi mdi-filter mr-2"></i>Filter--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        @if($updateMode == 0 )
            <div class="col-lg-12">
                <div class="mb-1">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        {{--                        <button type="button" class="btn btn-light" wire:click="$emit('filterByHighestBid' , {{$quotation_request_id}})"><i--}}
                        {{--                                class="mdi mdi-arrow-up-thick"></i> Highest--}}
                        {{--                        </button>--}}

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
                            <h5 class="my-1">{{$s->company_name}}</h5>
                            <p class="text-muted mb-2">Mobile App</p>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    {{--                            <ul class="list-inline mb-0">--}}
                                    {{--                                <li class="list-item d-inline-block mr-2">--}}
                                    {{--                                    <a class="" href="#">--}}
                                    {{--                                        <i class="mdi mdi-format-list-bulleted text-muted"></i>--}}
                                    {{--                                        <span class="text-muted font-weight-bold">0/5</span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li class="list-item d-inline-block">--}}
                                    {{--                                    <a class="" href="#">--}}
                                    {{--                                        <i class="mdi mdi-comment-outline text-muted"></i>--}}
                                    {{--                                        <span class="text-muted font-weight-bold">3</span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                            </ul>--}}
                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id ,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-sm ">View Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
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
                            <h5 class="my-1">{{$s->company_name}}</h5>
                            <p class="text-muted mb-2">Mobile App</p>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id ,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-sm">View Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
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
                            <h5 class="my-1">{{$s->company_name}}</h5>
                            <p class="text-muted mb-2">Mobile App</p>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{route('quotation_detail' ,['id' => $s->quotation_request_id ,
                                                                          'business_profile_id' => $s->business_profile_id
                                                                         ])}}" class="btn btn-success btn-sm "  >View Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
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
                        {{--                        <button type="button" class="btn btn-success"  wire:click="lowest"><i class="mdi mdi-arrow-down-thick"></i> Lowest--}}
                        {{--                        </button>--}}
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
                                                                         ])}}" class="btn btn-success btn-sm ">View Quote <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection


