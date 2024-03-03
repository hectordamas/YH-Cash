<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = ["Panorama Hotels Group LLC", "Hernamos Mayor LLC", "Operadora Interparking"];

        for($i = 0; $i < count($bancos); $i++){
            $bank = new Bank();
            $bank->name = $bancos[$i];
            $bank->currency = '$';
            $bank->save();
        }

    }
}
