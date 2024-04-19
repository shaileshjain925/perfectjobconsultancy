<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAccessTypeToRoles extends Migration
{
    public function up()
    {
        try {
            $fields = [
                'access_type' => [
                    'type' => 'ENUM("MobileAppUser", "WebAppUser")',
                    'default' => 'WebAppUser',
                    'null' => false,
                    'after' => 'description', // Adjust the position as needed
                ],
            ];
    
            $this->forge->addColumn('mst_roles', $fields);
        } catch (\Throwable $th) {
            log_message('error',$th->getMessage());
        }
        
    }

    public function down()
    {
        $this->forge->dropColumn('mst_roles', 'access_type');
    }
}
