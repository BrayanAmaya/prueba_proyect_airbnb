<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSubServicios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idSubServicio' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'auto_increment'   => true,
                'null' => false,
            ],
            'subServicio'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'date_create' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'date_update' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idSubServicio', true);
        $this->forge->createTable('tbl_sub_servicios');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_sub_servicios');
    }
}