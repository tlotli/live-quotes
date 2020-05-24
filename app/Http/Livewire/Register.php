<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'max:255',
            'email' => 'email',
            'password' => 'min:8'
        ],
            [
                'name.max' => 'Name must be 255 characters or less',
                'email.email' => 'Email not valid',
                'password.min' => 'Password must 8 characters',
            ]);
    }



    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
    }


    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        $this->resetInput();
        $this->resetValidation();
        session()->flash('message', 'Your account was registered login below');
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.register');
    }
}
