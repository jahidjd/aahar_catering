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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->char('event_name',255);
            $table->date('event_date');
            $table->char('event_factor',100)->default('1');
            $table->char('address',255);
            $table->char('phone',20);
            $table->char('email',100);
            $table->char('party_name',150);
            $table->char('job_no',255);
            $table->char('organized_by',255);
            $table->char('arrangement',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
