<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecruiterProfile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'recruiter_profile_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'company_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'company_address' => [
                'type' => 'TEXT',
            ],
            'country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'city_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'pincode' => [
                'type' => 'INT',
                'constraint' => 6
            ],
            'company_phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'company_email_address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ]
            ,
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('recruiter_profile_id');
        $this->forge->addForeignKey('country_id', 'country', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('state_id', 'state', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('city_id', 'city', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('user_id', 'user', 'user_id','RESTRICT','RESTRICT');
        $this->forge->createTable('recruiter_profile',true);
    }

    public function down()
    {
        $this->forge->dropTable('recruiter_profile',true);
    }
}
