<?php

namespace App\Controllers\Admin;
use App\Entities\Usuario;

use App\Controllers\BaseController;

class Admin extends BaseController{
    public function index(){
        return view('admin/inicio');
    }
    public function buscar(){
        return view('admin/buscar');
    }

    public function cerrar(){
        session()->destroy();
        return redirect()->route('login');
    }
}