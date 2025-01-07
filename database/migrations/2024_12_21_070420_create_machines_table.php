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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_status_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('symbol_id');
            $table->string("machine_name");
            $table->string("manufacture");
            $table->integer("needle_count");
            $table->string("needle_type");
            $table->integer("lane_number");
            $table->integer("machine_number");
            $table->timestamps();

            $table->foreign('machine_status_id')->references('id')->on('machine_statuses')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('machine_statuses', function (Blueprint $table) {
            $table->dropForeign(['machine_status_id']);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('machines');
    }
};
