<?php

namespace App\Controllers\Anfitrion;
use App\Entities\Usuario;

use App\Controllers\BaseController;

class Anfitrion extends BaseController{
    public function index(){
        return view('anfitrion/inicio');
    }
    public function buscar(){
        return view('anfitrion/buscar');
    }

    public function cerrar(){
        session()->destroy();
        return redirect()->route('login');
    }
}