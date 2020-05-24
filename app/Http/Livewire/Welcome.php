<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Welcome extends Component
{
    public $email ;
    public $password ;

    public function resetInput()
    {
//        $this->email = null;
        $this->password = null;
    }

    public function updated($field) {
        $this->validateOnly($field , [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function login() {
        $this->validate([
           'email' => 'required|email',
           'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if(Auth::attempt($credentials) ) {
            return redirect(route('home'));
        }
        else {
            $this->resetInput();
            session()->flash('error', 'Email or password is invalid please check your credentials');
            return redirect()->back();
        }


    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
