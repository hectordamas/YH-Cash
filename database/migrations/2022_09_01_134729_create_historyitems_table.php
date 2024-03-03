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
        Schema::create('historyitems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('recibo')->nullable();
            $table->string('fecha')->nullable();
            $table->string('proveedor')->nullable();
            $table->string('empresa')->nullable();
            $table->string('cuenta')->nullable();
            $table->string('banco')->nullable();
            $table->string('caja')->nullable();
            $table->float('monto', 100, 2)->nullable();
            $table->string('xd')->nullable();
            $table->string('concepto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historyitems');
    }
};
