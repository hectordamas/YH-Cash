<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cash;

class CashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cajas = ["Operativa", "Casino", "Proyectos", "Le Gourmet", "Concesionarios", "Oh Laboratorio", "Fee Estacionamiento"];

        $cash = new Cash();
        $cash->name = "Caja Casino";
        $cash->currency = "€";
        $cash->save();

        $cash = new Cash();
        $cash->name = "Caja HTCA";
        $cash->currency = "€";
        $cash->save();

        for($i = 0; $i < count($cajas); $i++){
            $cash = new Cash();
            $cash->name = $cajas[$i];
            $cash->currency = "$";
            $cash->save();
        }
    }
}
