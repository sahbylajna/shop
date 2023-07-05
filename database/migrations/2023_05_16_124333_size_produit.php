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
        Schema::create('size_produit', function (Blueprint $table) {

            $table->integer('produit_id')->unsigned();

            $table->integer('size_id')->unsigned();

            $table->foreign('produit_id')->references('id')->on('produits')

                ->onDelete('cascade');

            $table->foreign('size_id')->references('id')->on('sizes')

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
