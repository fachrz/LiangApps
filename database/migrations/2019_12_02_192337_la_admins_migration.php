<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaAdminsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('la_admins', function (Blueprint $table) {
            $table->string('username', 50)->primary();
            $table->string('password', 255);
            $table->string('fullname', 50);
            $table->string('alamat', 100);
            $table->string('no_telp', 50);
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
