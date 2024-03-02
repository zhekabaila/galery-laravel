<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $confirm_password = '';

    public function register()
    {
        $this->validate([
            'username' => 'required|string|unique:users,username|min:6|max:225',
            'email' => 'required|string|email|unique:users,email|max:225',
            'password' => 'required|min:5|max:225',
            'confirm_password' => 'required|same:password|max:225',
        ]);

        $registered = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        if ($registered) {
            $this->redirect('/login', true);
        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}
