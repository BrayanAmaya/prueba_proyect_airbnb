<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles=[
            [
                'rol'=>'Admin',
                'date_create'=>date('Y-m-d H:i:s')
            ],
            [
                'rol'=>'Usuario',
                'date_create'=>date('Y-m-d H:i:s')
            ],
            [
                'rol'=>'Anfitrion',
                'date_create'=>date('Y-m-d H:i:s')
            ],
        ];
        $builder = $this->db->table('tbl_roles');
        $builder->insertBatch($roles);
    }
}