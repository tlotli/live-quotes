@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">

        <div class="col-lg-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class=" font-weight-bold text-danger">Value Of Submitted Bids</h5>
                    <h4 class="font-24  mt-2 mb-4">R{{ number_format($total_bid_value->total_bid_value , 2) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class=" font-weight-bold text-warning">Value Of Drafts</h5>
                    <h4 class="font-24  mt-2 mb-4 ">R{{number_format($total_draft_value->total_draft_value , 2)}}</h4>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="mb-0 font-weight-bold text-info">Bid Issued Value</h5>
                    <h4 class="font-24  mb-4 ">R{{number_format($total_issued_value->total_issue_value , 2)}}</h4>
                </div>
            </div>
        </div>


        {{--        <div class="col-lg-4">--}}
        {{--            <div class="card card-inverse bg-info">--}}
        {{--                <div class="card-body row justify-content-center">--}}
        {{--                    <div class="col align-self-center">--}}
        {{--                        <h3 class="text-white">R{{ number_format($total_bid_value->total_bid_value , 2) }}</h3>--}}
        {{--                        <h5 class="mt-0 text-white font-weight-normal">All</h5>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-lg-4">--}}
        {{--            <div class="card card-inverse bg-warning">--}}
        {{--                <div class="card-body row justify-content-center">--}}
        {{--                    <div class="col align-self-center">--}}
        {{--                        <h3 class="text-white">R{{number_format($total_draft_value->total_draft_value , 2)}}</h3>--}}
        {{--                        <h5 class="mt-0 text-white font-weight-normal">Drafts</h5>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-lg-4">--}}
        {{--            <div class="card card-inverse bg-success">--}}
        {{--                <div class="card-body row justify-content-center">--}}
        {{--                    <div class="col align-self-center">--}}
        {{--                        <h3 class="text-white">R{{number_format($total_issued_value->total_issue_value , 2)}}</h3>--}}
        {{--                        <h5 class="mt-0 text-white font-weight-normal">Issued</h5>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}


    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="text-muted mb-4">Quotation Requests</h4>

                    <div class="table-responsive">
                        <table class="table  mb-0 table-centered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Bid Name</th>
                                <th>Bid Price</th>
                                <th>Client</th>

                                <th>Closing Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($total_bids as $q)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$q->title}}</td>
                                    <td>R{{number_format($q->total_draft_value , 2)}}</td>
                                    <td>

                                        @if($q->photo == "")
                                            <a class="user-avatar mr-2" href="#">
                                                <img src="{{Avatar::create($q->company_name)->toBase64()}}" alt="user"
                                                     class="thumb-xs rounded-circle">
                                            </a>
                                        @else
                                            <a class="user-avatar mr-2" href="#">
                                                <img src="{{'storage/'.$q->photo}}" alt="user"
                                                     class="thumb-xs rounded-circle">
                                            </a>
                                        @endif
                                        {{$q->company_name}}
                                    </td>
                                    <td>
                                        @if($q->closing_date >= \Carbon\Carbon::today()->toDateString())
                                            <span class="badge badge-success">{{$q->closing_date}}</span>
                                        @else
                                            <span class="badge badge-danger">{{$q->closing_date}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($q->status == 0)
                                            <span class="badge badge-warning">Draft</span>
                                        @else
                                            <span class="badge badge-primary">Submitted</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if($q->status == 0 && $q->closing_date >= \Carbon\Carbon::today()->toDateString())
                                            <a href="" class="btn btn-warning btn-xs">Complete Bid</a>
                                        @elseif($q->status == 0 && $q->closing_date < \Carbon\Carbon::today()->toDateString())
                                            <a href="" class="btn btn-danger btn-xs">Bid Never Submitted</a>
                                        @else
                                            <a href="" class="btn btn-success btn-xs">View Submitted Bid</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


