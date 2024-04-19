<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CityMigration extends Migration
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
            'state_id' => [
                'type' => 'MEDIUMINT',
                'unsigned' => true,
            ],
            'country_id' => [
                'type' => 'MEDIUMINT',
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('state_id', 'mst_states', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('country_id', 'mst_countries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mst_cities', true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_cities', true);
    }
}
