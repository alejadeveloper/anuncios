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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('cover');
            $table->float('price', 8, 2)->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_ranked')->default(false);
            $table->boolean('is_commentable')->default(false);
            $table->boolean('is_shareable')->default(false);
            $table->boolean('is_age_visible')->default(false);
            $table->enum('status', ['active', 'pending', 'inactive', 'expired']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
