<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaApplicationsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('la_applications', function (Blueprint $table) {
            $table->bigIncrements('id_app');
            $table->string('app_name', 50);
            $table->string('app_icon', 255);
            $table->string('dev_name', 50);
            $table->bigInteger('price');
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
