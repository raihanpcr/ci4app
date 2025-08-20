<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'INT','unsigned' => true,'auto_increment' => true],
            'category_id' => ['type' => 'INT','unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'code' => ['type' => 'VARCHAR', 'constraint' => '50', 'unique' => true],
            'unit' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'stock' => ['type' => 'FLOAT', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
