<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    use HasFactory;

    protected $table = 'titulos';
    
    protected $fillable = [
        'dsc_titulo',
        'dt_inc',
        'ativo'
    ];

    protected $casts = [
        'dt_inc' => 'datetime',
        'ativo' => 'boolean',
    ];

    // Relacionamento com orientadores principais
    public function orientadores()
    {
        return $this->belongsToMany(Orientador::class, 'titulos_orientadores', 'id_titulos', 'id_orientadores')
                    ->wherePivot('ativo', true);
    }

    // Relacionamento com co-orientadores
    public function coOrientadores()
    {
        return $this->belongsToMany(Orientador::class, 'titulos_co_orientadores', 'id_titulos', 'id_orientadores')
                    ->wherePivot('ativo', true);
    }

    // Relacionamento com orientados
    public function orientados()
    {
        return $this->belongsToMany(Orientado::class, 'titulos_orientados', 'id_titulos', 'id_orientados')
                    ->wherePivot('ativo', true);
    }

    // Relacionamento com bancas (orientadores)
    public function bancas()
    {
        return $this->belongsToMany(Orientador::class, 'bancas', 'id_titulos', 'id_orientadores')
                    ->withPivot('nr_banca')
                    ->wherePivot('ativo', true);
    }

    // Relacionamento direto com bancas (modelo Banca)
    public function bancasModel()
    {
        return $this->hasMany(Banca::class, 'id_titulos')->where('bancas.ativo', true);
    }


}
