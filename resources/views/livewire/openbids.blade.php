@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">
        <div class="col-lg-9">
            @foreach($quotes as $q)
                <div class="card card-post-aside card-post-1 blog-card">
                    <div class="card-body">

                        @if($q->business_profile->photo != "")
                            <a class="user-avatar mr-2" href="#">
                                <img src="{{'storage/'.$q->business_profile->photo}}" alt="user"
                                     class="thumb-md rounded"/>
                            </a>
                        @else
                            <a class="user-avatar mr-2" href="#">
                                <img src="{{Avatar::create($q->business_profile->company_name)->toBase64()}}" alt="user"
                                     class="thumb-md rounded"/>
                            </a>
                        @endif

                        <h4 class="mt-2">
                            <a href="">{{$q->title}}</a>
                        </h4>
                        <div class="meta-box">
                            <ul class="p-0 mt-2 list-inline">
                                <li class="list-inline-item">Submitted By : <span
                                        class="badge badge-boxed  badge-soft-success"> {{$q->business_profile->company_name}}</span>
                                </li>
                                <li class="list-inline-item">Industry : <span
                                        class="badge badge-boxed  badge-soft-primary">{{$q->business_sector->name}}</span>
                                </li>
                                <li class="list-inline-item">Closing Date : <span
                                        class="badge badge-boxed  badge-soft-danger">{{$q->closing_date}}</span></li>
                            </ul>
                        </div>
                        <p class="text-muted">{{$q->specification}}</p>
                        <a href="" class="float-right text-muted"><i
                                class="far fa-bookmark text-danger mr-1"></i>788</a>
{{--                        <a href="{{route('bid_detail' , ['id' => $q->id])}}" class="text-primary">View detail <i--}}
{{--                                class="fas fa-long-arrow-alt-right"></i></a>--}}
                            <a href="{{route('bid_detail' , ['id' => $q->id])}}" class="btn btn-info btn-sm">View detail   <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            @endforeach
                {{$quotes->links()}}
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Filter Bids</h4>
                    <form action="">
                        <div class="form-group">
                            <select class="custom-select">
                                <option selected="">Select Province</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="custom-select">
                                <option selected="">Select Industry</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-block btn-square waves-effect waves-light"><i
                                class="mdi mdi-filter mr-2"></i>Filter
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-9">
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <nav aria-label="pagination custom-pagination">--}}
{{--                        <ul class="pagination justify-content-center">--}}
{{--                            {{$quotes->links()}}--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
                </div>
            </div>
{{--        </div>--}}

{{--    </div>--}}

@endsection
