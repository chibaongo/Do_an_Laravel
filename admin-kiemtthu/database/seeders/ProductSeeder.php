<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 20;
        for ($i = 1; $i <= $max; $i++) {
            DB::table('products')->insert([
                'SKU' => 'SKU ' . Str::random(10),
                'Name' => 'name' . $i,
                'Description' => 'Description' . $i,
                'Price' =>  $i*100,
                'Stock' =>  random_int(1,100),
                'ProductTypeId' => $i,
                'Image' => $i.".png",
            ]);
        }
    }
}
