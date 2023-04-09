<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //VendorTable Seed
        $vendorRecords = [
            [
                'id' => 1,
                'name' => 'Imran',
                'address' => 'Dhaka Nikunja-2',
                'city' => 'Dhaka',
                'state' => 'Khilkhet',
                'country' => 'Bangladesh',
                'pincode' => '1229',
                'mobile' => '01818919348',
                'email' => 'imran@gmail.com',
                'status' => 0
            ],
        ];
        Vendor::insert($vendorRecords);
    }
}
