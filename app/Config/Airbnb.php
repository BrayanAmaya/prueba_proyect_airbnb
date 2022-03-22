<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Airbnb extends BaseConfig{
    /*Variables de configuracion para los diferentes roles*/
    public $defaultRolUsuario = 'Usuario';
    public $defaultRolAnfitrion = 'Anfitrion';
    public $defaultRolAdmin = 'Admin';
}