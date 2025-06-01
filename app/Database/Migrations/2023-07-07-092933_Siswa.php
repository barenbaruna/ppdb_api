<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'siswa_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'siswa_fullname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'siswa_tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'siswa_tanggal_lahir' => [
                'type' => 'DATE',
                'null' => false
            ],
            'siswa_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false
            ],
            'siswa_jenis_kelamin' => [
                'type' => 'ENUM("Laki-Laki","Perempuan")',
                'null' => false
            ],
            'siswa_notelp' => [
                'type' => 'CHAR',
                'constraint' => '13',
                'null' => false
            ],
            'siswa_email' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false
            ],
            'siswa_nisn' => [
                'type' => 'CHAR',
                'constraint' => '16',
                'null' => false
            ],
            'siswa_nilai_rata' => [
                'type' => 'FLOAT',
                'null' => false
            ],
        ]);

        $this->forge->addKey('siswa_id', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
