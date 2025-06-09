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
            (1, NOW(), NOW(), 'J', '312345678', 'INVERSIONES TECHNOSOFT, C.A.', 'Calle 3, Zona Industrial La Trinidad, Caracas, Miranda'),
            (2, NOW(), NOW(), 'V', '12345678', 'JUAN CARLOS PÉREZ', 'Av. Libertador, Edif. Central, Apto 4B, Maracay, Aragua'),
            (3, NOW(), NOW(), 'J', '278945612', 'REPUESTOS EL VOLANTE, C.A.', 'Calle Comercio, Local 12, Barquisimeto, Lara'),
            (4, NOW(), NOW(), 'G', '987654321', 'ALCALDÍA DEL MUNICIPIO SUCRE', 'Av. Francisco de Miranda, Caracas, Distrito Capital'),
            (5, NOW(), NOW(), 'J', '456789123', 'SERVICIOS Y SOLUCIONES 2020, C.A.', 'Av. Intercomunal, Zona Industrial, Valencia, Carabobo'),
            (6, NOW(), NOW(), 'V', '20457896', 'MARÍA FERNANDA RIVERO', 'Calle Sucre, Quinta El Milagro, Mérida, Mérida'),
            (7, NOW(), NOW(), 'J', '365214879', 'CONSTRUCCIONES DEL NORTE, C.A.', 'Av. Universidad, Torre Norte, Piso 5, Caracas, Distrito Capital'),
            (8, NOW(), NOW(), 'J', '895623147', 'AGROPECUARIA LOS ANDES, C.A.', 'Finca El Encanto, Sector Quebrada Honda, Táchira'),
            (9, NOW(), NOW(), 'V', '30478596', 'LUIS MIGUEL TORRES', 'Urb. Las Acacias, Calle 10, Casa N°23, Maracaibo, Zulia'),
            (10, NOW(), NOW(), 'J', '741852963', 'COMERCIALIZADORA VENELECTRO, C.A.', 'Parque Industrial Los Guayos, Galpón 4, Los Guayos, Carabobo');
        ");
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
