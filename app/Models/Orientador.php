<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientador extends Model
{
    use HasFactory;

    protected $table = 'orientadores';
    
    protected $fillable = [
        'nome_orientador',
        'foto',
        'dt_inc',
        'ativo'
    ];

    protected $casts = [
        'dt_inc' => 'datetime',
        'ativo' => 'boolean',
    ];

    /**
     * Get the orientador's photo URL.
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/orientadores/' . $this->foto);
        }
        return asset('images/default-avatar.svg');
    }

    /**
     * Get the orientador's initials for avatar.
     */
    public function getIniciaisAttribute()
    {
        $nomes = explode(' ', $this->nome_orientador);
        $iniciais = '';
        
        if (count($nomes) >= 2) {
            $iniciais = strtoupper(substr($nomes[0], 0, 1) . substr($nomes[count($nomes) - 1], 0, 1));
        } else {
            $iniciais = strtoupper(substr($this->nome_orientador, 0, 2));
        }
        
        return $iniciais;
    }

    // Relacionamento com títulos (orientador principal)
    public function titulos()
    {
        return $this->belongsToMany(Titulo::class, 'titulos_orientadores', 'id_orientadores', 'id_titulos')
                    ->wherePivot('ativo', true);
    }

    // Relacionamento com títulos (co-orientador)
    public function titulosCoOrientador()
    {
        return $this->belongsToMany(Titulo::class, 'titulos_co_orientadores', 'id_orientadores', 'id_titulos')
                    ->wherePivot('ativo', true);
    }

    // Relacionamento com bancas
    public function bancas()
    {
        return $this->belongsToMany(Titulo::class, 'bancas', 'id_orientadores', 'id_titulos')
                    ->withPivot('nr_banca')
                    ->wherePivot('ativo', true);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
