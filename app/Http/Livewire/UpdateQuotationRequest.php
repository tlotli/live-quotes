<?php

namespace App\Http\Livewire;

use App\BusinessSector;
use App\Province;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateQuotationRequest extends Component
{

    public $title;
    public $requirements;
    public $closing_date;
    public $specification;
    public $business_profile_id;
    public $business_sector_id;
    public $status;
    public $quote_id ;
//    public $business_sector_id;


    public function mount($id) {
        $quote = \App\QuotationRequests::find($id);
        $this->title = $quote->title;
        $this->requirements = $quote->requirements;
        $this->closing_date = $quote->closing_date;
        $this->specification = $quote->specification;
        $this->business_profile_id = $quote->business_profile_id;
        $this->business_sector_id = $quote->business_sector_id;
        $this->status = $quote->status;
        $this->quote_id = $quote->id;
    }

    public function updated($field) {
        $this->validateOnly($field , [
            'title' => 'required',
        ]);
    }

    public function submit() {

        $this->validate([
            'title' => 'required',
            'specification' => 'required',
            'closing_date' => 'required',
            'business_sector_id' => 'required',
            'status' => 'required',
        ], [
            'title.required' => 'Title is required',
            'specification.required' => 'Specification is required ',
            'closing_date.required' => 'Closing date is required',
            'business_sector_id.required' => 'Please select business sector ',
            'status.required' => 'Status is required',
        ]);

        $quote =  \App\QuotationRequests::find($this->quote_id);
        $quote->title = $this->title;
        $quote->requirements = $this->requirements;
        $quote->specification = $this->specification;
        $quote->closing_date = $this->closing_date;
//        $quote->business_profile_id = Auth::user()->business_profile_id;
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
        return view('livewire.update-quotation-request', compact('business_sector' ,'provinces'));
    }
}
