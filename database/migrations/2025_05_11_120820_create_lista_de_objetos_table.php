<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('objetos', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('descripcion');
        $table->string('ubicacion');
        $table->string('tipo');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('lista_de_objetos');
    }
};
