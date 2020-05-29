<div class="col-lg-9">
    <div class="mb-1">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-light" wire:click="highest"><i
                    class="mdi mdi-arrow-up-thick"></i> Highest
            </button>
            <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-down-thick"></i> Lowest
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
                        <button type="button" class="btn btn-success btn-xs ">View Quote <i
                                class="mdi mdi-arrow-right-bold-outline"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
