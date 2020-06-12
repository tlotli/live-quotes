<?php

namespace App\Http\Livewire;

use App\QuoteItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubmittedBid extends Component
{
    public $selectedId ;

    public function mount($id) {
        $this->selectedId = $id ;
    }


    public function render()
    {
        $quote_item_sum = DB::table('quote_items')
            ->join('business_profiles', 'business_profiles.id', '=', 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id', $this->selectedId)
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) ) AS total_price'),  'business_profiles.id AS business_profile_id')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at', 'ASC')
            ->first();

        $quote_items = QuoteItem::where('business_profile_id'  , Auth::user()->business_profile_id)
            ->where('quotation_request_id' , $this->selectedId)
            ->get();

        $business_profile = \App\BusinessProfile::find(Auth::user()->business_profile_id);


        $billed_to = DB::table('quotation_requests')
            ->join('business_profiles' ,'business_profiles.id' , '=' , 'quotation_requests.business_profile_id')
            ->where('quotation_requests.id' , $this->selectedId)
            ->select('business_profiles.*')
            ->first();

//        dd($billed_to);

        return view('livewire.submitted-bid' , compact('quote_item_sum' , 'quote_items' , 'business_profile' ,'billed_to'));
    }
}
