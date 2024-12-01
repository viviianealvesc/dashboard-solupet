<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_aplicacao',
        'quantidade',
        'numero_doses',
        'id_veterinario',
        'id_animal',
        'id_material',
        'id_dose',
    ];

    public function veterinario() {
        
        return $this->belongsTo(Veterinario::class);
 
    }

    public function material() {
        
        return $this->belongsTo(Material::class);
 
    }

    public function dose() {
        
        return $this->belongsTo(Dose::class);
 
    }
}
