<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssProductsServices extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'short_description' => [ // Added short description field
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'long_description' => [ // Added long description field
                'type' => 'TEXT',
                'null' => true,
            ],
            'type' => [ // Added type field
                'type' => 'ENUM',
                'constraint' => ['product', 'service'], // Defined possible values for type
                'default' => 'product', // Set default value to 'product'
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_products_services',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_products_services',true);
    }
}
