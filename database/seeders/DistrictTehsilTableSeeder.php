<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\District;
use App\Models\Tehsil;
use App\DataProviders\DistrictTehsilDataProvider;

class DistrictTehsilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        District::insert(DistrictTehsilDataProvider::Districts());

        Tehsil::insert(DistrictTehsilDataProvider::Tehsils());
    }
}
