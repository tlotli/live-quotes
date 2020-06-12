<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BidDetail extends Component
{
    public $selectedId ;
    public $photo ;

    public function mount($id) {
        $this->selectedId = $id ;
    }

    public function render()
    {
        $check_bid_submission = DB::table('quote_items')
                                ->join('quotation_requests' , 'quotation_requests.id' , '=' , 'quote_items.quotation_request_id')
                                ->where('quote_items.quotation_request_id' , $this->selectedId)
                                ->where('quote_items.status' , 1)
                                ->where('quote_items.business_profile_id' , Auth::user()->business_profile_id)
                                ->select(DB::raw('COUNT(quote_items.quotation_request_id) AS quote_count'))
                                ->first();

//        dd($check_bid_submission);

        $bid = \App\QuotationRequests::find($this->selectedId);

        return view('livewire.bid-detail', compact('bid' ,'check_bid_submission'));
    }
}
