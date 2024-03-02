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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->string('state_code');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->char('country_code', 2);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
            $table->tinyInteger('flag');
            $table->string('wikiDataId')->nullable()->comment('Rapid API GeoDB Cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
