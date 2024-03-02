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
        Schema::create('phoneable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phone_id')->constrained()->onDelete('cascade');
            $table->morphs('phoneable');
            $table->enum('status', ['verified', 'unverified'])->default('unverified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phoneable');
    }
};
