<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssVisitors extends Migration
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
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'user_agent' => [
                'type' => 'TEXT',
            ],
            'timestamp' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'timestamp datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_visitors',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_visitors',true);
    }
}
