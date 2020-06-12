<div x-show="Expiring_bids_open"
     @click.away="Expiring_bids_open = false">
    <div class="modal  fade bd-example-modal-xl show" tabindex="-1" role="dialog"
         aria-labelledby="myExtraLargeModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-danger" style="background: #ffffff">
                                        <h4 class="modal-title mt-0 text-white" id="myModalLabel">Expiring Bids</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            @click="Expiring_bids_open = false">
                       <span class="text-white"> ×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-pane fade active show" id="profile-pro-stock">
                                        <h4 class="mt-0 header-title mb-3">Bids Expiring Today</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr class="align-self-center">
                                                    <th>#</th>
                                                    <th>Quote Name</th>
                                                    <th>Submitted By</th>
                                                    <th>Closing Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($quotes as $q)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>
                                                            {{$q->title}}
                                                        </td>
                                                        <td>
                                                            @if($q->business_profile->photo == "")
                                                                <a class="user-avatar mr-2" href="#">
                                                                    <img
                                                                        src="{{Avatar::create($q->business_profile->company_name)->toBase64()}}"
                                                                        alt="user"
                                                                        class="thumb-xs rounded-circle">
                                                                </a>
                                                            @else
                                                                <a class="user-avatar mr-2" href="#">
                                                                    <img
                                                                        src="{{'storage/'.$q->business_profile->photo}}"
                                                                        alt="user"
                                                                        class="thumb-xs rounded-circle">
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td>{{$q->closing_date}}</td>
                                                        <td><a href="{{route('bid_detail' , ['id' => $q->id])}}"
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

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" @click="Expiring_bids_open = false">
                        Close
                    </button>
                    {{--                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
</div>
