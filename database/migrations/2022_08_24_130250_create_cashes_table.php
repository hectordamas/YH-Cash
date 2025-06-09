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
        Schema::create('cashes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('currency')->nullable();
        });

        DB::unprepared("INSERT INTO `cashes` (`id`, `created_at`, `updated_at`, `name`, `currency`) VALUES
            (1, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Hotel Principal', '$'),
            (2, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Estacionamiento Principal', '$'),
            (3, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Casino Principal', '$'),
            (4, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Hotel Secundaria', '$'),
            (5, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Estacionamiento Secundaria', '$'),
            (6, '2025-05-21 12:04:52', '2025-05-21 12:04:52', 'Casino Secundaria', '$');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashes');
    }
};
