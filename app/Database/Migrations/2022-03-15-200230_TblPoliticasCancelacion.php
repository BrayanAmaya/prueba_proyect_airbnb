<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPoliticasCancelacion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPoliticaCancelacion' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'auto_increment'   => true,
                'null' => false,
            ],
            'politicaCancelacion'       => [
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
        $this->forge->addKey('idPoliticaCancelacion', true);
        $this->forge->createTable('tbl_politicas_de_cancelacion');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_politicas_de_cancelacion');
    }
}