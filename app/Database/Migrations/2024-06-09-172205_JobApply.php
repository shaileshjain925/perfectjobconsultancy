<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobApply extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'job_apply_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'job_post_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'candidate_profile_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'approval_for_share_contact_detail_of_candidate' => [
                'type' => 'boolean',
                'default' => false
            ],
            'share_contact_detail_of_candidate' => [
                'type' => 'boolean',
                'default' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('job_apply_id');
        $this->forge->addForeignKey('candidate_profile_id', 'candidate_profile', 'candidate_profile_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('job_post_id', 'job_post', 'job_post_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('job_apply', true);
    }

    public function down()
    {
        //
    }
}
