<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAnfitriones extends Migration
{
    public function up(){
            $this->db->disableForeignKeyChecks();
            $this->forge->addField([
                'idAnfitrion'          => [
                    'type'           => 'INT',
                    'constraint'     => 12,
                    'unsigned'       => true,
                    'auto_increment' => true,
                    'null' => false,
                ],
                'descripcion'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => false,
                ],
                'puntuacion'       => [
                    'type'       => 'INT',
                    'constraint' => 12,
                    'unsigned'   => true,
                    'null' => true,
                ],
                'totalPuntuacion'       => [
                    'type'       => 'INT',
                    'constraint' => 12,
                    'unsigned'   => true,
                    'null' => true,
                ],
                'cuentaBanco'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
                ],
                'banco'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
                'idUsuario'          => [
                    'type'           => 'INT',
                    'constraint'     => 12,
                    'unsigned'       => true,
                    'null' => false,
                ],
                'idiomaPrimario'          => [
                    'type'           => 'INT',
                    'constraint'     => 12,
                    'unsigned'       => true,
                    'null' => true,
                ],
                'idiomaSecundario'          => [
                    'type'           => 'INT',
                    'constraint'     => 12,
                    'unsigned'       => true,
                    'null' => true,
                ],
                'idiomaExtra'          => [
                    'type'           => 'INT',
                    'constraint'     => 12,
                    'unsigned'       => true,
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('idAnfitrion', true);
            $this->forge->addForeignKey('idUsuario','tbl_usuarios','idUsuario','CASCADE','CASCADE');
            $this->forge->addForeignKey('idiomaPrimario','tbl_idiomas','idIdioma','CASCADE','SET NULL');
            $this->forge->addForeignKey('idiomaSecundario','tbl_idiomas','idIdioma','CASCADE','SET NULL');
            $this->forge->addForeignKey('idiomaExtra','tbl_idiomas','idIdioma','CASCADE','SET NULL');
            $this->forge->createTable('tbl_anfitriones');
            $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
    $this->forge->dropTable('tbl_anfitriones');
    }
}