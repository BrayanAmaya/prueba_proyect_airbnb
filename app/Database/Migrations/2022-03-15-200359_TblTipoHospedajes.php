<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTipoHospedajes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTipoHospedaje'          => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'tipoHospedaje'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
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
        $this->forge->addKey('idTipoHospedaje', true);
        $this->forge->createTable('tbl_tipo_hospedajes');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_tipo_hospedajes');
    }
}