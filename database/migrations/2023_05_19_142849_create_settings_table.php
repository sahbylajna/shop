<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
