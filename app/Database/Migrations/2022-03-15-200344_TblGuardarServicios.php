<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblGuardarServicios extends Migration
{
    public function up()
    {
        //$this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'idPoliticaCancelacion' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'null' => true,
            ],
            'idReglaServicio' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'null' => true,
            ],
            'idSaludSeguridad' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'null' => true,
            ],
            'idSubServicio' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
                'null' => true,
            ],
            'idServicio' => [
                'type'             => 'INT',
                'constraint'       => 12,
                'unsigned'         => true,
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
        /*$this->forge->addForeignKey('idPoliticaCancelacion','tbl_politicas_de_cancelacion','idPoliticaCancelacion','CASCADE','SET NULL');
        $this->forge->addForeignKey('idReglaServicio','tbl_reglas_servicios','idReglaServicio','CASCADE','SET NULL');
        $this->forge->addForeignKey('idSaludSeguridad','tbl_salud_y_seguridad','idSaludSeguridad','CASCADE','SET NULL');
        $this->forge->addForeignKey('idSubServicio','tbl_sub_servicios','idSubServicio','CASCADE','SET NULL');
        $this->forge->addForeignKey('idServicio','tbl_servicios','idServicio','CASCADE','CASCADE');*/
        $this->forge->createTable('tbl_guardar_servicios');
        //$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tbl_guardar_servicios');
    }
}