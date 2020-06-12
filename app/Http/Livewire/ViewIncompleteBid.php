<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewIncompleteBid extends Component
{
    protected $listeners = ['view_incomplete_bid'];

    public $quotes = [];

    public function view_incomplete_bid() {

        $incomplete_bids = DB::table('quotation_requests')
            ->join('quote_items' ,'quote_items.quotation_request_id' ,'=' ,'quotation_requests.id')
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->where('quote_items.status' , 0)
            ->where('quotation_requests.closing_date', '>=', Carbon::today()->toDateString())
            ->select('quotation_requests.*')
            ->groupBy('quotation_requests.id')
            ->get();

        $this->quotes = $incomplete_bids->toArray();

    }

    public function render()
    {
        return view('livewire.view-incomplete-bid');
    }
}
