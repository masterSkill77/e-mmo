<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Hash;
use App\User;
use Illuminate\Support\Facades\Hash as FacadesHash;

class LoginRegister extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.login-register');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', "You are Login successful.");
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = FacadesHash::make($this->password);

        Admin::create(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);

        session()->flash('message', 'Your register successfully Go to the login page.');

        $this->resetInputFields();
    }
}
