<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Comment extends Seeder
{
    public function run()
    {
        $faker = Factory::create('pt_BR');
        for ($i = 0; $i < 300; $i++) {
            $data = [
                'user_id' => $faker->numberBetween(1, 99),
                'post_id' => $faker->numberBetween(1, 100),
                'comment' => $faker->paragraph()
            ];

            $this->db->table('comments')->insert($data);
        }
    }
}
