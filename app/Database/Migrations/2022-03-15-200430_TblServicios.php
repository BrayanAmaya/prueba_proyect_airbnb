<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblServicios extends Migration
{
    public function up()
    {
        //$this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'idServicio'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'nombre'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
            ],
            'foto'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
            ],
            'descripcion'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
            ],
            'disponibilidad'       => [
                'type'       => 'INT',
                'constraint' => 12,
                'null' => false,
            ],
            'direccion'       => [
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
            'date_delete' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'idAnfitrion'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => false,
            ],
            'idTipoHospedaje'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => true,
            ],
            'idTarifa'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => true,
            ],
            'idMunicipio'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => true,
            ],
            'idHuesped'          => [
                'type'         => 'INT',
                'constraint'   => 12,
                'unsigned'     => true,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idServicio', true);
        /*$this->forge->addForeignKey('idAnfitrion','tbl_anfitriones','idAnfitrion','CASCADE','CASCADE');
        $this->forge->addForeignKey('idTipoHospedaje','tbl_tipo_hospedajes','idTipoHospedaje','CASCADE','SET NULL');
        $this->forge->addForeignKey('idTarifa','tbl_tarifas','idTarifa','CASCADE','SET NULL');
        $this->forge->addForeignKey('idMunicipio','tbl_municipios','idMunicipio','CASCADE','SET NULL');
        $this->forge->addForeignKey('idHuesped','tbl_huespedes','idHuesped','CASCADE','SET NULL');*/
        $this->forge->createTable('tbl_servicios');
        //$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tbl_servicios');
    }
}