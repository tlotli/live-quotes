@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">
        {{--        <div class="col-lg-12">--}}
        {{--            <div class="card-body track-report">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-lg-4">--}}
        {{--                        <div class="icon-info">--}}
        {{--                            <i class="mdi mdi-currency-usd bg-soft-success"></i>--}}
        {{--                        </div>--}}
        {{--                        <h3>1845</h3>--}}
        {{--                        <p class="mb-0 font-13 text-muted">Highest Bid</p>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-4">--}}
        {{--                        <div class="icon-info">--}}
        {{--                            <i class="mdi mdi-currency-usd bg-soft-warning"></i>--}}
        {{--                        </div>--}}
        {{--                        <h3>1545</h3>--}}
        {{--                        <p class="mb-0 font-13 text-muted">Average Bid</p>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-4">--}}
        {{--                        <div class="icon-info">--}}
        {{--                            <i class="mdi mdi-currency-usd bg-soft-pink"></i>--}}
        {{--                        </div>--}}
        {{--                        <h3>300</h3>--}}
        {{--                        <p class="mb-0 font-13 text-muted">Lowest Bid</p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="text-muted mb-4">Request Quotation Submissions</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Closing Date</th>
                                <th>Number of Submitted Bids</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quote_submissions as $q)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$q->title}}</td>
                                    <td>{{$q->closing_date}}</td>
                                    <td><span class="badge badge-success">{{$q->number_of_submission}}</span></td>
                                    <td>
                                        <a href="{{route('submitted_quotation_request' , ['id' => $q->quotation_request_id])}}">View bids</a>
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


