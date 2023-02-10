<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    use Actions;

    public $email;
    public $password;

    private function resetInputFields()
    {
        $this->email = '';
        $this->password = '';
    }

    /**
     * Reglas de validación para todos los campos del formulario
     */
    protected $rules = [

        'email'    => 'required|email',
        'password' => 'required',


    ];

    protected $messages = [

        'password.required'  => 'Campo Requerido',
        'email.required'     => 'Campo Requerido',


    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function retornaDash()
    {
        redirect()->route('foo');
    }


    public function login()
    {
        // dd(Hash::make($this->password));

        try {

            // Reglas de Validación
            $this->validate();

            $user = User::where('email', $this->email)->get();

            if (count($user) > 0) {
                if(Auth::attempt($this->validate(), false)){
                    dd('correcto');
                }else{
                    dd('incorrecto');
                }
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
