<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlvaraHistorico extends Model
{
    protected $table = 'alvaras_historico';

    protected $fillable = ['alvara_id', 'empresa_id', 'numero', 'data_emissao', 'data_validade', 'status', 'observacao', 'alterado_por'];

    public function alvara()
    {
        return $this->belongsTo(Alvara::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
