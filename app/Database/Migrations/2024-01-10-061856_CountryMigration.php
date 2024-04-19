<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CountryMigration extends Migration
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
                'constraint' => 100,
            ],
            'alias' => [
                'type' => 'CHAR',
                'constraint' => 3,
                'null' => true,
            ],
            'short_name' => [
                'type' => 'CHAR',
                'constraint' => 2,
                'null' => true,
            ],
            'phonecode' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'currency_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'currency_symbol' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'region' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('mst_countries', true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_countries', true);
    }
}
