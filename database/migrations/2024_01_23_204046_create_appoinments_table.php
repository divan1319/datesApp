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
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('freelancer_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->dateTime('date');
            $table->time('hours');
            $table->char('status');
            $table->enum('type',['negocio','independiente']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinments');
    }
};
