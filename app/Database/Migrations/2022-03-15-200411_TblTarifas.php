<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTarifas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTarifa'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'precio'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
            ],
            'descuento'       => [
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
        $this->forge->addKey('idTarifa', true);
        $this->forge->createTable('tbl_tarifas');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_tarifas');
    }
}