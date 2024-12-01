<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'descricao_reduzida',
        'sigla',
        'numero_repeticoes',
    ];

    public function aplicacoes() {
        
        return $this->hasMany(Aplicacao::class);
 
    }

    public function material() {
        
        return $this->belongsTo(Material::class);
 
    }




}
