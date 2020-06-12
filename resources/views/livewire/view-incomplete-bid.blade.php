<div x-show="Incomplete_bids_open"
     @click.away="Incomplete_bids_open = false">
    <div class="modal fade bd-example-modal-xl show" tabindex="-1" role="dialog"
         aria-labelledby="myExtraLargeModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success" style="background: #ffffff">
                    <h4 class="modal-title mt-0 text-white" id="myModalLabel">Incomplete Bids</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="Incomplete_bids_open = false">
                       <span class="text-white"> ×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-pane fade active show" id="profile-pro-stock">
                                        <h4 class="mt-0 header-title mb-3"></h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr class="align-self-center bg-success">
                                                    <th class="text-white">#</th>
                                                    <th class="text-white">Quote Name</th>
                                                    <th class="text-white">Closing Date</th>
                                                    <th class="text-white">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($quotes as $q)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>
                                                            {{$q->title}}
                                                        </td>
                                                          <td>{{$q->closing_date}}</td>
                                                        <td><a href="{{route('submit_bid' , ['id' => $q->id])}}"
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
                    <button type="button" class="btn btn-success waves-effect" @click="Incomplete_bids_open = false">Close</button>
                    {{--                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
</div>
