<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'cnpj'];

    public function alvaras()
    {
        return $this->hasMany(Alvara::class);
    }
}
