<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // 👇 INFORMAR A TABELA CORRETA
    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'email',
        'password',
        'disponibilidade', // 👈 TROCAR status por disponibilidade
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class, 'usuario_id');
    }
}
