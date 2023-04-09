<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Str;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id'=>2,
                'name'=>'Imran Ahmed',
                'type'=>'vendor',
                'vendor_id'=>1,
                'mobile'=>'01818919348',
                'email'=>'imran@admin.com',
                'password'=> '$2a$12$62Bbq3vzhpsgGD6v1JXDUOQre3IldHOUGjXGv69kXvLkK4KxhT1Yu',
                'image'=>'',
                'status'=>0]
        ];
        Admin::insert($adminRecords);
    }
}
