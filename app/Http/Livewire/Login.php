<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Hash;
use App\Models\User;

class Login extends Component
{

    public $name;
    public $email;
    public $password;
    public $role;
    public $registerForm = false;


    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', "You have been successfully login.");
                return \redirect('/');
        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function toggleRegisterForm()
    {
        $this->registerForm = !$this->registerForm;
        $this->resetInputFields();
    }

    public function registerStore(){
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
    $this->resetInputFields();
}

    public function render()
    {

        return view('livewire.login');
    }
}
