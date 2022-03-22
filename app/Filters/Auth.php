<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->is_logged){
            $model = model('UsuarioModel');
            if(!$usuario=$model->buscarUsuario('idUsuario',session()->idUsuario)){
                session()->destroy();
                return redirect()->route('login')->with('msg',[
                    'type' => 'danger',
                    'body' => 'Usuario no disponible'
                ]);
            }
            $model->buscarRol($usuario->idRol);
            if($model->asignarVistaRol == 'Usuario'){
                return redirect()->route('usuarioInicio');
            }
            if($model->asignarVistaRol == 'Anfitrion'){
                return redirect()->route('anfitrionInicio');
            }
            if($model->asignarVistaRol == 'Admin'){
                return redirect()->route('adminInicio');
            }
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}