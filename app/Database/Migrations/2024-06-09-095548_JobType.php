<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'job_type_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'job_type_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('job_type_id');
        $this->forge->createTable('job_type', true);
    }

    public function down()
    {
        $this->forge->dropTable('job_type', true);
    }
}
