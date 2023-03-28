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

    public function dashTecnicos()
    {
        redirect()->to('/dash-tecnicos');
    }

    public function retornaDash()
    {
        redirect()->to('/dashboard-admin');
    }

    public function registrate()
    {
        redirect()->to('/registro-index');
    }

    public function completarRegistroBanco()
    {
        redirect()->to('/completar-registro-banco');
    }

    public function recuperar_pass()
    {
        redirect()->to('/recuperar-password');
    }


    public function login()
    {

        try {

            // Reglas de Validación
            $this->validate();

            $user = User::where('email', $this->email)->get();

            if (count($user) > 0) {
                foreach ($user as $item) {
                    $password = $item->password;
                }

                if (Hash::check($this->password, $password)) {
                    $credenciales = [
                        'email' => $this->email,
                        'password' => $this->password,
                    ];

                    Auth::attempt($credenciales);
                    $user = Auth::user();

                    if ($user->status_registro == '1') {
                        if ($user->rol == '7' || $user->rol == '8') {
                            $this->dashTecnicos();
                        }

                        if ($user->rol == '6' || $user->rol == '5' || $user->rol == '4' || $user->rol == '3' || $user->rol == '2' || $user->rol == '1') {
                            $this->retornaDash();
                        }

                        if ($user->rol == '200') {
                            $this->completarRegistroBanco();
                        }

                        if ($user->rol == '400') {
                            $this->notification()->success(
                                $title = 'ERROR!',
                                $description = 'El correo administrador@checkmas.com fue DESACTIVADO'
                            );
                        }
                    }else{
                        $this->notification()->success(
                            $title = 'NOTIFICACIÓN!',
                            $description = 'El usuario esta en ESPERA DE APROBACIÓN!'
                        );
                        $this->reset();
                    }
                    
                    
                } else {
                    $this->password = '';
                    $this->notification()->success(
                        $title = 'ERROR!',
                        $description = 'Password incorrecto'
                    );
                }
            } else {

                $this->email = '';
                $this->notification()->success(
                    $title = 'ERROR!',
                    $description = 'El email no registrado'
                );
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
