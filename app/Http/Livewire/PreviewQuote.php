<?php

namespace App\Http\Livewire;

use App\QuoteItem;
use App\SubmittedQuoteTracker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PreviewQuote extends Component
{
    public $qoute_item_id;

    public function mount($id) {
        $this->qoute_item_id = $id ;
    }

    public function submit_bid() {

        $quote_items = QuoteItem::where('quotation_request_id' , $this->qoute_item_id)->where('business_profile_id' , Auth::user()->business_profile_id)->get();
//        $quote_item_count = QuoteItem::where('quotation_request_id' , $this->qoute_item_id)->where('business_profile_id' , Auth::user()->business_profile_id)->where('status' , 0)->count();
        $tracker_count = SubmittedQuoteTracker::where('quotation_request_id' , $this->qoute_item_id)->where('business_profile_id' , Auth::user()->business_profile_id)->count();

        foreach ($quote_items as $q) {
            $q->status = 1 ;
            $q->save();
        }

        if($tracker_count < 1) {
            $tracker = new SubmittedQuoteTracker();
            $tracker->quotation_request_id = $this->qoute_item_id;
            $tracker->business_profile_id =  Auth::user()->business_profile_id;
            $tracker->save();
        }

    }

    public function render()
    {
        $quote_items = QuoteItem::where('quotation_request_id' , $this->qoute_item_id)->where('business_profile_id' , Auth::user()->business_profile_id)->get();

        $quote_item_sum = DB::table('quote_items')
            ->where('quote_items.quotation_request_id', $this->qoute_item_id)
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->select(DB::raw('SUM(quote_items.price * quote_items.quantity) AS total_price'))
            ->first();

        $quote_owner = DB::table('quote_items')
            ->join('quotation_requests' ,'quotation_requests.id' ,'=' ,'quote_items.quotation_request_id')
            ->join('users' , 'users.business_profile_id' , '=' , 'quotation_requests.business_profile_id')
            ->join('business_profiles' , 'business_profiles.id' , '=' , 'users.business_profile_id')
            ->where('quote_items.quotation_request_id', $this->qoute_item_id)
            ->select('business_profiles.company_name AS company_name' , 'business_profiles.company_address AS company_address' , 'business_profiles.company_telephone AS company_telephone' , 'business_profiles.company_province AS company_province' , 'business_profiles.company_city AS company_city')
            ->first();

        $tracker_count = SubmittedQuoteTracker::where('quotation_request_id' , $this->qoute_item_id)->where('business_profile_id' , Auth::user()->business_profile_id)->count();

        return view('livewire.preview-quote', compact('quote_items', 'quote_item_sum' ,'quote_owner' ,'tracker_count'));
    }
}
