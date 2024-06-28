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
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('link');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('type_id');
            $table->float('bid_amount');
            $table->float('min_price');
            $table->float('closing_price')->nullable();
            $table->float('reach_rate')->nullable();
            $table->enum('status',['pending','publish','sold','rejected'])->default('pending');
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
