<?php

namespace App\Controllers\Usuario;
use App\Entities\Usuario;
use App\Entities\Anfitrion;

use App\Controllers\BaseController;

class Usuarios extends BaseController{

    protected $configs;

    public function __construct(){
        $this->configs=config('Airbnb');
    }
    
    public function index(){
        return view('usuario/inicio');
    }

    public function hazteAnfitrion(){
        $model = model('IdiomasModel');
        return view('usuario/hazteAnfitrion',[
            'idiomas' => $model->findAll()
        ]);
    }

    public function cerrar(){
        session()->destroy();
        return redirect()->route('login');
    }

    public function registrarAnfitrion(){
        $validar = service('validation');

        $validar->setRules([
            'descripcion'=>'required|alpha_space',
            'cuentaBanco'=>'required|numeric',
            'banco'=>'required|alpha_space',
            'idiomaPrimario'=>'required|is_not_unique[tbl_idiomas.idioma]',
        ],
        [
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
        ]
    );

        if(!$validar->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validar->getErrors());
        }

        $anfitrion = new Anfitrion($this->request->getPost());
        
        $model=model('AnfitrionesModel');
        $modelUsuario=model('UsuarioModel');

        $model->agregarIdiomaPrimario($this->request->getPost('idiomaPrimario'));
        $model->agregarIdiomaSecundario($this->request->getPost('idiomaSecundario'));
        $model->agregarIdiomaExtra($this->request->getPost('idiomaExtra'));

        $modelUsuario->agregarCambiarRol($this->configs->defaultRolAnfitrion);

        $data=[
            'idUsuario' => session('idUsuario'),
            'idRol' => $modelUsuario->asignarCambiarRol,
            'idRol2' => $modelUsuario->asignarCambiarRol
        ];
        $modelUsuario->save($data);
        
        $model->agregarElUsuario(session('email'));
        
        $model->save($anfitrion);

        $modelUsuario->buscarRol($modelUsuario->asignarCambiarRol);

        session()->set([
            'idRol' => $modelUsuario->asignarCambiarRol,
            'rol' => $modelUsuario->asignarVistaRol,
            'rol2' => $modelUsuario->asignarVistaDosRol
        ]);

        return redirect()->route('anfitrionInicio')->with('msg',[
            'type'=>'success',
            'body'=>'Ya eres anfitrión'
        ]);
    }
}