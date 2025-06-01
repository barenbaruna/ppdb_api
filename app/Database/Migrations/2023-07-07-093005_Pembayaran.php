<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pembayaran_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pembayaran_pendaftaran_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'pembayaran_jumlah' => [
                'type' => 'FLOAT',
                'null' => false
            ],
            'pembayaran_tanggal' => [
                'type' => 'DATE',
                'null' => false
            ],
            'pembayaran_metode' => [
                'type' => 'ENUM("BRI","BCA","MANDIRI")',
                'null' => false
            ],
            'pembayaran_bukti' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'pembayaran_status' => [
                'type' => 'ENUM("Berhasil", "Pending", "Gagal")',
                'default' => "Pending",
                'null' => false
            ]
        ]);

        $this->forge->addKey('pembayaran_id', true);
        $this->forge->addForeignKey('pembayaran_pendaftaran_id', 'pendaftaran', 'pendaftaran_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
