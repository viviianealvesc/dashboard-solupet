<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'peso',
        'altura',
        'idade',
        'id_especie',
        'id_raca',
        'id_tutor',
    ];

    public function raca() {
        
       return $this->belongsTo(Raca::class, 'id_raca');

    }

    public function especie() {
        return $this->belongsTo(Especie::class, 'id_especie');
    }

    
   public function tutors() {
        return $this->belongsToMany(Tutor::class, 'animal_tutor', 'animal_id', 'tutor_id');
    }

    public function prontuarios() {
        return $this->hasMany(Prontuario::class, 'id_animal');
    }
}
