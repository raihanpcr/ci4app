<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name'       => ucfirst($faker->word()),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Insert data
        $this->db->table('categories')->insertBatch($data);
    }
}
