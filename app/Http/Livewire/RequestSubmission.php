<?php

namespace App\Http\Livewire;

use App\Charts\SubmittedQuotation;
use App\QuoteItem;
use App\SubmittedQuoteTracker;
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
                             ->where('quote_items.status' , 1)
                             ->select( DB::raw('COUNT(DISTINCT(quote_items.quotation_request_id) )  AS number_of_submission' ) , 'quotation_requests.business_profile_id AS business_profile_id' ,'quote_items.quotation_request_id AS quotation_request_id' , 'quote_items.id AS quote_item_id' , 'quotation_requests.title AS title' , 'quotation_requests.closing_date AS closing_date' ,'quote_items.business_profile_id AS business_profile_sort')
                             ->groupBy( 'quotation_request_id' )
                             ->get();

        $quote_data = DB::table('quotation_requests')
                      ->join('submitted_quote_trackers' , 'submitted_quote_trackers.quotation_request_id' , '=' , 'quotation_requests.id')
                      ->where('quotation_requests.business_profile_id' , Auth::user()->business_profile_id)
                      ->select(DB::raw('COUNT(submitted_quote_trackers.quotation_request_id) AS bid_count') , 'quotation_requests.title AS title' )
                      ->groupBy('title')
                      ->orderBy('title', 'ASC')
                      ->get();

        $labels = $quote_data->pluck('title');
        $data = $quote_data->pluck('bid_count');

        $chart = new SubmittedQuotation();
        $chart->labels($labels);
        $chart->dataset('Quotes' , 'bar' , $data)->backgroundColor('#20c997' );

        return view('livewire.request-submission' , compact('quote_submissions', 'chart'));
    }
}
