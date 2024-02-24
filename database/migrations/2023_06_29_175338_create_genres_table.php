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
        Schema::create('genres', function (Blueprint $table) {
            //$table->integer('id')->unsigned()->primary()->autoIncrement(); ovo je isto kao i id dole, ovo dole po defaultu podrazumeva
            $table->id();
            $table->string('name_en', 255)->nullable(false)->unique();
            $table->string('name_sr', 255)->nullable(true)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
