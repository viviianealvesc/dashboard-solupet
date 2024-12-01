<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome_raca',
        'id_especie',
    ];

    public function especie() {
        return $this->belongsTo(Especie::class, 'id_especie');
    }

    public function animais() {
        return $this->hasMany(Animal::class, 'id_raca');
    }
}
