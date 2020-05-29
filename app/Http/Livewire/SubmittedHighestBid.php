<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubmittedHighestBid extends Component
{
    public $quotation_request_id;
    public $updateMode = 1 ;

    public $listeners = ['filterByHighestBid'];

    public function filterByHighestBid($id) {
        $this->quotation_request_id = $id ;
        dd("yesssssssssssssss");
    }

    public function render()
    {
        $submitted_bids = DB::table('quote_items')
            ->join('business_profiles' , 'business_profiles.id' , '=' , 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id' , '=', $this->quotation_request_id)
            ->where('quote_items.status' , 1)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) * 1.15) AS total_price') , 'business_profiles.company_name AS company_name' , 'business_profiles.photo AS photo')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at' , 'DESC')
            ->get();

        return view('livewire.submitted-highest-bid' , compact('submitted_bids'));
    }
}
