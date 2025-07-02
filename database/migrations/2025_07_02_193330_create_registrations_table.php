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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('documento')->unique();
            $table->string('telefono');
            $table->string('email');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('genero');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('talla');
            $table->decimal('precio', 10, 2)->default(0);
            $table->boolean('pagado')->default(false);
            $table->string('referencia_pago')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
