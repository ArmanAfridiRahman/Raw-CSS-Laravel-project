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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('home_tabs')->nullable();
            $table->text('home_tab_description')->nullable();
            $table->text('home_headline_one')->nullable();
            $table->text('home_description_one')->nullable();
            $table->text('home_headline_two')->nullable();
            $table->text('home_description_two')->nullable();
            $table->text('home_programs')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
