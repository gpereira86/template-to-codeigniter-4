<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Reply extends Seeder
{
    public function run()
    {
        $faker = Factory::create('pt_BR');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'user_id' => $faker->numberBetween(1, 99),
                'comment_id' => $faker->numberBetween(1, 100),
                'comment' => $faker->paragraph()
            ];

            $this->db->table('replies')->insert($data);
        }
    }
}
