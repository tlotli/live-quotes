<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestSubmission extends Component
{
    public function render()
    {
        $quote_submissions = DB::table('quotation_requests')
                             ->join('quote_items' , 'quotation_requests.id' , '=' , 'quote_items.quotation_request_id')
                             ->where('quotation_requests.business_profile_id' , Auth::user()->business_profile_id)
                             ->select( DB::raw('COUNT(DISTINCT(quote_items.quotation_request_id) ) AS number_of_submission' ) , 'quotation_requests.business_profile_id AS business_profile_id' ,'quote_items.quotation_request_id AS quotation_request_id' , 'quote_items.id AS quote_item_id' , 'quotation_requests.title AS title' , 'quotation_requests.closing_date AS closing_date')
                             ->groupBy('business_profile_id' , 'quotation_request_id' )
                             ->get();

        return view('livewire.request-submission' , compact('quote_submissions'));
    }
}
