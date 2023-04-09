<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetails;

class VendorsBusinessDetailsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vendors Busines Details Table Seed
        $vendors_records = [
            'id' => 1,
            'vendor_id' => 1,
            'shop_name' => 'Mim Electronics',
            'shop_address' => 'Dhaka Nikunja 2 Khilkhet 1229',
            'shop_city' => 'Dhaka',
            'shop_state' => 'Khilkhet',
            'shop_country' => 'Bangladesh',
            'shop_pincode' => '110111',
            'shop_mobile' => '017555522555',
            'shop_website' => 'www.sexymim.com',
            'shop_email' => 'sexymim@sexy.com',
            'address_proof' => 'Imran Love',
            'address_proof_image' => 'mim.jpg',
            'business_license_number' => '1223456',
            'gst_number' => '1234',
            'pan_number' => '55500',


        ];

        VendorsBusinessDetails::insert($vendors_records);
    }
}
