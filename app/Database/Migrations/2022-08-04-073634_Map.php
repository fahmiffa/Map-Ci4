<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Map extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ],
            'koordinat' => [
                'type' => 'VARCHAR',
                'constraint'=> '100',                
            ],         
            'created_at'=> [
                'type'=> 'DATETIME',
                'null' => true,
            ],
            'updated_at'=> [
                'type'=> 'DATETIME',
                'null' => true,
            ],
            'deleted_at'=> [
                'type'=> 'DATETIME',
                'null' => true
            ]            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('map');
    }

    public function down()
    {
        //
        $this->forge->dropTable('map');
    }
}
