<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ejemplares', function (Blueprint $table) {
            $table->id();
            // Se crea como unsignedBigInteger SIN restricción foránea
            // para evitar el error si la tabla recursos_bibliograficos no existe
            $table->unsignedBigInteger('recurso_bibliografico_id')->nullable();
            
            $table->enum('estado', ['disponible', 'prestado', 'reservado', 'perdido', 'dañado', 'mantenimiento'])->default('disponible');
            
            // Relación con ubicaciones (esta SÍ existe)
            $table->foreignId('ubicacion_id')->nullable()->constrained('ubicaciones')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ejemplares');
    }
};