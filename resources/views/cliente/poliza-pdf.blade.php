<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Historial Médico - {{ $cliente->name ?? 'Cliente' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #111518;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #dbe1e6;
            padding-bottom: 10px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 16px;
            color: #60768a;
        }
        .section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #dbe1e6;
            border-radius: 10px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 15px;
        }
        .info-label {
            font-size: 14px;
            color: #60768a;
        }
        .info-value {
            font-size: 14px;
            font-weight: 500;
        }
        .status-active {
            display: inline-block;
            padding: 5px 10px;
            background-color: #d1fae5;
            color: #065f46;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-expired {
            display: inline-block;
            padding: 5px 10px;
            background-color: #fee2e2;
            color: #b91c1c;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-canceled {
            display: inline-block;
            padding: 5px 10px;
            background-color: #f3f4f6;
            color: #4b5563;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #f9fafb;
            color: #60768a;
            font-size: 12px;
            font-weight: 500;
            text-align: left;
            padding: 8px;
        }
        td {
            padding: 8px;
            border-top: 1px solid #dbe1e6;
            font-size: 12px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #60768a;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Historial Médico Digital</div>
        <div class="subtitle">Cliente: {{ $cliente->name ?? 'Nombre del Cliente' }}</div>
    </div>
    
    <!-- Información del cliente -->
    <div class="section">
        <div class="section-title">Información Personal</div>
        <div class="info-grid">
            <div>
                <div class="info-label">Nombre completo:</div>
                <div class="info-value">{{ $cliente->name ?? 'Nombre del Cliente' }}</div>
            </div>
            <div>
                <div class="info-label">DNI:</div>
                <div class="info-value">{{ $cliente->dni ?? '12345678' }}</div>
            </div>
            <div>
                <div class="info-label">Teléfono:</div>
                <div class="info-value">{{ $cliente->telefono ?? '987654321' }}</div>
            </div>
            <div>
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $cliente->email ?? 'cliente@example.com' }}</div>
            </div>
        </div>
    </div>
    
    <!-- Pólizas de salud -->
    <div class="section-title">Pólizas de Salud</div>
    
    @forelse($historial->polizas as $poliza)
    <div class="section">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="section-title" style="margin-bottom: 0;">{{ ucfirst($poliza->tipo_seguro) }}</div>
            @if($poliza->estado == 'activo')
                <div class="status-active">Activo</div>
            @elseif($poliza->estado == 'vencido')
                <div class="status-expired">Vencido</div>
            @elseif($poliza->estado == 'cancelado')
                <div class="status-canceled">Cancelado</div>
            @endif
        </div>
        
        <div class="info-grid">
            <div>
                <div class="info-label">Número de póliza:</div>
                <div class="info-value">{{ $poliza->numero_poliza }}</div>
            </div>
            <div>
                <div class="info-label">Fecha de contratación:</div>
                <div class="info-value">{{ $poliza->fecha_contratacion->format('d/m/Y') }}</div>
            </div>
            <div>
                <div class="info-label">Fecha de vencimiento:</div>
                <div class="info-value">{{ $poliza->fecha_vencimiento->format('d/m/Y') }}</div>
            </div>
            <div>
                <div class="info-label">Prima anual:</div>
                <div class="info-value">S/. {{ number_format($poliza->prima_anual, 2) }}</div>
            </div>
        </div>
        
        <div class="section-title" style="font-size: 16px;">Coberturas</div>
        <ul>
            @forelse($poliza->coberturas as $cobertura)
                <li>{{ $cobertura->nombre }}: {{ $cobertura->limite }}</li>
            @empty
                <li>No hay coberturas registradas para esta póliza</li>
            @endforelse
        </ul>
        
        <div class="section-title" style="font-size: 16px;">Historial de atenciones</div>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Centro médico</th>
                    <th>Diagnóstico</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @forelse($poliza->atenciones as $atencion)
                <tr>
                    <td>{{ $atencion->fecha->format('d/m/Y') }}</td>
                    <td>{{ $atencion->tipo }}</td>
                    <td>{{ $atencion->centro_medico }}</td>
                    <td>{{ $atencion->diagnostico }}</td>
                    <td>S/. {{ number_format($atencion->monto, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No hay atenciones médicas registradas para esta póliza</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @empty
    <div class="section">
        <p style="text-align: center;">No hay pólizas registradas para este cliente</p>
    </div>
    @endforelse
    
    <div class="footer">
        <p>Documento generado el {{ date('d/m/Y H:i:s') }}</p>
        <p>IB Seguros - Todos los derechos reservados</p>
    </div>
</body>
</html>