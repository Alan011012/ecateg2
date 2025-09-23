<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alvara extends Model
{
    protected $fillable = ['empresa_id', 'numero', 'data_emissao', 'data_validade', 'status', 'observacao'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function historicos()
    {
        return $this->hasMany(AlvaraHistorico::class);
    }
}
