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


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];


    public function login()
    {
        $validatedData = $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            request()->session()->regenerate();
            session()->flash('message', 'You have been successfully logged in.');
            return redirect()->to('/');
        } else {
            session()->flash('error', 'Email and password are wrong.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
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
