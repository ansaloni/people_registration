<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLogradouro extends Model
{
    protected $table = 'tipo_logradouros';

    protected $fillable = ['tipo'];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'tipo_logradouros_id');
    }
}
