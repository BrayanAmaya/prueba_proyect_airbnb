<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSaludSeguridad extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idSaludSeguridad' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'auto_increment'   => true,
                'null' => false,
            ],
            'saludSeguridad'       => [
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
        $this->forge->addKey('idSaludSeguridad', true);
        $this->forge->createTable('tbl_salud_y_seguridad');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_salud_y_seguridad');
    }
}