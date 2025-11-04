<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AlvaraHistorico extends Model
{
    // força o nome correto da tabela (caso sua migration tenha criado diferente)
    protected $table = 'alvara_historicos'; 

    protected $fillable = [
        'alvara_id',
        'empresa_id',
        'numero',
        'data_emissao',
        'data_validade',
        'status',
        'observacao'
    ];

    // Converte a data do formato BR para o formato do banco ao salvar
    public function setDataEmissaoAttribute($value)
    {
        $this->attributes['data_emissao'] = is_string($value) && str_contains($value, '/') 
            ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
            : $value;
    }

    public function setDataValidadeAttribute($value)
    {
        $this->attributes['data_validade'] = is_string($value) && str_contains($value, '/') 
            ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
            : $value;
    }

    // Converte a data do formato do banco para BR ao exibir
    public function getDataEmissaoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getDataValidadeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function alvara()
    {
        return $this->belongsTo(Alvara::class);
    }
}
