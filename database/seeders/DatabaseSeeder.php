<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(suplier::class);
        $this->call(BarangSeeder::class);
        $this->call(KurirSeeder::class);
        $this->call(BankSeeder::class);
    }
}
