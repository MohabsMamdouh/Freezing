<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PhoneSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(SiteinfoSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
