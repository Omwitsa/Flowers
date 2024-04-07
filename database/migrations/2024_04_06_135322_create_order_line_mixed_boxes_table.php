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
        Schema::create('orderlinemixedbox', function (Blueprint $table) {
            $table->id();
            $table->integer('OrderLineId');
            $table->integer('VarietyId');
            $table->string('StemLength');
            $table->mediumText('StemQty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlinemixedbox');
    }
};
