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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('rif')->nullable();
        });

        DB::unprepared("INSERT INTO `companies` (`id`, `created_at`, `updated_at`, `name`, `rif`) VALUES
            (1, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Hotel', 'J-555555555'),
            (2, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Estacionamiento', 'J-666666666'),
            (3, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Casino', 'J-777777777');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
