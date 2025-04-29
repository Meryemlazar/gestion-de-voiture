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
        Schema::disableForeignKeyConstraints();

        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->date('annee');
            $table->string('kilometrage');
            $table->float('prix');
            $table->string('description');
            $table->bigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('marques');
            $table->bigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('categories');
            $table->string('image');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
