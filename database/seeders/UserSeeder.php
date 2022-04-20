<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $role_admin = Role::Where('name', 'Admin')->first();
    //     $role_Technical = Role::Where('name', 'Technical')->first();
        

        $user = new User();
        $user->name = "Mohab Mamdouh";
        $user->arabic_name = "مهاب ممدوح";
        $user->email = "mohabmamdouh22@gmail.com";
        $user->password = Hash::make('M01090483647');
        $user->image_path = "Mohab Mamdouh.jpg";
        $user->save();
        $user->roles()->attach(Role::Where('name', 'Admin')->first());
        $user->getPhones()->attach(Phone::where('phone', '01156047032')->first());
        $user->getPhones()->attach(Phone::where('phone', '01090483647')->first());
        $user->getAddress()->attach(Address::where('address', 'Cairo, El Slam')->first());


        $user = new User();
        $user->name = "Rabia Mohamed";
        $user->arabic_name = 'ربيع محمد';
        $user->email = "rabiamohamed39@gmail.com";
        $user->password = Hash::make('M01090483647');
        $user->image_path = "Rabia Mohamed.jpg";
        $user->save();
        $user->roles()->attach(Role::Where('name', 'Technical')->first());
        $user->getPhones()->attach(Phone::where('phone', '01115294939')->first());
        $user->getAddress()->attach(Address::where('address', 'Cairo, El Moasasa')->first());



        // DB::table('users')->insert([
        //     array(
        //         'name' => 'Mohab Mamdouh',
        //         'arabic_name' => 'مهاب ممدوح',
        //         'email' => 'mohabmamdouh22@gmail.com',
        //         'password' => Hash::make('M01090483647'),
        //     )
        // ]);
    }
}
