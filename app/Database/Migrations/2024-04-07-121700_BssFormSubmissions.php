<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssFormSubmissions extends Migration
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
            'form_type' => [
                'type' => 'ENUM',
                'constraint' => ['contact_us', 'sales', 'support', 'career'],
                'default'=> 'contact_us'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'attachment_blob' => [
                'type' => 'BLOB',
                'null' => true,
            ],
            'attachment_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'product_or_service_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'product_or_service_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_form_submissions',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_form_submissions',true);
    }
}
