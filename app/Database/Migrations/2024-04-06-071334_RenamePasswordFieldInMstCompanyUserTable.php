<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenamePasswordFieldInMstCompanyUserTable extends Migration
{
    public function up()
    {
        try {
            $this->db->query('ALTER TABLE mst_company_user CHANGE password company_user_password VARCHAR(255)');
        } catch (\Throwable $th) {
            log_message('error',$th->getMessage());
        }
        
    }

    public function down()
    {
        $this->db->query('ALTER TABLE mst_company_user CHANGE company_user_password password VARCHAR(255)');
    }
}