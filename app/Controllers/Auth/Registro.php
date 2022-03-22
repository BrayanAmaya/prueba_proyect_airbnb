<?php

namespace App\Controllers\Auth;
use App\Entities\Usuario;

use App\Controllers\BaseController;

class Registro extends BaseController{

    protected $configs;

    public function __construct(){
        $this->configs=config('Airbnb');
    }

    public function index(){
        return view('auth/registro');
    }

    public function registrar(){
        $validar = service('validation');

        $validar->setRules([
            'nombre'=>'required|alpha_space',
            'apellido'=>'required|alpha_space',
            'email'=>'required|valid_email|is_unique[tbl_usuarios.email]',
            'numeroTelefono'=>'required|numeric|is_unique[tbl_usuarios.numeroTelefono]',
            'password'=>'required|matches[c-password]'
        ],
        [
            'nombre' => [
                    'required' => 'Digite un nombre',
                    'alpha_space' => 'Caracteres no permitidos'
            ],
            'apellido' => [
                'required' => 'Digite un apellido',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'email' => [
                'required' => 'Digite un correo',
                'valid_email' => 'Correo no valido',
                'is_unique' => 'Este correo ya existe'
            ],
            'numeroTelefono' => [
                'required' => 'Digite un número de telefono',
                'numeric' => 'Solo digite numeros',
                'is_unique' => 'Este número de telefono ya existe'
            ],
            'password' => [
                'required' => 'Digite su contraseña',
                'matches' => 'Las contraseñas no coinciden'
            ],
        ]
    );

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }

        $usuario = new Usuario($this->request->getPost());
        $usuario->generarUsername();
        
        $model=model('UsuarioModel');
        $model->agregarUnRol($this->configs->defaultRolUsuario);
        //$model->agregarUnDosRol($this->configs->defaultRolUsuario);

        $model->save($usuario);

        return redirect()->route('login')->with('msg',[
            'type'=>'success',
            'body'=>'Usuario registrado correctamente'
        ]);
    }

    public function vistaRegistrarAnfitrion(){
        $model = model('IdiomasModel');
        return view ('auth/registroAnfitrion',[
            'idiomas' => $model->findAll()
        ]);
    }

    public function registrarAnfitrion(){
        $validar = service('validation');

        $validar->setRules([
            'nombre'=>'required|alpha_space',
            'apellido'=>'required|alpha_space',
            'email'=>'required|valid_email|is_unique[tbl_usuarios.email]',
            'numeroTelefono'=>'required|numeric|is_unique[tbl_usuarios.numeroTelefono]',
            'password'=>'required|matches[c-password]',
            'descripcion'=>'required|alpha_space',
            'cuentaBanco'=>'required|numeric',
            'banco'=>'required|alpha_space',
            'idiomaPrimario'=>'required|is_not_unique[tbl_idiomas.idioma]',
        ],
        [
            'nombre' => [
                    'required' => 'Digite un nombre',
                    'alpha_space' => 'Caracteres no permitidos'
            ],
            'apellido' => [
                'required' => 'Digite un apellido',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'email' => [
                'required' => 'Digite un correo',
                'valid_email' => 'Correo no valido',
                'is_unique' => 'Este correo ya existe'
            ],
            'numeroTelefono' => [
                'required' => 'Digite un número de telefono',
                'numeric' => 'Solo digite numeros',
                'is_unique' => 'Este número de telefono ya existe'
            ],
            'password' => [
                'required' => 'Digite su contraseña',
                'matches' => 'Las contraseñas no coinciden'
            ],
            'descripcion' => [
                'required' => 'Digite una descipcion',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'cuentaBanco' => [
                'required' => 'Digite una cuenta de banco',
                'numeric' => 'Solo numeros'
            ],
            'banco' => [
                'required' => 'Digite un banco',
                'alpha_space' => 'Caracteres no permitidos'
            ],
            'idiomaPrimario' => [
                'required' => 'Seleccione un idioma',
                'is_not_unique' => 'Idioma no disponible'
            ],
        ]);

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }


    }
}