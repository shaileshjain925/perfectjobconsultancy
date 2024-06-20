<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skills extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'skills_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'skills_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('skills_id');
        $this->forge->createTable('skills', true);
    }

    public function down()
    {
        $this->forge->dropTable('skills', true);
    }
}
