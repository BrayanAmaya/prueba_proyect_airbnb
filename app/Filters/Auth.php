<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth implements FilterInterface
{
    /*Variable global*/
    protected $configs;

    /*Constructor para cargar el archivo de configuracion Airbnb*/
    public function __construct(){
        $this->configs=config('Airbnb');
    }
    
    public function before(RequestInterface $request, $arguments = null)
    {
        /*Verifica si hay una session activa*/
        if(session()->is_logged){
            /*Si hay una sesion activa carga el modelo UsuarioModel*/
            $model = model('UsuarioModel');
            /*Verifica si el usuario existe*/
            if(!$usuario=$model->buscarUsuario('idUsuario',session()->idUsuario)){
                /*Si no encuentra ningun usuario se destruye la session*/
                session()->destroy();
                /*Redirecciona a la vista login con un mensaje de usuario no disponible*/
                return redirect()->route('login')->with('msg',[
                    'type' => 'danger',
                    'body' => 'Usuario no disponible'
                ]);
            }
            /*Si encuentra un usuario va redireccionar a la vista correspondiente con su rol*/
            /*Busca el rol del usuario*/
            $model->buscarRol($usuario->idRol);
            /*Redirecciona a la vista del inicio del usuario*/
            if($model->asignarVistaRol == $this->configs->defaultRolUsuario){
                return redirect()->route('usuarioInicio');
            }
            /*Redirecciona a la vista del inicio del anfitrion*/
            if($model->asignarVistaRol == $this->configs->defaultRolAnfitrion){
                return redirect()->route('anfitrionInicio');
            }
            /*Redirecciona a la vista del inicio del admin*/
            if($model->asignarVistaRol == $this->configs->defaultRolAdmin){
                return redirect()->route('adminInicio');
            }
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}