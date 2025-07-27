<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Certificados - Sistema de Mestrado</title>
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
        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .stat-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            min-width: 120px;
            margin-bottom: 10px;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
        }
        .stat-label {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #1e40af;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .badge {
            display: inline-block;
            background-color: #dbeafe;
            color: #1e40af;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            margin: 1px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        .page-break {
            page-break-before: always;
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
        <p>Relatório de Certificados - Gerado em {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <div class="stats">
        <div class="stat-card">
            <div class="stat-number">{{ $titulos->count() }}</div>
            <div class="stat-label">Total de Títulos</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $titulos->where('orientadores')->count() }}</div>
            <div class="stat-label">Com Orientadores</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $titulos->where('bancas')->count() }}</div>
            <div class="stat-label">Com Bancas</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $titulos->where('orientados')->count() }}</div>
            <div class="stat-label">Com Orientados</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Orientadores</th>
                <th>Orientados</th>
                <th>Bancas</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @forelse($titulos as $titulo)
                <tr>
                    <td style="font-weight: bold;">{{ $titulo->dsc_titulo }}</td>
                    <td>
                        @if($titulo->orientadores->count() > 0)
                            @foreach($titulo->orientadores as $orientador)
                                <span class="badge">{{ $orientador->nome_orientador }}</span>
                            @endforeach
                        @else
                            <span style="color: #9ca3af;">Nenhum orientador</span>
                        @endif
                    </td>
                    <td>
                        @if($titulo->orientados->count() > 0)
                            @foreach($titulo->orientados as $orientado)
                                <span class="badge" style="background-color: #dcfce7; color: #166534;">{{ $orientado->nome_orientado }}</span>
                            @endforeach
                        @else
                            <span style="color: #9ca3af;">Nenhum orientado</span>
                        @endif
                    </td>
                    <td>
                                                        @if($titulo->bancasModel->count() > 0)
                                    <span class="badge" style="background-color: #fef3c7; color: #92400e;">{{ $titulo->bancasModel->count() }} banca(s)</span>
                        @else
                            <span style="color: #9ca3af;">Nenhuma banca</span>
                        @endif
                    </td>
                    <td>{{ $titulo->dt_inc->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #9ca3af;">Nenhum título encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Relatório gerado automaticamente pelo Sistema de Gestão de Certificados de Mestrado</p>
        <p>Página 1 de 1</p>
    </div>
</body>
</html> 