<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
       for ($i=0; $i <10 ; $i++) { 
        Product::create(
            [
                'name'=>$faker->word,
                'slug'=>$faker->word,
                'image'=>'nuoc'.$i.'.png',
                'description'=>$faker->sentence,
                'price'=>$faker->randomFloat(2,10,1000),
                'quantity'=>$faker->numberBetween(1,100),
                'sale_price'=>$faker->numberBetween(1,100),
                'category_id'=>$faker->numberBetween(1,10),
            ]
        );
       }
    }
}
