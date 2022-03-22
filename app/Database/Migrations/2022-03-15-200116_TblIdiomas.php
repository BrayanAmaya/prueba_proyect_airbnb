<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblIdiomas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idIdioma'          => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'idioma' => [
                'type' => 'VARCHAR',
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
        $this->forge->addKey('idIdioma', true);
        $this->forge->createTable('tbl_idiomas');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_idiomas');
    }
}