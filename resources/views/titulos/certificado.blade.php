<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Mestrado - {{ $titulo->dsc_titulo }}</title>
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none !important; }
        }
        
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .certificate-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border: 3px solid #1e40af;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            position: relative;
        }
        
        .certificate-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .certificate-header::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 10px;
        }
        
        .university-logo {
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        .university-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .certificate-title {
            font-size: 18px;
            opacity: 0.9;
            font-style: italic;
        }
        
        .certificate-body {
            padding: 40px;
            text-align: center;
            position: relative;
        }
        
        .certificate-body::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            pointer-events: none;
        }
        
        .certificate-text {
            font-size: 16px;
            line-height: 1.8;
            color: #374151;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }
        
        .work-title {
            font-size: 20px;
            font-weight: bold;
            color: #1e40af;
            margin: 20px 0;
            padding: 15px;
            background: #f8fafc;
            border-left: 4px solid #1e40af;
            border-radius: 5px;
        }
        
        .participants-section {
            margin: 30px 0;
            text-align: left;
        }
        
        .participants-title {
            font-size: 18px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .participant-group {
            margin-bottom: 20px;
        }
        
        .participant-label {
            font-weight: bold;
            color: #374151;
            margin-bottom: 5px;
        }
        
        .participant-names {
            color: #6b7280;
            font-style: italic;
        }
        
        .certificate-footer {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 2px solid #e5e7eb;
        }
        
        .signature-section {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .signature-box {
            text-align: center;
            margin: 10px;
            min-width: 150px;
        }
        
        .signature-line {
            width: 150px;
            height: 2px;
            background: #1e40af;
            margin: 10px auto;
        }
        
        .signature-name {
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }
        
        .signature-title {
            font-size: 12px;
            color: #6b7280;
        }
        
        .certificate-date {
            font-size: 14px;
            color: #6b7280;
            margin-top: 20px;
        }
        
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #1e40af;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .print-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }
        
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 120px;
            color: rgba(30, 64, 175, 0.05);
            font-weight: bold;
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button no-print">
        🖨️ Imprimir Certificado
    </button>
    
    <div class="certificate-container">
        <div class="watermark">CERTIFICADO</div>
        
        <div class="certificate-header">
            <div class="university-logo">🎓</div>
            <div class="university-name">Universidade Federal</div>
            <div class="certificate-title">Programa de Pós-Graduação em Mestrado</div>
        </div>
        
        <div class="certificate-body">
            <div class="certificate-text">
                Certificamos que o trabalho de pesquisa intitulado:
            </div>
            
            <div class="work-title">
                "{{ $titulo->dsc_titulo }}"
            </div>
            
            <div class="certificate-text">
                foi desenvolvido e apresentado com sucesso, demonstrando excelência acadêmica 
                e contribuição significativa para o campo de conhecimento.
            </div>
            
            <div class="participants-section">
                <div class="participants-title">Participantes do Trabalho</div>
                
                @if($titulo->orientadores->count() > 0)
                <div class="participant-group">
                    <div class="participant-label">Orientador(es):</div>
                    <div class="participant-names">
                        @foreach($titulo->orientadores as $orientador)
                            {{ $orientador->nome_orientador }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                </div>
                @endif
                
                @if($titulo->coOrientadores->count() > 0)
                <div class="participant-group">
                    <div class="participant-label">Co-Orientador(es):</div>
                    <div class="participant-names">
                        @foreach($titulo->coOrientadores as $coOrientador)
                            {{ $coOrientador->nome_orientador }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                </div>
                @endif
                
                @if($titulo->orientados->count() > 0)
                <div class="participant-group">
                    <div class="participant-label">Orientado(s):</div>
                    <div class="participant-names">
                        @foreach($titulo->orientados as $orientado)
                            {{ $orientado->nome_orientado }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <div class="signature-section">
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-name">Coordenador do Programa</div>
                    <div class="signature-title">Mestrado</div>
                </div>
                
                @if($titulo->orientadores->count() > 0)
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-name">{{ $titulo->orientadores->first()->nome_orientador }}</div>
                    <div class="signature-title">Orientador</div>
                </div>
                @endif
                
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-name">Diretor da Universidade</div>
                    <div class="signature-title">Universidade Federal</div>
                </div>
            </div>
        </div>
        
        <div class="certificate-footer">
            <div class="certificate-date">
                Data de Conclusão: {{ $titulo->dt_inc->format('d/m/Y') }}
            </div>
            <div style="margin-top: 10px; font-size: 12px; color: #9ca3af;">
                Certificado gerado automaticamente pelo Sistema de Gestão de Certificados de Mestrado
            </div>
        </div>
    </div>
</body>
</html> 