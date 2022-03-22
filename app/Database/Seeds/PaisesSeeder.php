<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaisesSeeder extends Seeder
{
    public function run()
    {
        $paises=[
            [
                'pais'=>'El Salvador',
                'date_create'=>date('Y-m-d H:i:s')
            ],
        ];
        $builder = $this->db->table('tbl_paises');
        $builder->insertBatch($paises);
    }
}