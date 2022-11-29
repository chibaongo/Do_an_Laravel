<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 20;
        for ($i = 1; $i < $max; $i++) {
            DB::table('invoice_details')->insert([
                'ProductId' => $i,
                'InvoiceId' => $i,
                'Quantity' => $i *2,
                'UnitPrice' => 1
            ]);
        }
    }
}
