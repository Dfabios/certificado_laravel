<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    use HasFactory;

    protected $table = 'bancas';
    
    protected $fillable = [
        'ativo',
        'id_orientadores',
        'id_titulos',
        'nr_banca'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    // Relacionamento com orientador
    public function orientador()
    {
        return $this->belongsTo(Orientador::class, 'id_orientadores');
    }

    // Relacionamento com título
    public function titulo()
    {
        return $this->belongsTo(Titulo::class, 'id_titulos');
    }
} 