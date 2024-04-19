<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyUserTokken extends Migration
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
            'company_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'company_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            
            'jwt_token' => [
                'type' => 'TEXT',
            ],
            'token_expiry_date' => [
                'type' => 'DATETIME',
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('company_user_id', 'mst_company_user', 'company_user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('company_id', 'mst_company', 'company_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mst_company_user_token',true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_company_user_token',true);
    }
}
