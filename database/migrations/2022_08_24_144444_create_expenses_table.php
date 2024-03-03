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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('fecha')->nullable();
            $table->string('numero')->nullable();
            $table->float('monto', 100, 2)->nullable();
            $table->string('forma_de_pago')->nullable();
            $table->string('recibo')->nullable();
            $table->string('concepto')->nullable();
            $table->string('descripcion')->nullable();

            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->bigInteger('cash_id')->unsigned()->nullable();
            $table->foreign('cash_id')->references('id')->on('cashes');

            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')->on('providers');

            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');

            $table->bigInteger('contable_id')->unsigned()->nullable();
            $table->foreign('contable_id')->references('id')->on('contables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
