<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BidDetail extends Component
{
    public $selectedId ;
    public $photo ;

    public function mount($id) {
        $this->selectedId = $id ;
    }

    public function render()
    {
        $bid = \App\QuotationRequests::find($this->selectedId);
        return view('livewire.bid-detail', compact('bid'));
    }
}
