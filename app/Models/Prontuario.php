<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'diagnostico',
        'motivoConsulta',
        'sinaisClinicos',
        'prescricao',
        'procedimentosRealizados',
        'observacoes',
        'id_veterinario',
        'id_animal',
    ];

    public function animal() {
        return $this->belongsTo(Animal::class, 'id_animal');
    }

    public function veterinario() {
        return $this->belongsTo(Veterinario::class, 'id_veterinario');
    }

    public function materiais() {
        
        return $this->belongsToMany(Material::class, 'prontuario_materiais');
 
    }
}
