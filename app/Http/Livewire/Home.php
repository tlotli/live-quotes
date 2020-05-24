<?php

namespace App\Http\Livewire;

use App\BusinessProfile;
use App\BusinessSector;
use App\Province;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{

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
    public $business_sector_id;
    public $company_profile;
    public $website;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];


    public function handleFileUpload($photoData)
    {
        $this->photo = $photoData;
    }

    public function resetInput()
    {
        $this->company_name = "";
        $this->company_address = "";
        $this->company_telephone = "";
        $this->company_email = "";
        $this->company_fax = "";
        $this->company_province = "";
        $this->company_city = "";
        $this->company_registration_number = "";
        $this->photo = "";
        $this->tax_number = "";
        $this->business_sector_id = "";
        $this->company_profile = "";
        $this->website = "";
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'company_name' => 'required',
            'company_registration_number' => 'unique:business_profiles',
            'company_address' => 'unique:business_profiles',
            'tax_number' => 'unique:business_profiles',
//            'company_province' => 'required',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'company_name' => 'required|unique:business_profiles',
            'company_registration_number' => 'required|unique:business_profiles',
            'company_address' => 'required|unique:business_profiles',
            'company_province' => 'required',
            'tax_number' => 'unique:business_profiles',
            'company_city' => 'required',
            'company_telephone' => 'required|unique:business_profiles',
            'company_email' => 'required|unique:business_profiles',
            'business_sector_id' => 'required',
//            'company_province' => 'required',
        ],
            [
                'company_name.required' => 'Company name is required',
                'company_registration_number.required' => 'Company registration number is required',
                'company_address.required' => 'Company address is required',
                'company_province.required' => 'Province is required',
                'company_city.required' => 'City is required',
                'company_email.required' => 'Company email is required',
                'company_telephone.required' => 'Company telephone is required',
                'business_sector_id.required' => 'Business sector is required',
                'company_registration_number.unique' => 'Company registration number is taken',
            ]);

        $photo = $this->storeImage();
        $business_profile = new BusinessProfile();
        $business_profile->company_name = $this->company_name;
        $business_profile->company_registration_number = $this->company_registration_number;
        $business_profile->company_province = $this->company_province;
        $business_profile->company_email = $this->company_email;
        $business_profile->company_city = $this->company_city;
        $business_profile->company_profile = $this->company_profile;
        $business_profile->company_telephone = $this->company_telephone;
        $business_profile->business_sector_id = $this->business_sector_id;
        $business_profile->company_registration_number = $this->company_registration_number;
        $business_profile->company_address = $this->company_address;
        $business_profile->company_fax = $this->company_fax;
        $business_profile->tax_number = $this->tax_number;
        $business_profile->photo = $photo;
        $business_profile->user_id = Auth::id();
        $business_profile->website = $this->website;
        $business_profile->save();
//        session()->flash('message' , 'Business Profile Saved!');
        $user = User::find(Auth::id());
        $user->business_profile_id = $business_profile->id;
        $user->save();

        return redirect(route('home'));

    }

    public function storeImage()
    {
        if (!$this->photo) {
            return null;
        }
    }

    public function render()
    {
        $provinces = Province::orderBy('name', 'ASC')->get();
        $business_sector = BusinessSector::orderBy('name', 'ASC')->get();
        return view('livewire.home', compact('provinces', 'business_sector'));
    }
}
