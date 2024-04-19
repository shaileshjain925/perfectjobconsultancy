<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPasswordColumnInMstCompanyTable extends Migration
{
    public function up()
    {
        try {
            $fields = [
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true, // Allow NULL values
                    'default' => NULL, // Default value
                    'after' => 'username', // Position after 'username' column
                    'charset' => 'utf8',
                    'collate' => 'utf8_general_ci'
                ]
            ];

            $this->forge->modifyColumn('mst_company', $fields);
        } catch (\Throwable $th) {
            log_message('error',$th->getMessage());
        }
    }

    public function down()
    {
        //
    }
}
