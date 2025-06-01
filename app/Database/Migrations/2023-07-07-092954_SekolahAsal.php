<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SekolahAsal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sekolah_asal_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'sekolah_asal_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'sekolah_asal_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => false
            ],
            'sekolah_asal_notelp' => [
                'type' => 'CHAR',
                'constraint' => '13',
                'null' => false
            ],
        ]);

        $this->forge->addKey('sekolah_asal_id', true);
        $this->forge->createTable('sekolah_asal');
    }

    public function down()
    {
        $this->forge->dropTable('sekolah_asal');
    }
}
