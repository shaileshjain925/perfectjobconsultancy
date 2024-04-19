<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssBlogPost extends Migration
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
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'published_at datetime default current_timestamp',
            'featured_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'published'],
                'default' => 'draft',
            ],
            'views_count' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'likes_count' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'uploder_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'uploder_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_blog_post',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_blog_post',true);
    }
}
