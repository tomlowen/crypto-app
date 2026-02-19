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
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('coingecko_id', 120)->unique();
            $table->tinyText('name');
            $table->string('symbol', 10)->unique();
            $table->text('description');
            $table->string('image_url');
            $table->unsignedInteger('current_price'); 
            $table->unsignedBigInteger('market_cap');
            $table->tinyInteger('market_cap_rank');
            $table->unsignedBigInteger('fully_diluted_valuation');
            $table->unsignedBigInteger('total_volume')->nullable();
            $table->unsignedInteger('high_24h')->nullable();
            $table->unsignedInteger('low_24h')->nullable();
            $table->integer('price_change_24h')->nullable();
            $table->tinyInteger('price_change_percentage_24h')->nullable();
            $table->bigInteger('market_cap_change_24h')->nullable();
            $table->tinyInteger('market_cap_change_percentage_24h')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};
