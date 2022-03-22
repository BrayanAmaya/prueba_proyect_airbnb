<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblDepartamentos extends Migration
{
    public function up()
    {
        //$this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'idDepartamento'          => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'departamento'       => [
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
            'idPais'          => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idDepartamento', true);
        //$this->forge->addForeignKey('idPais','tbl_paises','idPais','CASCADE','SET NULL');
        $this->forge->createTable('tbl_departamentos');
        //$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tbl_departamentos');
    }
}