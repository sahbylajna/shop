<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('name_ar')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('description_ar', 1000)->nullable();
            $table->string('price')->nullable();
            $table->string('photo')->nullable();
            $table->integer('category_id')->unsigned()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produits');
    }
}
