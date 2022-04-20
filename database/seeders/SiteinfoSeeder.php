<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Phone;
use App\Models\SiteInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Site = new SiteInfo();
        $Site->website_title = "Al Handasya";
        $Site->website_arabic = "الهندسية";
        $Site->email = "mohabmamdouh22@gmail.com";
        $Site->website_logo = "logo.jpg";
        $Site->website_favicon = "favicon.png";
        $Site->meta_keyword = "Air Conditioning - Repair - Al Handasya";
        $Site->meta_description = "dd";
        $Site->phone1 = "01149058041";
        $Site->phone2 = "01090483647";
        $Site->address = "Cairo";
        $Site->save();
    }
}
