<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pricings')->insert(
            array(
                'plan' => 'Individual',
                'price' => '30',
                'duration' => 'Day',
            )
        );
        DB::table('pricings')->insert(
            array(
                'plan' => 'Central',
                'price' => '50',
                'duration' => 'Monthly',
            )
        );
    }
}
