<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Estatísticas - Sistema de Mestrado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: white;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #1e40af;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            color: #6b7280;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        .stat-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 12px;
            color: #6b7280;
        }
        .blue { color: #1e40af; }
        .green { color: #166534; }
        .purple { color: #7c3aed; }
        .yellow { color: #92400e; }
        .section {
            margin-bottom: 30px;
        }
        .section h2 {
            color: #1e40af;
            font-size: 18px;
            margin-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #1e40af;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .progress-bar {
            width: 100%;
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background-color: #1e40af;
            border-radius: 4px;
        }
        .alert {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 12px;
        }
        .alert-warning {
            background-color: #fef3c7;
            border: 1px solid #f59e0b;
            color: #92400e;
        }
        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #ef4444;
            color: #991b1b;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media print {
            body {
                margin: 0;
                padding: 15px;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistema de Gestão de Certificados de Mestrado</h1>
        <p>Relatório de Estatísticas - Gerado em {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <!-- Estatísticas Gerais -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number blue">{{ $totalOrientadores }}</div>
            <div class="stat-label">Orientadores</div>
        </div>
        <div class="stat-card">
            <div class="stat-number green">{{ $totalTitulos }}</div>
            <div class="stat-label">Títulos</div>
        </div>
        <div class="stat-card">
            <div class="stat-number purple">{{ $totalOrientados }}</div>
            <div class="stat-label">Orientados</div>
        </div>
        <div class="stat-card">
            <div class="stat-number yellow">{{ $totalBancas }}</div>
            <div class="stat-label">Bancas</div>
        </div>
    </div>

    <!-- Alertas -->
    <div class="section">
        <h2>Status do Sistema</h2>
        @if($titulosSemOrientadores > 0)
            <div class="alert alert-danger">
                ⚠️ {{ $titulosSemOrientadores }} título(s) sem orientadores
            </div>
        @endif
        @if($titulosSemBancas > 0)
            <div class="alert alert-warning">
                ⚠️ {{ $titulosSemBancas }} título(s) sem bancas
            </div>
        @endif
        @if($titulosSemOrientadores == 0 && $titulosSemBancas == 0)
            <div class="alert" style="background-color: #dcfce7; border: 1px solid #22c55e; color: #166534;">
                ✅ Sistema em conformidade
            </div>
        @endif
    </div>

    <!-- Orientadores Mais Ativos -->
    <div class="section">
        <h2>Orientadores Mais Ativos</h2>
        <table>
            <thead>
                <tr>
                    <th>Orientador</th>
                    <th>Quantidade de Títulos</th>
                    <th>Percentual</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orientadoresMaisAtivos as $orientador)
                    @php
                        $percentual = $totalTitulos > 0 ? ($orientador->titulos_count / $totalTitulos) * 100 : 0;
                    @endphp
                    <tr>
                        <td style="font-weight: bold;">{{ $orientador->nome_orientador }}</td>
                        <td>{{ $orientador->titulos_count }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <span>{{ number_format($percentual, 1) }}%</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $percentual }}%;"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: #9ca3af;">Nenhum orientador encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Títulos por Mês -->
    <div class="section">
        <h2>Títulos por Mês (Últimos 12 meses)</h2>
        <table>
            <thead>
                <tr>
                    <th>Mês/Ano</th>
                    <th>Quantidade</th>
                    <th>Percentual</th>
                </tr>
            </thead>
            <tbody>
                @forelse($titulosPorMes as $item)
                    @php
                        $meses = [
                            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
                            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
                            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
                        ];
                        $mesNome = $meses[$item->mes] ?? 'Desconhecido';
                        $maxTitulos = $titulosPorMes->max('total');
                        $percentual = $maxTitulos > 0 ? ($item->total / $maxTitulos) * 100 : 0;
                    @endphp
                    <tr>
                        <td style="font-weight: bold;">{{ $mesNome }}/{{ $item->ano }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <span>{{ number_format($percentual, 1) }}%</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $percentual }}%;"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: #9ca3af;">Nenhum dado encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Resumo Executivo -->
    <div class="section">
        <h2>Resumo Executivo</h2>
        <div style="background-color: #f8fafc; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
            <p style="margin: 0 0 10px 0; font-size: 14px;">
                <strong>Total de Registros:</strong> {{ $totalOrientadores + $totalTitulos + $totalOrientados + $totalBancas }}
            </p>
            <p style="margin: 0 0 10px 0; font-size: 14px;">
                <strong>Taxa de Completude:</strong> 
                @php
                    $totalCompleto = $totalTitulos - $titulosSemOrientadores - $titulosSemBancas;
                    $taxaCompletude = $totalTitulos > 0 ? ($totalCompleto / $totalTitulos) * 100 : 0;
                @endphp
                {{ number_format($taxaCompletude, 1) }}%
            </p>
            <p style="margin: 0; font-size: 14px;">
                <strong>Média de Títulos por Orientador:</strong> 
                @php
                    $mediaTitulos = $totalOrientadores > 0 ? $totalTitulos / $totalOrientadores : 0;
                @endphp
                {{ number_format($mediaTitulos, 1) }}
            </p>
        </div>
    </div>

    <div class="footer">
        <p>Relatório gerado automaticamente pelo Sistema de Gestão de Certificados de Mestrado</p>
        <p>Página 1 de 1</p>
    </div>
</body>
</html> 