<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class RegistroTrx extends Component
{

    use Actions;

    public $nombre;
    public $apellido;
    public $ci_rif;
    public $telefono;
    public $password;
    public $email;
    public $cargo;
    public $rol;
    public $direccion;
    public $terminos = false;



    public function cargo($value)
    {
        if ($value == '5') {
            return 'Administrador TRX';
        }
        if ($value == '6') {
            return 'Supervisor TRX';
        }
        if ($value == '7') {
            return 'Tecnico';
        }
    }

    /**
     * Reglas de validación para todos los campos del formulario
     */
    protected $rules = [

        'nombre'    => 'required',
        'apellido'  => 'required',
        'ci_rif'    => 'required',
        'telefono'  => 'required',
        'email'     => 'required|email|unique:users',
        'password'  => 'required',
        'rol'       => 'required',
        'direccion' => 'required',
        'terminos' => 'required',

    ];

    protected $messages = [

        'nombre'             => 'Campo Requerido',
        'apellido'           => 'Campo Requerido',
        'ci_rif'             => 'Campo Requerido',
        'telefono'           => 'Campo Requerido',
        'password.required'  => 'Campo Requerido',
        'email.required'     => 'Campo Requerido',
        'email.unique'       => 'El correo ya se encuentra registrado en el sistema',
        'rol'                => 'Campo Requerido',
        'direccion'          => 'Campo Requerido',
        'terminos'           => 'Debe estar de acuerdo con los terminos y condiciones',


    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    private function resetInputFields()
    {

        $this->nombre = '';
        $this->apellido = '';
        $this->ci_rif = '';
        $this->telefono = '';
        $this->password = '';
        $this->email = '';
        $this->rol = '';
        $this->direccion = '';
        $this->terminos = '';
    }


    public function store()
    {

        try {

            // Reglas de Validación
            $this->validate();

            $resgistro = new User();
            $resgistro->nombre = $this->nombre;
            $resgistro->apellido = $this->apellido;
            $resgistro->ci_rif = $this->ci_rif;
            $resgistro->telefono = $this->telefono;
            $resgistro->email = $this->email;
            $resgistro->password = Hash::make($this->password);
            $resgistro->cargo = $this->cargo($this->rol);
            $resgistro->rol = $this->rol;
            $resgistro->direccion = $this->direccion;

            if ($this->terminos != true) {

                $this->notification()->warning(
                    $title = 'Validación!',
                    $description = 'Debe aceptar los términos y condiciones'
                );

                $this->terminos = '';
            } else {
                $resgistro->save();

                $this->resetInputFields();

                $this->notification()->success(
                    $title = 'Perfil Creado!',
                    $description = 'El usuario fue registrado de forma satisfactoria'
                );
                sleep(1);
                redirect()->to('/');

            }
        } catch (\Throwable $th) {

            $this->notification()->Error(
                $title = 'Excepción!',
                $description = 'Error interno del sistema, Favor contacte al administrador'
            );
        }
    }

    public function render()
    {
        return view('livewire.auth.registro-trx');
    }
}
