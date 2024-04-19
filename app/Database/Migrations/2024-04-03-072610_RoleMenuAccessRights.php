<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleMenuAccessRights extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'is_view' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'is_created' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'is_updated' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'is_deleted' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'is_export' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('mst_roles_menus_access_rights',true);
    }
    public function down()
    {
        $this->forge->dropTable('mst_roles_menus_access_rights',true);
    }
}
