<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StateMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'MEDIUMINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'state_code' => [
                'type' => 'CHAR',
                'constraint' => 3,
                'null' => true,
                'comment' => 'gst state code',
            ],
            'country_id' => [
                'type' => 'MEDIUMINT',
                'unsigned' => true,
            ],
            'short_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('country_id', 'mst_countries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mst_states', true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_states', true);
    }
}
