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
        Schema::create('purchase_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('postId');
            $table->unsignedInteger('userId');
            $table->float('amount');
            $table->boolean('isSelected')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_offers');
    }
};
