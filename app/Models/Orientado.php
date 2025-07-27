<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientado extends Model
{
    use HasFactory;

    protected $table = 'orientados';
    
    protected $fillable = [
        'nome_orientado',
        'dt_inc',
        'ativo'
    ];

    protected $casts = [
        'dt_inc' => 'datetime',
        'ativo' => 'boolean',
    ];

    // Relacionamento com títulos
    public function titulos()
    {
        return $this->belongsToMany(Titulo::class, 'titulos_orientados', 'id_orientados', 'id_titulos')
                    ->wherePivot('ativo', true);
    }
}
