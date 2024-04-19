<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BssWebsiteProfile extends Migration
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
            'firm_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'firm_slogan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'firm_logo_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'firm_address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'firm_owner_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'firm_cin_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'firm_gst_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'firm_pan_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'contact_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'contact_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'contact_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'sales_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'sales_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'sales_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'support_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'support_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'support_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'career_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'career_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'career_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'about_company' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'about_owner' => [
                'type' => "TEXT",
                'null' => true,
            ],
            'terms_and_conditions_content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'privacy_and_policies_content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'disclaimer_content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'firm_address_gmap_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'website_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'play_store_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'app_store_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'facebook_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'instagram_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'twitter_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'linkedin_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'youtube_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pinterest_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'telegram_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'google_search_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'email_smtp_host' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email_smtp_port' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'email_smtp_user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email_smtp_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email_smtp_crypto' => [
                'type' => 'ENUM',
                'constraint' => ['ssl', 'tls', ''],
                'null' => true,
            ],
            'email_from_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email_from_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_acc_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_acc_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_ifsc_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_acc_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'google_pay_upi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'google_pay_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'phone_pay_upi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'phone_pay_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'paytm_upi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'paytm_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'amazonpay_upi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'amazonpay_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bhim_upi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bhim_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bss_website_profile',true);
    }

    public function down()
    {
        $this->forge->dropTable('bss_website_profile',true);
    }
}
