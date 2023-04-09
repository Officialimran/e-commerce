<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminTableSeeder;
use Database\Seeders\VendorTableSeeder;
use Database\Seeders\VendorsBusinessDetailsTable;
use Database\Seeders\VendorsBankDetailsTable;
use Database\Seeders\SectionTableSeeder;
use Database\Seeders\CategoryTableSeeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(AdminTableSeeder::class);
        //$this->call(VendorTableSeeder::class);
        // $this->call(VendorsBusinessDetailsTable::class);
        //$this->call(VendorsBankDetailsTable::class);
        //$this->call(SectionTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
