<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class Roles implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        /*Verifica que hay una session activa*/
        if(!session()->is_logged){
            /*Si no hay una session lo redirecciona a la vista login con un mensaje de iniciar sesion primero*/
            return redirect()->route('login')->with('msg',[
                'type' => 'warning',
                'body' => 'Debes iniciar sesión primero',
            ]);
        }

        /*Si hay una session activa carga el modelo UsuarioModel*/
        $model = model('UsuarioModel');
        /*Busca un usuario*/
        if(!$usuario=$model->buscarUsuario('idUsuario',session()->idUsuario)){
            /*Si no encuentra ningun usuario se destruye la session*/
            session()->destroy();
            /*Redirecciona a la vista login con un mensaje de usuario no disponible*/
            return redirect()->route('login')->with('msg',[
                'type' => 'danger',
                'body' => 'Usuario no disponible'
            ]);
        }

        /*Si encuentra un usuario busca ese rol del usuario*/
        $model->buscarRol($usuario->idRol);
        /*Filtra el rol del usuario para que solo ese tipo de rol pueda navegar en las direcciones correspondientes*/
        if(!in_array($model->asignarVistaRol,$arguments)){
            /*Si no esta dentro del rol correspondiente le tira un error 404*/
            throw PageNotFoundException::forPageNotFound();
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}