<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class departamentosSeeder extends Seeder
{
    public function run()
    {
        $departamentos=[
            [
                'departamento'=>'Ahuachapán',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Cabañas',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Chalatenango',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Cuscatlán',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'La Libertad',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'La Paz',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'La Unión',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Morazán',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1 
            ],
            [
                'departamento'=>'San Miguel',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'San Salvador',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'San Vicente',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Santa Ana',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Sonsonate',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
            [
                'departamento'=>'Usulután',
                'date_create'=>date('Y-m-d H:i:s'),
                'idPais'=> 1
            ],
        ];
        $builder = $this->db->table('tbl_departamentos');
        $builder->insertBatch($departamentos);
    }
}