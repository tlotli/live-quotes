@extends('layouts.app_layouts.main_app')

@section('main-section')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body invoice-head">
                    <div class="row">
                        <div class="col-md-4 align-self-center">

                            @if(\Illuminate\Support\Facades\Auth::user()->business_profile->photo == "")
                                <img
                                    src="{{Avatar::create(\Illuminate\Support\Facades\Auth::user()->business_profile->company_name)->toBase64()}}"
                                    class="thumb-xl rounded-circle">

{{--                                <span--}}
{{--                                    class="font-weight-normal">{{\Illuminate\Support\Facades\Auth::user()->business_profile->company_name}}</span>--}}
                            @else
                                <img
                                    src="{{'/storage/'.\Illuminate\Support\Facades\Auth::user()->business_profile->photo}}"
                                    class="thumb-xl rounded-circle">
{{--                                <span--}}
{{--                                    class="text-black-50">{{\Illuminate\Support\Facades\Auth::user()->business_profile->company_name}}</span>--}}
                            @endif
                            {{--                                    <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg" height="18">--}}
                        </div>
                        <div class="col-md-8">

                            <ul class="list-inline mb-0 contact-detail float-right">
                                <li class="list-inline-item">
                                    <div class="pl-3">
                                        <i class="mdi mdi-office-building text-success"></i>
                                        <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->business_profile->company_name}}</p>
                                    </div>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::user()->business_profile->website != "")
                                    <li class="list-inline-item">
                                        <div class="pl-3">
                                            <i class="mdi mdi-web text-success"></i>
                                            <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->business_profile->website}}</p>
                                        </div>
                                    </li>
                                @endif
                                <li class="list-inline-item">
                                    <div class="pl-3">
                                        <i class="mdi mdi-phone text-success"></i>
                                        <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->business_profile->company_telephone}}</p>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="pl-3">
                                        <i class="mdi mdi-map-marker text-success"></i>
                                        <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->business_profile->company_address}}, {{\Illuminate\Support\Facades\Auth::user()->business_profile->company_province}}, {{\Illuminate\Support\Facades\Auth::user()->business_profile->company_city}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{--                                <div class="col-md-3">--}}
                        {{--                                    <div class="">--}}
                        {{--                                        <h6 class="mb-0"><b>Order Date :</b> 11/09/2018</h6>--}}
                        {{--                                        <h6><b>Order ID :</b> # 23654789</h6>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        <div class="col-md-3">
                            <div class="float-left">
                                <address class="font-13">
                                    <strong class="font-14">Billed To :</strong><br>
                                    {{$quote_owner->company_name}}<br>
                                    {{$quote_owner->company_address}}<br>
                                    {{$quote_owner->company_province}}, {{$quote_owner->company_city}}<br>
                                    <abbr title="Phone">P:</abbr>  {{$quote_owner->company_telephone}}
                                </address>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Unit Price</th>
                                        {{--                                                <th>Unit Cost</th>--}}
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quote_items as $q)
                                        <tr>
                                            <th>{{$loop->index + 1}}</th>
                                            <td>{{$q->quantity}}</td>
                                            <td>{{$q->description}}</td>
                                            <td>R{{number_format($q->price , 2)}}</td>
                                            <td>R{{ number_format($q->quantity * $q->price , 2 )  }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="border-0 font-14"><b>Sub Total</b></td>
                                        <td class="border-0 font-14"><b>R{{number_format($quote_item_sum->total_price , 2)}}</b></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="border-0"></th>
                                        <td class="border-0 font-14"><b>Tax Rate</b></td>
                                        <td class="border-0 font-14"><b>15%</b></td>
                                    </tr>
                                    <tr class="bg-success text-white">
                                        <th colspan="3" class="border-0"></th>
                                        <td class="border-0 font-14"><b>Total</b></td>
                                        <td class="border-0 font-14">
                                            <b>R{{ number_format(( $quote_item_sum->total_price ) * 1.15 , 2) }}</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                            {{--                                    <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small></div>--}}
                        </div>
                        <div class="col-lg-12 col-xl-4">
                            <div class="float-right d-print-none">
{{--                                <a href="javascript:window.print()" class="btn btn-info text-light"><i--}}

                                @if($tracker_count < 1)
                                <button wire:click="submit_bid" class="btn btn-warning btn-lg text-light">Submit Bid <i class="mdi mdi-keyboard-return mr-2"></i> </button>
                                @endif
{{--                                <a href="#" class="btn btn-danger text-light">Cancel</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


