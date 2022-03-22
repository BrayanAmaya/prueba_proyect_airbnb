<?php
namespace App\Entities;

use CodeIgniter\Entity;

class Usuario extends Entity{
    protected $dates = ['date_create','date_update'];
    
    protected function setPassword(string $password){
        $this->attributes['password'] = password_hash($password,PASSWORD_DEFAULT);
    }

    public function generarUsername(){
        $this->attributes['username'] = explode(" ",$this->nombre)[0] . " " . explode(" ",$this->apellido)[0];
    }

    public function buscarRole(){
        $model = model('RolesModel');
        return $model->where('idRol', $this->idRol)->first();
    }
}