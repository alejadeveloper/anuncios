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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('iso3', '3')->nullable();
            $table->char('numeric_code', '3')->nullable();
            $table->char('iso2', '2')->nullable();
            $table->string('phonecode')->nullable();
            $table->string('capital')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('tld')->nullable();
            $table->string('native')->nullable();
            $table->string('region')->nullable();
            $table->foreignId('region_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('subregion')->nullable();
            $table->foreignId('subregion_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nationality')->nullable();
            $table->text('timezones');
            $table->text('translations');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
            $table->string('emoji')->nullable();
            $table->string('emojiU')->nullable();
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
        Schema::dropIfExists('countries');
    }
};