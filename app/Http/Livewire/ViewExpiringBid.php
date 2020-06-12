<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewExpiringBid extends Component
{
    protected $listeners = ['expired_bids'];
    public $quotes = [];

    public function expired_bids() {
        $expiring_bids = \App\QuotationRequests::where('status' , 1)->where('closing_date', '=', Carbon::today()->toDateString())->limit(10)->get();
        $this->quotes = $expiring_bids->toArray();
    }

    public function render()
    {
        return view('livewire.view-expiring-bid');
    }
}
