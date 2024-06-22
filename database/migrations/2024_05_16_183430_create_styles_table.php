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
        Schema::create('styles', function (Blueprint $table) {
            $table->id();
            $table->integer('created_id');
            $table->integer('product_id');
            $table->string('color');
            $table->string('ageORsize');
            $table->boolean('s');
            $table->boolean('m');
            $table->boolean('l');
            $table->boolean('xl');
            $table->boolean('xxl');
            $table->boolean('xxxl');
            $table->boolean('zero');
            $table->boolean('one');
            $table->boolean('two');
            $table->boolean('three');
            $table->boolean('four');
            $table->boolean('five');
            $table->boolean('six');
            $table->boolean('seven');
            $table->boolean('eight');
            $table->boolean('nine');
            $table->boolean('ten');
            $table->boolean('eleven');
            $table->boolean('twelve');
            $table->boolean('thirteen');
            $table->integer('nbr_zero');
            $table->integer('nbr_one');
            $table->integer('nbr_two');
            $table->integer('nbr_three');
            $table->integer('nbr_four');
            $table->integer('nbr_five');
            $table->integer('nbr_six');
            $table->integer('nbr_seven');
            $table->integer('nbr_eight');
            $table->integer('nbr_nine');
            $table->integer('nbr_ten');
            $table->integer('nbr_eleven');
            $table->integer('nbr_twelve');
            $table->integer('nbr_thirteen');
            $table->integer('nbr_s');
            $table->integer('nbr_m');
            $table->integer('nbr_l');
            $table->integer('nbr_xl');
            $table->integer('nbr_xxl');
            $table->integer('nbr_xxxl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('styles');
    }
};
