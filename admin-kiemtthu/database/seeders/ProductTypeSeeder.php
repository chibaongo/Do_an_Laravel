<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 5;
        for ($i = 1; $i <= $max; $i++) {
            DB::table('product_types')->insert([
                'name' => 'product_types ' .  $i
            ]);
        }
    }
}
