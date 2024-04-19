<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedMstModulesMenus extends Migration
{
    public function up()
    {
        $this->db->simpleQuery('ALTER TABLE `mst_modules_menus` ADD FOREIGN KEY (`module_id`) REFERENCES `mst_modules`(`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $modules = '
        [
            {"module_id":"1","name":"Website Management Client","description":"Website Management For Client Access","created_at":"2024-04-03 14:55:17","updated_at":"2024-04-05 22:24:23"},
            {"module_id":"2","name":"Admin Management","description":"Admin Management","created_at":"2024-04-05 22:23:17","updated_at":"2024-04-05 22:23:17"},
            {"module_id":"3","name":"Website Management Admin","description":"Website Management Admin Panel Access","created_at":"2024-04-05 22:24:58","updated_at":"2024-04-05 22:25:36"}
        ]
        ';

        // Parse JSON data for modules
        $modules = json_decode($modules, true);

        // Insert data into the database table for modules
        foreach ($modules as $module) {
            $existingModule = $this->db->table('mst_modules')->where('module_id', $module['module_id'])->get()->getRow();

            // Insert the module only if it doesn't exist
            if (!$existingModule) {
                $this->db->table('mst_modules')->insert($module);
            }
        }
        // Load the JSON data
        $menus = '
        [
            {"menu_id":"1","module_id":"1","name":"Website Profile","description":"Website Profile","created_at":"2024-04-03 14:58:36","updated_at":"2024-04-03 14:58:36"},
            {"menu_id":"2","module_id":"1","name":"Form Submissions (contact,sales,support,career)","description":"Form Submissions","created_at":"2024-04-03 14:58:59","updated_at":"2024-04-03 14:58:59"},
            {"menu_id":"3","module_id":"1","name":"Blog Post","description":"Blog Post","created_at":"2024-04-03 15:09:42","updated_at":"2024-04-03 15:09:42"},
            {"menu_id":"4","module_id":"1","name":"Visitor Count","description":"Visitor Count","created_at":"2024-04-03 15:10:06","updated_at":"2024-04-03 15:10:06"},
            {"menu_id":"5","module_id":"1","name":"Subscriber","description":"Subscriber","created_at":"2024-04-03 15:10:58","updated_at":"2024-04-03 15:24:58"},
            {"menu_id":"6","module_id":"1","name":"Employees","description":"Employees","created_at":"2024-04-03 15:11:32","updated_at":"2024-04-03 15:11:32"},
            {"menu_id":"7","module_id":"1","name":"Products & Services","description":"Products","created_at":"2024-04-03 15:12:39","updated_at":"2024-04-03 15:39:50"},
            {"menu_id":"8","module_id":"1","name":"Media Gallery","description":"Image Gallery","created_at":"2024-04-03 15:14:11","updated_at":"2024-04-03 15:18:07"},
            {"menu_id":"9","module_id":"1","name":"Digital Visiting Card","description":"Digital Visiting Card","created_at":"2024-04-03 15:21:31","updated_at":"2024-04-03 15:21:31"}
        ]
        ';

        // Parse JSON data
        $menus = json_decode($menus, true);

        // Insert data into the database table
        foreach ($menus as $menu) {
            $existingMenu = $this->db->table('mst_modules_menus')->where('menu_id', $menu['menu_id'])->get()->getRow();

            // Insert the menu only if it doesn't exist
            if (!$existingMenu) {
                $this->db->table('mst_modules_menus')->insert($menu);
            }
        }
    }

    public function down()
    {
        $this->forge->dropForeignKey('mst_modules_menus', 'mst_modules_menus_module_id_foreign');
    }
}
