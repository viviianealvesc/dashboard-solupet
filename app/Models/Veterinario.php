<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'crmv',
        'especialidade',
    ];

    public function prontuarios() {
        
        return $this->hasMany(Prontuario::class, 'id_prontuario');
 
    }

    public function aplicacoes() {
        
        return $this->hasMany(Aplicacao::class, 'id_aplicacao');
 
    }
}
