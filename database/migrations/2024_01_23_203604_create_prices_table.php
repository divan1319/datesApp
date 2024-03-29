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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('establishment_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->foreignId('freelancer_id')->nullable()->constrained()->cascadeOnUpdate();
            $table->decimal('price',10,2);
            $table->time('time');
            $table->enum('type',['negocio','independiente']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
