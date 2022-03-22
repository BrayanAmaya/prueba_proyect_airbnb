<?php

namespace App\Controllers\Auth;
use App\Entities\Usuario;

use App\Controllers\BaseController;

class Login extends BaseController{
    /*Variable global*/
    protected $configs;

    /*Constructor para cargar el archivo de configuracion Airbnb*/
    public function __construct(){
        $this->configs=config('Airbnb');
    }

/*--Funcin para vista de iniciar sesion-----------------------------------------------------------------*/
    public function index(){
        /*Muestra la vista de registro*/
        return view ('auth/login');
    }
/*-------------------------------------------------------------------------------------------------------*/


/*--Funcin para iniciar sesion---------------------------------------------------------------------------*/
    public function signin(){
        /*Valida las diferentes reglas para los campos requeridos para iniciar sesion*/
        if(!$this->validate([
            'email'=>'required|valid_email',
            'password'=>'required'
        ],[
            'email' => [
                'required' => 'Digite un correo',
                'valid_email' => 'Correo no valido'
            ],
            'password' => [
                'required' => 'Digite una contraseña'
            ],
        ])){
            /*Si alguna regla falla vuelve a la vista y muestra el error*/
            return redirect()->back()->with('errors',$this->validator->getErrors())->withInput();
        }

        /*Si ninguna regla falla obtiene los datos para poder iniciar sesion*/
        $email = trim($this->request->getVar('email'));
        $password = trim($this->request->getVar('password'));

        /*Se carga el modelo UsuarioModel*/
        $model = model('UsuarioModel');

        /*Busca si existe un usuario con ese email ingresado*/
        if(!$usuario = $model->buscarUsuario('email', $email)){
            /*Si no existe un usuario regresa a la vista y muestra el error*/
            return redirect()
                    ->back()
                    ->with('msg',[
                        'type'=>'danger',
                        'body'=>'Este usuario no esta registrado']);
        }
        
        /*Si existe un usuario, compara la contraseña ingresada con la del usuario*/
        if(!password_verify($password,$usuario->password)){
            /*Si las contraseñas no son iguales regresa a la vista y muestra el error*/
            return redirect()
                    ->back()
                    ->with('msg',[
                        'type'=>'danger',
                        'body'=>'Credenciales invalidas']);
        }

        /*Si el usuario es correcto y la contraseña, busca los roles correspondiente al usuario*/
        $model->buscarRol($usuario->idRol);
        $model->buscarRolDos($usuario->idRol2);

        /*Carga las diferentes propiedades del usuario en session*/
        session()->set([
            'idUsuario' => $usuario->idUsuario,
            'username' => $usuario->username,
            'idRol' => $usuario->idRol,
            'rol'=>$model->asignarVistaRol,
            'email' =>$usuario->email,
            'rol2'=>$model->asignarVistaDosRol,
            'is_logged' => true
        ]);

        /*Redireccion a la vista correspondiente al rol del usuario*/

        /*Redirecciona al inicio del rol usuario*/
        if($model->asignarVistaRol == $this->configs->defaultRolUsuario){
            return redirect()->route('usuarioInicio')->with('msg',[
                'type'=>'success',
                'body'=>'Bienvenido '.$usuario->username]);
        }

        /*Redirecciona al inicio del rol anfitrion*/
        if($model->asignarVistaRol == $this->configs->defaultRolAnfitrion){
            return redirect()->route('anfitrionInicio')->with('msg',[
                'type'=>'success',
                'body'=>'Bienvenido '.$usuario->username]);
        }

        /*Redirecciona al inicio del rol admin*/
        if($model->asignarVistaRol == $this->configs->defaultRolAdmin){
            return redirect()->route('adminInicio')->with('msg',[
                'type'=>'success',
                'body'=>'Bienvenido '.$usuario->username]);
        }
    }
/*-------------------------------------------------------------------------------------------------------*/
}