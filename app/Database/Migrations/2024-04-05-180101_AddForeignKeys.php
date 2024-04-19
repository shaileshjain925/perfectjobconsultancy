<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeys extends Migration
{
    public function up()
    {
        // $this->db->simpleQuery('ALTER TABLE `mst_roles_menus_access_rights` ADD FOREIGN KEY (`menu_id`) REFERENCES `mst_modules_menus`(`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE');
        // $this->db->simpleQuery('ALTER TABLE `mst_roles_menus_access_rights` ADD FOREIGN KEY (`role_id`) REFERENCES `mst_roles`(`role_id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }
    

    public function down()
    {
        //
    }
}
