<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssSubscribers extends Migration
{
    
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'is_subscribe' => [
                'type' => 'BOOLEAN',
                'default' => true, // Assuming subscribers are subscribed by default
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_subscribers',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_subscribers',true);
    }
}
