<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class OpenBidDrafts extends Component
{
    use WithPagination;

    public function render()
    {
        $quotes = DB::table('quotation_requests')
                  ->join('quote_items' , 'quote_items.quotation_request_id' , '=' , 'quotation_requests.id')
                  ->join('business_profiles' , 'business_profiles.id' , '=' ,'quotation_requests.business_profile_id')
                  ->join('business_sectors' ,'business_sectors.id' , '=' ,'business_profiles.business_sector_id')
                  ->where('quote_items.status' , '=' , 0)
                  ->where('quotation_requests.business_profile_id' , '<>' , Auth::user()->business_profile_id)
                  ->where('quotation_requests.closing_date'  , '>=' , Carbon::today()->toDateString())
                  ->where('quote_items.business_profile_id' , Auth::user()->business_profile_id)
                  ->select('quotation_requests.*' , 'business_profiles.photo AS photo' , 'business_profiles.company_name AS company_name' , 'business_sectors.name AS name')
                  ->paginate(1);

//        dd($quotes);
        return view('livewire.open-bid-drafts' , compact('quotes'));
    }
}
