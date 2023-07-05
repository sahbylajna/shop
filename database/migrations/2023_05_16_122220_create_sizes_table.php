<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('name_ar');
            $table->string('valeur');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sizes');
    }
}
