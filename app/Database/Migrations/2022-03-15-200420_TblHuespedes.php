<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblHuespedes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idHuesped'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'adulto'       => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => false,
            ],
            'bebes'       => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => true,
            ],
            'menores'       => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => true,
            ],
            'mascotas'       => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
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
        $this->forge->addKey('idHuesped', true);
        $this->forge->createTable('tbl_huespedes');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_huespedes');
    }
}