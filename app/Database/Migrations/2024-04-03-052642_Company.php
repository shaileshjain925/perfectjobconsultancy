<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Company extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'company_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'firm_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'hostname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'port' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'database' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'api_token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('company_id', true);
        $this->forge->createTable('mst_company',true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_company',true);
    }
}
