<?php

namespace App\Http\Livewire;

use App\Follow;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SocialPage extends Component
{
    public $selectedId;
    public $state = 0;
    public $quotes;
    public $followCount;

    public function mount($id)
    {
        $this->selectedId = $id;
        $this->followCount = Follow::where('follower', Auth::user()->business_profile_id)
            ->where('followee', $this->selectedId)
            ->count();
    }

    public function updatedfollowCount()
    {
        $this->followCount = Follow::where('follower', Auth::user()->business_profile_id)
            ->where('followee', $this->selectedId)
            ->count();
    }

    public function follow()
    {
        $follow = new Follow();
        $follow->follower = Auth::user()->business_profile_id;
        $follow->followee = $this->selectedId;
        $follow->save();
    }

    public function unfollow()
    {
        Follow::where('follower', Auth::user()->business_profile_id)
            ->where('followee', $this->selectedId)
            ->delete();
    }

    public function profile()
    {
        $this->state = 0;
    }

    public function active_bids()
    {
        $this->state = 1;
        $this->quotes = \App\QuotationRequests::where('business_profile_id', $this->selectedId)
            ->where('status', 1)
            ->where('closing_date', '>=', Carbon::today()->toDateString())
            ->get();
    }

    public function render()
    {
        $follow_count_init = Follow::where('follower', Auth::user()->business_profile_id)
            ->where('followee', $this->selectedId)
            ->count();

        $quote_count = \App\QuotationRequests::where('business_profile_id', $this->selectedId)
            ->where('status', 1)
            ->where('closing_date', '>=', Carbon::today()->toDateString())
            ->count();
        $business_profile = \App\BusinessProfile::find($this->selectedId);
        return view('livewire.social_page.social-page', compact('business_profile', 'quote_count', 'follow_count_init'));
    }

}
