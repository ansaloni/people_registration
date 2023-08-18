<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'idade', 'email', 'sexo', 'senha'];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'pessoa_id');
    }
}
