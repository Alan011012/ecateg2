<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alvaras_historico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alvara_id')->constrained('alvaras')->onDelete('cascade');
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->string('numero');
            $table->date('data_emissao');
            $table->date('data_validade');
            $table->string('status');
            $table->text('observacao')->nullable();
            $table->foreignId('alterado_por')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alvaras_historico');
    }
};
