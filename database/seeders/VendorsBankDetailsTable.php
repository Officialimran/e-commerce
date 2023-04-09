<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetails;

class VendorsBankDetailsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vendors Bank Details Table
        $vendors_records = [
            'id' => 1,
            'vendor_id' => 1,
            'account_holder_name' => 'Imran Ahmed',
            'bank_name' => 'iBank',
            'account_number' => '1234567890',
            'bank_ifsc_code' => '123456',

        ];

        VendorsBankDetails::insert($vendors_records);
    }
}
