<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pendaftaran_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pendaftaran_siswa_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'pendaftaran_sekolah_asal_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'pendaftaran_jurusan_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'pendaftaran_tanggal' => [
                'type' => 'DATE',
                'null' => false
            ],
            'pendaftaran_status' => [
                'type' => 'ENUM("Ditolak","Diterima")',
                'null' => false
            ],
            'pendaftaran_status_pembayaran' => [
                'type' => 'ENUM("Lunas", "Belum Dibayar")',
                'default' => 'Belum Dibayar',
                'null' => false
            ]
        ]);

        $this->forge->addKey('pendaftaran_id', true);
        $this->forge->addForeignKey('pendaftaran_siswa_id', 'siswa', 'siswa_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pendaftaran_sekolah_asal_id', 'sekolah_asal', 'sekolah_asal_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pendaftaran_jurusan_id', 'jurusan', 'jurusan_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pendaftaran');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftaran');
    }
}
