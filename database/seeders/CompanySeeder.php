<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = collect([
            ['name' => "Hotel Tamanaco, C.A.", 'rif' => " J000189161"],
            ['name' => "Margarita Casinos Austria C.A.", 'rif' => " J306115331"],
        ]);

        foreach($companies as $c){
            $company = new Company();
            $company->name = $c['name'];
            $company->rif = $c['rif'];
            $company->save();
        }
    }
}
