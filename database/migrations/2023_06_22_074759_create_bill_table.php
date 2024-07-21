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
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('month');
            $table->string('year');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('unpaid');
            $table->unsignedBigInteger('fk_id_price')->nullable();
            $table->foreign("fk_id_price")->references("id")->on("price")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};
