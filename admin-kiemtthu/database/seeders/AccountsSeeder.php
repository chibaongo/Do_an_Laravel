<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AccountsSeeder extends Seeder
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
            DB::table('accounts')->insert([
                'Username' => 'Username ' . Str::random(10),
                'password' => Hash::make('123456'),
                'email' => $i .'@gmail.com',
                'Phone' => '0'.random_int(100000000,999999999),
                'Address' => 'Cao thang',
                'FullName' => 'name '.$i,
                'IsAdmin' => $i %2 ==0 ? 1:0,
                'Avatar' =>'hinh'.$i.'.png'
            ]);
        }
    }
}
