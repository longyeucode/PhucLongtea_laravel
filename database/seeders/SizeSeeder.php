<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;
use Faker\Factory as Faker;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['S', 'M', 'L'];
        $faker=Faker::create();
        foreach ($sizes as $size) {
            Size::create(['name' => $size]);
        }
    }
}
