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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('symbol_id');
            $table->string('size',255);
            $table->timestamps();

            $table->foreign('symbol_id')->references('id')->on('symboles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('symboles', function (Blueprint $table) {
            $table->dropForeign(['symbol_id']);
        });

        Schema::dropIfExists('sizes');
    }
};
