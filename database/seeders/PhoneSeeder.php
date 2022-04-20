<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phones')->insert(
            array(
                'phone' => '01156047032',
            )
        );

        DB::table('phones')->insert(
            array(
                'phone' => '01090483647',
            )
        );

        DB::table('phones')->insert(
            array(
                'phone' => '01115294939',
            )
        );
    }
}
