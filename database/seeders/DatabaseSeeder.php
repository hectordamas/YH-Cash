<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            BankSeeder::class, 
            CashSeeder::class, 
            CompanySeeder::class, 
            ContableSeeder::class, 
            ProviderSeeder::class,
            EntrySeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
