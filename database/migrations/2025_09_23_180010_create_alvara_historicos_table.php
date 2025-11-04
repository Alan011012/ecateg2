<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alvara_historicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alvara_id'); // <-- adicionado
            $table->unsignedBigInteger('empresa_id');
            $table->string('numero');
            $table->date('data_emissao');
            $table->date('data_validade');
            $table->string('status')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alvara_historicos');
    }
};
