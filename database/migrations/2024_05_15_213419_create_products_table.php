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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('created_id');
            $table->text('photo');
            $table->string('type');
            $table->integer('price');
            $table->boolean('s')->default(false);
            $table->boolean('m')->default(false);
            $table->boolean('l')->default(false);
            $table->boolean('xl')->default(false);
            $table->boolean('xxl')->default(false);
            $table->boolean('xxxl')->default(false);
            $table->boolean('zero')->default(false);
            $table->boolean('one')->default(false);
            $table->boolean('two')->default(false);
            $table->boolean('three')->default(false);
            $table->boolean('four')->default(false);
            $table->boolean('five')->default(false);
            $table->boolean('six')->default(false);
            $table->boolean('seven')->default(false);
            $table->boolean('eight')->default(false);
            $table->boolean('nine')->default(false);
            $table->boolean('ten')->default(false);
            $table->boolean('eleven')->default(false);
            $table->boolean('twelve')->default(false);
            $table->boolean('thirteen')->default(false);
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
