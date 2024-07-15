<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Auth;
class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $role;
    public $registerForm = false;

    // public function mount()
    // {
    //     dd('Component is mounted');
    // }

    public function login(){

    }

    public function create(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        try{
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = bcrypt($this->password);
            $user->role = $this->role;
            $user->save();

            $credentials = [
                'email' => $this->email,
                'password' => $this->password,
            ];
            Auth::attempt($credentials);

            session()->flash('message','New Record Created Successfully');
            return redirect("/");
        }catch(\Exception $e){
            session()->flash('error', 'error to create new rocord'.$e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.register')->layout('registerlayout');
    }
}
