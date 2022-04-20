<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert(
            array(
                'address' => 'Cairo, El Slam',
            )
        );

        DB::table('addresses')->insert(
            array(
                'address' => 'Cairo, El Moasasa',
            )
        );
    }
}
