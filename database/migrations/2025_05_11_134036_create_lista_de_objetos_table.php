<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lista_de_objetos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('ubicacion');
            $table->enum('tipo', ['perdido', 'encontrado']);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('lista_de_objetos');
    }
};
