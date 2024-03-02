<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public $remember_me = true;

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $authenticated = Auth::attempt($credentials, $this->remember_me);

        if ($authenticated) {
            $this->redirect('/', true);
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
