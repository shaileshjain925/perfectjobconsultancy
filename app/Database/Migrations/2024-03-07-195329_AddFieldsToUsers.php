<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }
    public function up()
    {
        try {
            $fields = [
                'first_name' => ['type' => 'VARCHAR', 'constraint' => '45', 'null' => false],
                'last_name' => ['type' => 'VARCHAR', 'constraint' => '45', 'null' => true],
                'mobile_number' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
                'oauth_id' => ['type' => 'TEXT', 'null' => true],
                'oauth_profile_image' => ['type' => 'TEXT', 'null' => true],
            ];
            $db = \Config\Database::connect('default');
            // Perform the query using the Query Builder
            $tableFields = $db->getFieldNames($this->tables['users']);

            // Check if the column exists before adding it
            foreach ($fields as $columnName => $column) {
                if (!in_array($columnName, $tableFields)) {
                    $this->forge->addColumn($this->tables['users'], [$columnName => $column]);
                }
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }

    public function down()
    {
        //
    }
}
