<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        $faker = Factory::create();
        DB::table('jobs')->insert([
            [
                'id'=>1,
                'title' => $faker->words(2,true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'category'=>1,
                'email' => $faker->email,
                'company' =>$faker->word,
                'address'=> $faker->address,
                'website'=> $faker->url,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'=>2,
                'title' => $faker->words(2,true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'category'=>2,
                'email' => $faker->email,
                'company' =>$faker->word,
                'address'=> $faker->address,
                'website'=> $faker->url,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'=>3,
                'title' => $faker->words(2,true),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'category'=>3,
                'email' => $faker->email,
                'company' =>$faker->word,
                'address'=> $faker->address,
                'website'=> $faker->url,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
