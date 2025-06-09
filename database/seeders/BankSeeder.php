<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = ["Chase", "BOFA", "Wells Fargo"];

        for($i = 0; $i < count($bancos); $i++){
            $bank = new \App\Models\Bank();
            $bank->name = $bancos[$i];
            $bank->currency = '$';
            $bank->save();
        }

    }
}
