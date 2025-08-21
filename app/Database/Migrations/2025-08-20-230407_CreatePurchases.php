<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchases extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'INT','unsigned' => true,'auto_increment' => true],
            'vendor_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'alamat' => ['type' => 'TEXT'],
            'buyer_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'item' => ['type' => 'VARCHAR', 'constraint' => 255],
            'date' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('purchases');
    }

    public function down()
    {
        $this->forge->dropTable('purchases');
    }
}
