<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class LoginRegister extends Component
{
    public string $email = "";
    public string $password = "";
    public string $name = "";
    public bool $registerForm = false;
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
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($this->password);
        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', "You are Login successful.");
            return redirect("/");
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

        return redirect("/");
    }
}
