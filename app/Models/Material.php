<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'tipo_material',
        'numero_repeticoes',
    ];

    public function prontuarios() {
        
        return $this->belongsToMany(Prontuario::class, 'prontuario_materiais');
 
    }

    public function aplicacoes() {
        
        return $this->hasMany(Aplicacao::class);
 
    }

}
