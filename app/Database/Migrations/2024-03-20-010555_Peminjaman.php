<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    //up: dijalankan saat melakukan migrasi
    public function up()
    {
        //Membuat kolom/field
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_buku' => [
                'type' => 'INT'
            ],
            'id_anggota' => [
                'type' => 'INT'
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('peminjaman', TRUE);
    }

    //dijalankan saat melakukan rollback
    public function down()
    {
        //
    }
}
