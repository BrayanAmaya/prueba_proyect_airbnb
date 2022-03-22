<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblReglasServicios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idReglaServicio' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'auto_increment'   => true,
                'null' => false,
            ],
            'reglaServicio'       => [
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
        $this->forge->addKey('idReglaServicio', true);
        $this->forge->createTable('tbl_reglas_servicios');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_reglas_servicios');
    }
}