<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('color_produit', function (Blueprint $table) {

            $table->integer('produit_id')->unsigned();

            $table->integer('color_id')->unsigned();

            $table->foreign('produit_id')->references('id')->on('produits')

                ->onDelete('cascade');

            $table->foreign('color_id')->references('id')->on('colors')

                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
