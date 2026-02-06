<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carro;
use App\Models\User;

class Aluguel extends Model
{
    use HasFactory;
    protected $fillable = [
    'usuario_id',
    'carro_id',
    'data_inicio',
    'data_final_prevista',
    'data_final_entregue',
    'status',
];
public function carro()
    {
        return $this->belongsTo(Carro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
 
}
