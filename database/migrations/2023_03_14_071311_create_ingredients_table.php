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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('ingredient_type_id');
            $table->foreign('ingredient_type_id')->references('id')->on('ingredient_types')->onDelete('cascade')->onUpdate('cascade');
            $table->char('name',255);
            $table->bigInteger('quantity_per_unit');
            $table->char('unit_of_quantity',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
