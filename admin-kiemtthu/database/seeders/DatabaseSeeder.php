<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Gọi class khởi tại dữ liệu
         $this->call([
            ProductTypeSeeder::class,
            ProductSeeder::class,
            AccountsSeeder::class,
            CartsSeeder::class,
            InvoicesSeeder::class,
            InvoiceDetailSeeder::class
        ]);
    }
}
