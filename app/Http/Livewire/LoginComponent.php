<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $username;
    public $password;
    public $route;

    public function mount($route)
    {
        $this->route = $route ?? 'landing';
    }

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            $user = Auth::user();

            if (in_array($user->role, ['superuser', 'admin'])) return redirect()->to('backoffice/dashboard');
            else return redirect()->to($this->route);
        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
        }
    }

    public function render()
    {
        return view('livewire.login-component');
    }
}
