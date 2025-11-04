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

    // Converte a data do formato BR para o formato do banco ao salvar
    public function setDataEmissaoAttribute($value)
    {
        $this->attributes['data_emissao'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setDataValidadeAttribute($value)
    {
        $this->attributes['data_validade'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    // Converte a data do formato do banco para BR ao exibir
    public function getDataEmissaoAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getDataValidadeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
}
