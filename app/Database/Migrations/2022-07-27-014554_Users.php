<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint'=> '100',
                'unique' => true,
            ],
            'password'=> [
                'type' => 'VARCHAR',
                'constraint'=> '100',
                'null' => false,
            ],
            'status'=>[
                'type'=>'ENUM',
                'constraint'=>['admin','user'],
                'null'=>true,
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
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
