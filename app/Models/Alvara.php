<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Retorna os dias restantes até o vencimento (positivo = falta, 0 = hoje, negativo = vencido)
    public function getDiasRestantesAttribute()
    {
        if (empty($this->attributes['data_validade'])) {
            return null;
        }

        try {
            // atributos guardam a data no formato do banco (Y-m-d)
            $validade = Carbon::parse($this->attributes['data_validade'])->startOfDay();
        } catch (\Exception $e) {
            return null;
        }

        // dias relativos: positivo se falta, negativo se já venceu
        return Carbon::today()->diffInDays($validade, false);
    }

    // Texto amigável para exibir na lista
    public function getVencimentoTextoAttribute()
    {
        $dias = $this->dias_restantes;
        if (is_null($dias)) {
            return '—';
        }

        if ($dias > 1) {
            return "Faltam {$dias} dias";
        }

        if ($dias === 1) {
            return 'Falta 1 dia';
        }

        if ($dias === 0) {
            return 'Vence hoje';
        }

        // negativo
        $abs = abs($dias);
        return $abs === 1 ? 'Vencido há 1 dia' : "Vencido há {$abs} dias";
    }
}
