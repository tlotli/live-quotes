<?php

namespace App\Http\Livewire;

use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ContactList extends Component
{
    public function render()
    {
        $companies = DB::table('business_profiles')
                     ->leftJoin('follows' , 'follows.follower' , 'business_profiles.user_id')
                     ->where('business_profiles.user_id' , '<>' , Auth::user()->id)
                     ->select('business_profiles.*' , 'follows.follower AS follower' ,  'follows.followee AS followee')
                     ->get();

//        dd($companies);

        $follows = Follow::where('follower' , Auth::user()->business_profile_id)->get();

//        dd($follows);

        return view('livewire.contact-list', compact('companies' , 'follows'));
    }
}
