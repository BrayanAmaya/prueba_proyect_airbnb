<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPaises extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPais'          => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'pais'       => [
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
        $this->forge->addKey('idPais', true);
        $this->forge->createTable('tbl_paises');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_paises');
    }
}