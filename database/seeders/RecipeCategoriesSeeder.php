<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_categories')->insert($this->getData());
    }

    private function getData() :array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i <= 5; $i++) {
            $data[] = [
                'name' => $faker->word(),
                'description' => $faker->realText(mt_rand(100, 200)),
            ];
        }
        return $data;
    }
}
