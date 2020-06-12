<?php

namespace App\Http\Livewire;

use App\Province;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Openbids extends Component
{
    use WithPagination;

    public $searchTerm;
    private $pagination = 1;

    public function updatingSearchTerm(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $incomplete_bids = DB::table('quotation_requests')
                           ->join('quote_items' ,'quote_items.quotation_request_id' ,'=' ,'quotation_requests.id')
                           ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
                           ->where('quote_items.status' , 0)
                           ->where('quotation_requests.closing_date', '>=', Carbon::today()->toDateString())
                           ->select(DB::raw('COUNT(DISTINCT(quote_items.quotation_request_id) )  AS quotation_count'))
                           ->first();

        $expiry_bids = DB::table('quotation_requests')
            ->join('quote_items' ,'quote_items.quotation_request_id' ,'=' ,'quotation_requests.id')
            ->where('quote_items.business_profile_id', Auth::user()->business_profile_id)
            ->where('quote_items.status' , 0)
            ->where('quotation_requests.closing_date', '=', Carbon::today()->toDateString())
            ->select(DB::raw('COUNT(DISTINCT(quote_items.quotation_request_id) )  AS quotation_count'))
            ->first();

        $quotes = \App\QuotationRequests::where('business_profile_id', '<>', Auth::user()->business_profile_id)->where('closing_date', '>=', Carbon::today()->toDateString())->orderBy('created_at', 'DESC')->where('title', 'like', $searchTerm)->paginate($this->pagination);
        return view('livewire.openbids', compact('quotes' , 'incomplete_bids' , 'expiry_bids'));
    }
}
