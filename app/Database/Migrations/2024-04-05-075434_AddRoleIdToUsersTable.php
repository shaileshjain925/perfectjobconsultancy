<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleIdToUsersTable extends Migration
{
    public function up()
    {
        try {
            $this->forge->addColumn('users', [
                'role_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'after' => 'username', // Adjust the position as needed
                ],
            ]);
            $this->forge->addForeignKey('role_id', 'mst_roles', 'role_id', 'CASCADE', 'CASCADE');
        } catch (\Throwable $th) {
            log_message('error',$th->getMessage());
        }
    }
    public function down()
    {
        // Drop the foreign key constraint
        $this->forge->dropForeignKey('users', 'users_role_id_foreign');

        // Drop the role_id column
        $this->forge->dropColumn('users', 'role_id');
    }
}
