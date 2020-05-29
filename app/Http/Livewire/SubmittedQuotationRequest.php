<?php

namespace App\Http\Livewire;

use App\QuoteItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubmittedQuotationRequest extends Component
{
    public $quotation_request_id;
    public $updateMode = 0;
    public $highest_bid_submitted;
    public $lowest_bid_submitted;
    public $filtered_bid_submitted;
    public $min;
    public $max;

    public function mount($id)
    {
        $this->quotation_request_id = $id;
    }

    public function resetInput() {
        $this->min = "";
        $this->max = "";
    }

    public function remove_filter() {
        $this->resetInput();
        $this->updateMode = 0 ;
    }

    public function filter_bids() {

        $this->validate([
           'min' => 'required|numeric',
           'max' => 'required|numeric',
        ],[
            'min.required' => 'Please provide minimum value',
            'min.numeric' => 'Value must be a valid number',
            'max.numeric' => 'Value must be a valid number',
            'max.required' => 'Please provide maximum value',
        ]);

        $submitted_bids = DB::table('quote_items')
            ->join('business_profiles', 'business_profiles.id', '=', 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id', '=', $this->quotation_request_id)
            ->where('quote_items.status', 1)
            ->having(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15)'), '>=' , $this->min)
            ->having(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15)'), '<=' , $this->max)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15) AS total_price'), 'business_profiles.company_name AS company_name', 'business_profiles.photo AS photo', 'business_profiles.id AS business_profile_id')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at', 'ASC')
            ->get();

        $this->filtered_bid_submitted = $submitted_bids->toArray() ;
        $this->resetInput();
        $this->updateMode = 3;
    }

    public function highest()
    {
        $submitted_bids = DB::table('quote_items')
            ->join('business_profiles', 'business_profiles.id', '=', 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id', '=', $this->quotation_request_id)
            ->where('quote_items.status', 1)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15) AS total_price'), 'business_profiles.company_name AS company_name', 'business_profiles.photo AS photo', 'quote_items.quotation_request_id AS quotation_request_id', 'business_profiles.id AS business_profile_id')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at', 'ASC')
            ->get();

        $this->highest_bid_submitted = $submitted_bids->toArray();
        $this->resetInput();
        $this->updateMode = 1;
    }

    public function lowest()
    {
        $submitted_bids = DB::table('quote_items')
            ->join('business_profiles', 'business_profiles.id', '=', 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id', '=', $this->quotation_request_id)
            ->where('quote_items.status', 1)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15) AS total_price'), 'business_profiles.company_name AS company_name', 'business_profiles.photo AS photo', 'business_profiles.id AS business_profile_id' , 'quote_items.quotation_request_id AS quotation_request_id')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at', 'DESC')
            ->get();

        $this->lowest_bid_submitted = $submitted_bids->toArray();
        $this->resetInput();
        $this->updateMode = 2;
    }

    public function render()
    {
        $submitted_bids = DB::table('quote_items')
            ->join('business_profiles', 'business_profiles.id', '=', 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id', '=', $this->quotation_request_id)
            ->where('quote_items.status', 1)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15) AS total_price'), 'business_profiles.company_name AS company_name', 'business_profiles.id AS business_profile_id' , 'business_profiles.photo AS photo' , 'quote_items.quotation_request_id AS quotation_request_id')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at', 'DESC')
            ->get();
//        $this->resetInput();

        $quotation_request_id = $this->quotation_request_id;

        $max_bid = DB::select("SELECT MAX(highest_bid) AS highest_bid FROM
 										(SELECT SUM((quote_items.price * quote_items.quantity ) * 1.15) AS highest_bid
 										FROM quote_items WHERE quote_items.quotation_request_id = '$this->quotation_request_id'
 										AND quote_items.status = 1
 										GROUP BY quote_items.business_profile_id ) AS highest_value
				");

        $average_bid = DB::select("SELECT AVG(average_bid) AS average_bid FROM
 										(SELECT SUM((quote_items.price * quote_items.quantity ) * 1.15) AS average_bid
 										FROM quote_items WHERE quote_items.quotation_request_id = '$this->quotation_request_id'
 										AND quote_items.status = 1
 										GROUP BY quote_items.business_profile_id ) AS average_value
				");

        $min_bid = DB::select("SELECT MIN(min_bid) AS min_bid FROM
 										(SELECT SUM((quote_items.price * quote_items.quantity ) * 1.15) AS min_bid
 										FROM quote_items WHERE quote_items.quotation_request_id = '$this->quotation_request_id'
 										AND quote_items.status = 1
 										GROUP BY quote_items.business_profile_id ) AS min_value
				");

        return view('livewire.submitted-quotation-request', compact('max_bid', 'average_bid', 'min_bid', 'submitted_bids', 'quotation_request_id'));
    }
}
