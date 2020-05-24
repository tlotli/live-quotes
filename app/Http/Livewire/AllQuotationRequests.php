<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllQuotationRequests extends Component
{
    public function render()
    {
//        $dt = Carbon::now();
//        dd(Carbon::today()->toDateString());
        $quotation_drafts = \App\QuotationRequests::where('business_profile_id' , Auth::user()->business_profile_id)->where('status' , 0)->count();
        $quotation_submitted_for_bidding = \App\QuotationRequests::where('business_profile_id' , Auth::user()->business_profile_id)->where('status' , 1)->count();
        $expired_bids = \App\QuotationRequests::where('business_profile_id' , Auth::user()->business_profile_id)->where('closing_date' , '<' , Carbon::today()->toDateString())->count();
        $quotes = \App\QuotationRequests::where('business_profile_id' , Auth::user()->business_profile_id)->orderBy('created_at' , 'ASC')->get();
        return view('livewire.all-quotation-requests', compact('quotes' , 'quotation_drafts' , 'quotation_submitted_for_bidding' ,'expired_bids'));
    }
}
