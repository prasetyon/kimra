<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{

    public $old_password, $new_password, $re_password;

    public function render()
    {
        return view('livewire.reset-password');
    }

    private function resetInputFields()
    {
        $this->reset([
            'old_password', 'new_password', 're_password'
        ]);
    }

    public function store()
    {
        $messages = [
            '*.required' => 'This column is required',
            '*.numeric' => 'This column is required to be filled in with number',
            '*.string' => 'This column is required to be filled in with letters',
        ];

        $this->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            're_password' => 'required|string',
        ], $messages);

        $auth = Auth::user();

        if ($auth && Hash::check($this->old_password, $auth->password)) {
            $auth = User::where('username', '=', $auth->username)->update(['password' => bcrypt($this->new_password)]);

            $this->alert('success', 'Password berhasil diperbarui');
        } else if (!Hash::check($this->old_password, $auth->password)) {
            $this->alert('warning', 'Password saat ini salah');
        }

        // Reset input fields for next input
        $this->resetInputFields();
    }
}
