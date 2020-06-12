@extends('layouts.app_layouts.main_app')

@section('custom-scripts')

@endsection

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! $chart->container() !!}
            </div>
        </div>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quote_submissions as $q)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$q->title}}</td>
                                    <td>
                                        <a href="{{route('submitted_quotation_request' , ['id' => $q->quotation_request_id])}}"
                                           class="btn btn-xs btn-success waves-effect waves-light">View
                                            Bids <i class="fas fa-long-arrow-alt-right"></i></a>
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
    {!! $chart->script() !!}
@endsection


