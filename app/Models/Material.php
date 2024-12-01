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
        'id_dose',
    ];

    public function prontuarios() {
        
        return $this->belongsToMany(Prontuario::class, 'prontuario_materiais');
 
    }

    public function aplicacoes() {
        
        return $this->hasMany(Aplicacao::class);
 
    }

    public function doses() {
        
        return $this->hasMany(Dose::class);
 
    }
}