<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->longText('address')->nullable();
        });

        DB::unprepared("INSERT INTO `providers` (`id`, `created_at`, `updated_at`, `type`, `number`, `name`, `address`) VALUES
            (1, '2022-06-10 12:00:36', '2022-06-10 12:00:36', 'J', '406815047', 'GRUPO IMPORFERKA, C.A.', 'AV BEETHOVEN CON CALLE SORBONA EDIF TORRE FINANCIERA PISO 2 OF 2-B 2-H URB BELLO MONTE CARACAS MIRANDA ZONA POSTAL 1050'),
            (2, '2022-06-10 12:00:36', '2022-06-10 12:00:36', 'G', '200049910', 'SERVICIO AUTONOMO MUNICIPAL DE ADMINISTRACION TRIBUTARIA', 'Municipio Baruta'),
            (3, '2022-06-10 12:00:36', '2022-06-10 12:00:36', 'G', '200049912', 'ANDREA ALEJANDRA BONELLI NATERA', 'Av Panteon Hospital de Clinicas Caracas Piso 2 of 233 Urb San Bernandino Caracas Distrito Capital Zona Postal 1050');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
};
