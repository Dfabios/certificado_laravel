<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orientador;
use App\Models\Titulo;
use App\Models\Orientado;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar orientadores
        $orientador1 = Orientador::create([
            'nome_orientador' => 'Dr. João Silva',
            'ativo' => true,
        ]);

        $orientador2 = Orientador::create([
            'nome_orientador' => 'Dra. Maria Santos',
            'ativo' => true,
        ]);

        $orientador3 = Orientador::create([
            'nome_orientador' => 'Dr. Carlos Oliveira',
            'ativo' => true,
        ]);

        // Criar orientados
        $orientado1 = Orientado::create([
            'nome_orientado' => 'Ana Costa',
            'ativo' => true,
        ]);

        $orientado2 = Orientado::create([
            'nome_orientado' => 'Pedro Lima',
            'ativo' => true,
        ]);

        $orientado3 = Orientado::create([
            'nome_orientado' => 'Lucia Ferreira',
            'ativo' => true,
        ]);

        // Criar títulos
        $titulo1 = Titulo::create([
            'dsc_titulo' => 'Análise de Algoritmos de Machine Learning para Detecção de Fraudes',
            'ativo' => true,
        ]);

        $titulo2 = Titulo::create([
            'dsc_titulo' => 'Desenvolvimento de Sistema de Gestão Escolar com Laravel',
            'ativo' => true,
        ]);

        $titulo3 = Titulo::create([
            'dsc_titulo' => 'Implementação de Blockchain para Rastreabilidade de Produtos',
            'ativo' => true,
        ]);

        // Associar orientadores aos títulos
        $titulo1->orientadores()->attach([$orientador1->id, $orientador2->id]);
        $titulo2->orientadores()->attach([$orientador1->id]);
        $titulo3->orientadores()->attach([$orientador3->id]);

        // Associar co-orientadores
        $titulo1->coOrientadores()->attach([$orientador3->id]);
        $titulo2->coOrientadores()->attach([$orientador2->id]);

        // Associar orientados aos títulos
        $titulo1->orientados()->attach([$orientado1->id]);
        $titulo2->orientados()->attach([$orientado2->id]);
        $titulo3->orientados()->attach([$orientado3->id]);
    }
}
