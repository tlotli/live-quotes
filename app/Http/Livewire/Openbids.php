<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Openbids extends Component
{
    use WithPagination;

    public function render()
    {
        $quotes = \App\QuotationRequests::where('business_profile_id' , '<>' , Auth::user()->business_profile_id)->where('closing_date'  , '>=' , Carbon::today()->toDateString())->paginate(1);
        return view('livewire.openbids' , compact('quotes'));
    }
}
