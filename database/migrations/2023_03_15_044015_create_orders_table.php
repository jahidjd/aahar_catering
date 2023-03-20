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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_id')->nullable();
            $table->string('category_id')->nullable();
            $table->unsignedBigInteger('party_name')->nullable();
            $table->foreign('party_name')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->char('menu_name',150)->nullable();
            $table->BigInteger('number_of_attendees')->nullable();
            $table->BigInteger('number_of_veg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
