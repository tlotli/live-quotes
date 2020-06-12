<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewBids extends Component
{
    public function render()
    {
        $total_bid_value = DB::table('quote_items')
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->select(DB::raw('SUM(quote_items.quantity * quote_items.price) * 1.15 AS total_bid_value'))
            ->first();

        $total_draft_value = DB::table('quote_items')
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->where('quote_items.status', '=', 0)
            ->select(DB::raw('SUM(quote_items.quantity * quote_items.price) * 1.15 AS total_draft_value'))
            ->first();

        $total_issued_value = DB::table('quote_items')
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->where('quote_items.status', '=', 1)
            ->select(DB::raw('SUM(quote_items.quantity * quote_items.price) * 1.15 AS total_issue_value'))
            ->first();

        $total_bids = DB::table('quotation_requests')
            ->join('quote_items', 'quote_items.quotation_request_id', '=', 'quotation_requests.id')
            ->join('business_profiles', 'business_profiles.id', '=', 'quotation_requests.business_profile_id')
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->select(DB::raw('SUM(quote_items.quantity * quote_items.price) * 1.15 AS total_draft_value'), 'quotation_requests.title AS title' , 'quotation_requests.closing_date AS closing_date' ,'quote_items.status AS status' ,'business_profiles.company_name AS company_name' ,'business_profiles.photo AS photo')
            ->groupBy('quote_items.quotation_request_id')
            ->get();

//        dd($total_bids);

        return view('livewire.view-bids', compact('total_draft_value', 'total_issued_value', 'total_bid_value', 'total_bids'));
    }
}
