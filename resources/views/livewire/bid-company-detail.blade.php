<div x-show="open"
     @click.away="open = false">
    <div class="modal fade bd-example-modal-xl show" tabindex="-1" role="dialog"
         aria-labelledby="myExtraLargeModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background: #ffffff">
                    <h4 class="modal-title mt-0" id="myModalLabel">{{$company_name}} - Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="open = false">
                        ×
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <div class="fro_profile">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3 mb-lg-0">
                                                <div class="fro_profile-main">
                                                    <div class="fro_profile-main-pic">
                                                        @if($photo == "")
                                                            <img
                                                                src="{{Avatar::create($company_name)->toBase64()}}"
                                                                alt=""
                                                                class="rounded-circle">
                                                        @else
                                                            <img src="{{'/storage/'.$photo}}" alt=""
                                                                 class="thumb-xl rounded-circle">
                                                        @endif
                                                    </div>
                                                    <div class="fro_profile_user-detail">
                                                        <h5 class="fro_user-name">{{$company_name}}</h5>
                                                        {{--                                                        <p class="mb-0 fro_user-name-post">{{$company_registration_number}}</p>--}}
                                                        <span class="font-13 text-muted mr-2"> <i
                                                                class="mdi mdi-phone text-success"></i> : {{$company_telephone}}</span>
                                                        <span class="font-13 text-muted"> <i
                                                                class="mdi mdi-email-outline text-success"></i> : {{$company_email}}</span>
                                                        <span class="font-13 text-muted"> <i
                                                                class="mdi mdi-home-map-marker text-success"></i> : {{$company_address}}</span>
                                                        <span class="font-13 text-muted"> <i
                                                                class="mdi mdi-map-marker-circle text-success"></i> : {{$company_province}}</span>
                                                        <span class="font-13 text-muted"> <i
                                                                class="mdi mdi-map-marker-radius text-success"></i> : {{$company_city}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="card-body">--}}
{{--                                    <button wire:click="navigate" class="btn btn-primary btn-lg">--}}
{{--                                        <i class="mdi mdi-account-plus-outline mr-2"></i>--}}
{{--                                        View Profile - {{$business_id}}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-pane fade active show" id="profile-pro-stock">
                                        <h4 class="mt-0 header-title mb-3">Previous Bids</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr class="align-self-center">
                                                    <th>#</th>
                                                    <th>Quote Name</th>
                                                    <th>Bid Amount</th>
                                                    {{--                                                            <th>Sector</th>--}}
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($quote_history as $q)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>
                                                            {{$q->bid_title}}
                                                        </td>
                                                        {{--  <td>{{$q->closing_date}}</td>--}}
                                                        <td>R{{ number_format($q->total_bid_price , 2) }}</td>
                                                        <td><a href="{{route('quotation_detail' , ['id' => $q->id,
                                                                                                     'business_profile_id' =>  $business_id
                                                                                                    ])}}"
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
                    </div>

                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-12">--}}
                    {{--                            <div class="card">--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <span class="font-14 text-muted">{!! $company_profile !!}</span>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect" @click="open = false">Close</button>
                    {{--                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
</div>
