<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aluguel;

class Carro extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'placa',
        'marca',
        'ano',
        'preco_diaria',
        'descricao',
        'status',
    ];

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class);
    }
}
