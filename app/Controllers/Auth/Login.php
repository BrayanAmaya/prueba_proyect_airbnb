<?php

namespace App\Controllers\Auth;
use App\Entities\Usuario;

use App\Controllers\BaseController;

class Login extends BaseController{
    public function index(){
        return view ('auth/login');
    }

    public function signin(){
        
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
            return redirect()->back()->with('errors',$this->validator->getErrors())->withInput();
        }

        $email = trim($this->request->getVar('email'));
        $password = trim($this->request->getVar('password'));

        $model = model('UsuarioModel');

        if(!$usuario = $model->buscarUsuario('email', $email)){
            return redirect()
                    ->back()
                    ->with('msg',[
                        'type'=>'danger',
                        'body'=>'Este usuario no esta registrado']);
        }

        if(!password_verify($password,$usuario->password)){
            return redirect()
                    ->back()
                    ->with('msg',[
                        'type'=>'danger',
                        'body'=>'Credenciales invalidas']);
        }

        $model->buscarRol($usuario->idRol);
        //$model->buscarDosRol($usuario->idRol);

        session()->set([
            'idUsuario' => $usuario->idUsuario,
            'username' => $usuario->username,
            'idRol' => $usuario->idRol,
            'rol'=>$model->asignarVistaRol,
            'email' =>$usuario->email,
            'rol2'=>$model->asignarVistaDosRol,
            'is_logged' => true
        ]);

        if($model->asignarVistaRol == 'Usuario'){
            return redirect()->route('usuarioInicio')->with('msg',[
                'type'=>'success',
                'body'=>'Bienvenido '.$usuario->username]);
        }

        if($model->asignarVistaRol == 'Anfitrion'){
            return redirect()->route('anfitrionInicio')->with('msg',[
                'type'=>'success',
                'body'=>'Bienvenido '.$usuario->username]);
        }

        if($model->asignarVistaRol == 'Admin'){
            return redirect()->route('adminInicio')->with('msg',[
                'type'=>'success',
                'body'=>'Bienvenido '.$usuario->username]);
        }
    }
}