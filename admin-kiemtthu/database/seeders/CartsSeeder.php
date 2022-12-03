<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CartsSeeder extends Seeder
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
            DB::table('carts')->insert([
                'AccountId' => $i,
                'ProductId' => $i,
                'Quantity' => $i 
            ]);
        }
    }
}
