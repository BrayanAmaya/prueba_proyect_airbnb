<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPagos extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'idPago'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'fechaEntrada'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'fechaSalida'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'total'       => [
                'type'       => 'INT',
                'constraint' => 12,
                'unsigned'     => true,
                'null' => false,
            ],
            'encargadoReserva'       => [
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
            'idServicio'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('idPago', true);
        $this->forge->addForeignKey('idServicio','tbl_servicios','idServicio','CASCADE','CASCADE');
        $this->forge->createTable('tbl_pagos');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pagos');
    }
}