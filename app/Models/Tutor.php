<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'endereco',
        'telefone',
        'email',
        'password',
    ];

    public function animais() {
        
        return $this->belongsToMany(Animal::class);
 
    }
}
