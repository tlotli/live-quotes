@extends('layouts.app_layouts.main_app')

@section('main-section')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <span class="badge badge-warning">Quotation Draft Requests</span>
                    <h3 class="font-weight-bold">{{$quotation_drafts}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <span class="badge badge-primary">Submitted For Bidding</span>
                    <h3 class="font-weight-bold">{{$quotation_submitted_for_bidding}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <span class="badge badge-danger">Expired Quotation Requests</span>
                    <h3 class="font-weight-bold">{{$expired_bids}}</h3>

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="text-muted mb-4">Quotation Requests</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Closing Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotes as $q)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$q->title}}</td>
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
                                            <span class="badge badge-primary">Submitted For Bidding</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-xs"
                                           href="{{route('update_quotation_request' , ['id' => $q->id])}}"> <i class="fas fa-edit"></i> Edit</a>
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
