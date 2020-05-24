<?php

namespace App\Http\Livewire;

use App\BusinessSector;
use App\Province;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quotationrequests extends Component
{

    public $title;
    public $requirements;
    public $specification;
    public $closing_date;
    public $business_profile_id;
    public $business_sector_id;
    public $status;

//    public $user_id;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'title' => 'required',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'specification' => 'required',
            'closing_date' => 'required',
            'business_sector_id' => 'required',
            'status' => 'required',
        ],
        [
            'title.required' => 'Title is required',
            'specification.required' => 'Specification is required ',
            'closing_date.required' => 'Closing date is required',
            'business_sector_id.required' => 'Please select business sector ',
            'status.required' => 'Status is required',
        ]);

        $quote = new \App\QuotationRequests();
        $quote->title = $this->title;
        $quote->requirements = $this->requirements;
        $quote->specification = $this->specification;
        $quote->closing_date = $this->closing_date;
        $quote->business_profile_id = Auth::user()->business_profile_id;
        $quote->business_sector_id = $this->business_sector_id;
        $quote->status = $this->status;
        $quote->user_id = Auth::id();
        $quote->save();

        return redirect(route('all_quotation_requests'));
    }

    public function render()
    {
        $provinces = Province::orderBy('name', 'ASC')->get();
        $business_sector = BusinessSector::orderBy('name', 'ASC')->get();
        return view('livewire.quotationrequests', compact('business_sector', 'provinces'));
    }
}
