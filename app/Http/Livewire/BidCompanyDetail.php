<?php

namespace App\Http\Livewire;

use App\Follow;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BidCompanyDetail extends Component
{
    public $business_profile;
    public $company_name;
    public $company_address;
    public $company_telephone;
    public $company_email;
    public $company_fax;
    public $company_province;
    public $company_city;
    public $company_registration_number;
    public $photo;
    public $tax_number;
    public $company_profile;
    public $business_profile_id;
    public $quote_history =[] ;
    public $business_id;
    public $state;


    protected $listeners = ['view_company_info'];

    public function view_company_info($id) {
        $business_profile = \App\BusinessProfile::find($id);
        $this->business_profile_id = $business_profile->id ;
        $this->company_name = $business_profile->company_name ;
        $this->company_address = $business_profile->company_address ;
        $this->company_telephone = $business_profile->company_telephone ;
        $this->company_email = $business_profile->company_email ;
        $this->company_fax = $business_profile->company_fax ;
        $this->company_province = $business_profile->company_province ;
        $this->company_city = $business_profile->company_city ;
        $this->company_registration_number = $business_profile->company_registration_number ;
        $this->photo = $business_profile->photo ;
        $this->tax_number = $business_profile->tax_number ;
        $this->company_profile = $business_profile->company_profile ;
//        $this->business_profile_id = $business_profile->business_profile_id ;

        $quote = \Illuminate\Support\Facades\DB::table('quotation_requests')
            ->join('quote_items' , 'quote_items.quotation_request_id' , '=' , 'quotation_requests.id')
            ->where('quote_items.business_profile_id' , $id)
            ->where('quote_items.status' , 1)
            ->select(\Illuminate\Support\Facades\DB::raw('SUM( quote_items.quantity * quote_items.price) * 1.15 AS total_bid_price') , 'quotation_requests.title AS bid_title'  , 'quotation_requests.id AS id')
            ->groupBy('quote_items.quotation_request_id' , 'quote_items.business_profile_id')
            ->get();

        $this->business_id = $id ;
        $this->quote_history = $quote->toArray();

//        dd($this->business_id);
    }

    public function navigate() {
        return redirect(route("social_page" , ['id' => $this->business_id]));
    }

    public function render()
    {
        return view('livewire.bid-company-detail' , compact('company_info' ));
    }
}
