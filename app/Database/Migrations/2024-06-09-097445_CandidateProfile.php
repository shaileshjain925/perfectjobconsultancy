<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CandidateProfile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'candidate_profile_id' => 
            [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'candidate_name' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'candidate_phone_number' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'candidate_email' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'country_id' => 
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'state_id' => 
            [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'city_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'candidate_age' => 
            [
                'type' => 'VARCHAR',
                'constraint' => 3,
            ],
            'candidate_date_of_birth' => 
            [
                'type' => 'DATE',
                'null' => false,
            ],
            'candidate_gender' => [
                'type' => 'ENUM',
                'constraint' => ['M', 'F'],
            ],
            'candidate_qualification' => [
                'type' => 'ENUM',
                'constraint' => ['primary_education', 'secondary_education', 'higher_secondary_education', 'bachelor_degree', 'master_degree', 'phd'],
                'default' => 'primary_education',
            ],
            'candidate_experience' => [
                'type' => 'ENUM',
                'constraint' => ['F', '0M-6M', '1Y', '2Y', '3Y', '4Y', '5Y', '5Y+'],
                'default' => 'F'
            ],
            'english_required' => [
                'type' => 'ENUM',
                'constraint' => ['no_knowledge', 'basic', 'conversational', 'working_professional', 'fluent', 'advanced', 'proficient', 'native'],
            ],
            'job_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'candidate_resume' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'job_description' => [
                'type' => 'TEXT',
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('candidate_profile_id');
        $this->forge->addForeignKey('country_id', 'country', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('state_id', 'state', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('city_id', 'city', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('job_type_id', 'job_type', 'job_type_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('user_id', 'user', 'user_id','RESTRICT','RESTRICT');
        $this->forge->createTable('candidate_profile', true);
    }

    public function down()
    {
        $this->forge->dropTable('candidate_profile', true);
    }
}
