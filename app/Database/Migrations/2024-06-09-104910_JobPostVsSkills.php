<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobPostVsSkills extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'job_post_vs_skills_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'job_post_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'skills_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('job_post_vs_skills_id');
        $this->forge->addForeignKey('job_post_id', 'job_post', 'job_post_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('skills_id', 'skills', 'skills_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('job_post_vs_skills', true);
    }

    public function down()
    {
        //
    }
}
