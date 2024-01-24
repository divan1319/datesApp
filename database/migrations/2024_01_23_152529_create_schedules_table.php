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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('establishment_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->string('days');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->enum('type',['negocio','independiente']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
