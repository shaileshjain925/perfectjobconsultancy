<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'company_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'company_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'otp_expiry_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'staff'],
                'default' => 'staff',
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('company_user_id', true);
        $this->forge->addForeignKey('company_id', 'mst_company', 'company_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mst_company_user', true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_company_user', true);
    }
}
