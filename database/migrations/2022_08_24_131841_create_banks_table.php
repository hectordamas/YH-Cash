<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('currency')->nullable();
        });

        $bancos = ["Chase", "BOFA", "Wells Fargo", "CityBank", "Citigroup"];

        for($i = 0; $i < count($bancos); $i++){
            $bank = new \App\Models\Bank();
            $bank->name = $bancos[$i];
            $bank->currency = '$';
            $bank->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
};
