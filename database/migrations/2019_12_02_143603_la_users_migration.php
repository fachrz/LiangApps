<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaUsersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('la_users', function (Blueprint $table) {
            $table->string('email', 50)->primary();
            $table->string('password', 255);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('no_telp', 50);
            $table->string('alamat', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
