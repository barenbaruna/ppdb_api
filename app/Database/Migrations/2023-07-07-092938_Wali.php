<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wali extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'wali_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'wali_siswa_id' => [
                'type' => 'INT',
                'null' => false,
                'unsigned' => true
            ],
            'wali_fullname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'wali_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false
            ],
            'wali_notelp' => [
                'type' => 'CHAR',
                'constraint' => '13',
                'null' => false
            ],
            'wali_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'wali_hubungan' => [
                'type' => 'ENUM("Ayah","Ibu","Saudara")',
                'null' => false
            ]
        ]);

        $this->forge->addKey('wali_id', true);
        $this->forge->addForeignKey('wali_siswa_id', 'siswa', 'siswa_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('wali');
    }

    public function down()
    {
        $this->forge->dropTable('wali');
    }
}
