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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->smallInteger('year', false, true)->nullable(false);
           /*  $table->unsignedSmallInteger('year');
            $table->smallInteger('year')->unsigned(); tri nacina da se napise ovo za year*/
            $table->smallInteger('running_h', false, true)->nullable(true);
            $table->smallInteger('running_m', false, true)->nullable(true);
            $table->decimal('rating', 3, 1, true)->nullable(true); /* Ocene od 1 do 10, ali decimalne vrednosti su ukljucene, pa nam je ovaj drigi parametar (3) zapravo koliko cifrara ukupno imamo a to je 3 zato sto nam je maksimalna ocena 10.0, a 3. parametar je br decimala */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
