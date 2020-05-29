<?php

namespace App\Http\Livewire;

use App\QuoteItem;
use App\BusinessProfile;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class QuoteDetail extends Component
{
    public $selectedId;
    public $quote_owner_id;

    public function mount($id, $business_profile_id)
    {
        $this->selectedId = $id;
        $this->quote_owner_id = $business_profile_id;

    }


    public function render()
    {
        $quote_item_sum = DB::table('quote_items')
            ->join('business_profiles', 'business_profiles.id', '=', 'quote_items.business_profile_id')
            ->where('quote_items.quotation_request_id', $this->selectedId)
            ->where('quote_items.business_profile_id', $this->quote_owner_id)
            ->select(DB::raw('SUM( (quote_items.price * quote_items.quantity) ) AS total_price'),  'business_profiles.id AS business_profile_id')
            ->groupBy('quote_items.business_profile_id')
            ->orderBy('quote_items.created_at', 'ASC')
            ->first();

        $quote_items = QuoteItem::where('business_profile_id'  , $this->quote_owner_id)
                                  ->where('quotation_request_id' , $this->selectedId)
                                  ->get();

        $business_profile = \App\BusinessProfile::find($this->quote_owner_id);

        return view('livewire.quote-detail' , compact('quote_items' , 'business_profile' ,'quote_item_sum'));
    }
}
