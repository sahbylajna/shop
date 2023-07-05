<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordres', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('produit_id')->unsigned()->nullable()->index();
            $table->integer('color_id')->unsigned()->nullable()->index();
            $table->integer('size_id')->unsigned()->nullable()->index();
            $table->string('quantity')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordres');
    }
}
