<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModuleMenus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'module_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('menu_id', true);
        $this->forge->createTable('mst_modules_menus',true);
    }

    public function down()
    {
        $this->forge->dropTable('mst_modules_menus',true);
    }
}
