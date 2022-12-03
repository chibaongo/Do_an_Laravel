<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max =5;
        for ($i = 1; $i <= $max; $i++) {
            DB::table('invoices')->insert([
                'Code' =>  Str::random(10),
                'AccountId' =>  $i,
                'IssuedDate' => now(),
                'ShippingAddress' =>  'cao thang',
                'ShippingPhone' =>  'cao thang',
                'Total' => $i *10
            ]);
        }
    }
}
