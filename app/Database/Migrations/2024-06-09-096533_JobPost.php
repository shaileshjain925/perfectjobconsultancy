<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobPost extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'job_post_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'recruiter_profile_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'job_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'job_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'job_position_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'salary_min' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'salary_max' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'number_of_openings' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
            ],
            'work_from_home' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'job_duration' => [
                'type' => 'ENUM',
                'constraint' => ['full-time', 'part-time', 'internship'],
                'default' => 'full-time',
            ],
            'internship_paid' => [
                'type' => 'boolean',
                'default' => false
            ],
            'internship_certificate' => [
                'type' => 'boolean',
                'default' => false
            ],
            'internship_time_duration' => [
                'type' => 'ENUM',
                'constraint' => ['1M', '6M', '1Y', '1Y+'],
                'default' => '1M',
            ],
            'qualification' => [
                'type' => 'ENUM',
                'constraint' => ['primary_education', 'secondary_education', 'higher_secondary_education', 'bachelor_degree', 'master_degree','phd'],
                'default' => 'primary_education',
            ],
            'experience' => [
                'type' => 'ENUM',
                'constraint' => ['F','0M-6M','1Y','2Y','3Y','4Y','5Y','5Y+'],
                'default' => 'F'
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['M','F','B'],
            ],
            'english_required' => [
                'type' => 'ENUM',
                'constraint' => ['no_knowledge', 'basic', 'conversational', 'working_professional', 'fluent', 'advanced', 'proficient', 'native'],
            ],
            'job_description' => [
                'type' => 'TEXT',
            ],
            'job_timings' => [
                'type' => 'TEXT',
            ],
            'interview_details' => [
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
            'job_post_status' => [
                'type' => 'boolean',
                'default' => false
            ],
            'job_post_approvel' => [
                'type' => 'boolean',
                'default' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('job_post_id');
        $this->forge->addForeignKey('country_id', 'country', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('state_id', 'state', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('city_id', 'city', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('recruiter_profile_id', 'recruiter_profile', 'recruiter_profile_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('job_type_id', 'job_type', 'job_type_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('job_position_id', 'job_position', 'job_position_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('job_post', true);
    }

    public function down()
    {
        $this->forge->dropTable('job_post', true);
    }
}
