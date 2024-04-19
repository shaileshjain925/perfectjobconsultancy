<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssMediaGallery extends Migration
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
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['image', 'video'],
                'default' => 'image',
            ],
            'media_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'redirect_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'is_publish' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_media_gallery',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_media_gallery');
    }
}
