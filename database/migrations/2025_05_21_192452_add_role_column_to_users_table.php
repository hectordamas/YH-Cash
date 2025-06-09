<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['Analista', 'Director', 'Gerente'])->default('Analista');
        });

        $user = User::first();
        $user->role = 'Gerente';
        $user->save();
        
        $user = new User();
        $user->name = 'Gerente';
        $user->email = 'gerente2025@gmail.com';
        $user->password = bcrypt('123456789');
        $user->role = 'Gerente';
        $user->save();

        $user = new User();
        $user->name = 'Director';
        $user->email = 'director2025@gmail.com';
        $user->password = bcrypt('123456789');
        $user->role = 'Director';
        $user->save();

        $user = new User();
        $user->name = 'Analista';
        $user->email = 'analista2025@gmail.com';
        $user->password = bcrypt('123456789');
        $user->role = 'Analista';
        $user->save();

        $user = new User();
        $user->name = 'Analista2';
        $user->email = 'analista22025@gmail.com';
        $user->password = bcrypt('123456789');
        $user->role = 'Analista';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
