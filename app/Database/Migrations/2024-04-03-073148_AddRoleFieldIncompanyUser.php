<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleFieldIncompanyUser extends Migration
{
    public function up()
    { 
        try {
            $this->forge->addColumn('mst_company_user', [
                'role_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'after' => 'company_id', // Adjust the position as needed
                ],
            ]);
            // Add foreign key constraint
            $this->forge->addForeignKey('role_id', 'mst_roles', 'role_id', 'CASCADE', 'CASCADE');    
        } catch (\Throwable $th) {
            log_message('error',$th->getMessage());
        }
        // If you need to update existing data, you can do so here
    }

    public function down()
    {
        // Drop the foreign key constraint
        $this->forge->dropForeignKey('mst_company_user', 'mst_company_user_role_id_foreign');

        // Drop the role_id column
        $this->forge->dropColumn('mst_company_user', 'role_id');
    }
}
