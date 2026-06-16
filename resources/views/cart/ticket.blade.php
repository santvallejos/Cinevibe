@extends('layouts.navbar-y-footer.app')

@section('title', 'Boleto Digital — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Ajuste de contenedor con margen superior para despejar el navbar fijo */
        .ticket-page {
            max-width: 500px;
            margin: 110px auto 4rem;
            padding: 0 1.5rem;
            text-align: center;
        }
        /* Contenedor del ticket en glassmorphism premium */
        .ticket-wrapper {
            background: rgba(30, 30, 40, 0.45);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.06);
            margin-bottom: 2.5rem;
            position: relative;
        }
        /* Cabecera del ticket */
        .ticket-header {
            background: linear-gradient(135deg, #e50914 0%, #900409 100%);
            padding: 1.5rem;
            color: white;
            font-family: 'Manrope', sans-serif;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .ticket-header h2 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        /* Cuerpo del ticket */
        .ticket-body {
            padding: 2.25rem 2rem;
            color: white;
            position: relative;
        }
        .ticket-movie-title {
            font-size: 1.8rem;
            font-family: 'Manrope', sans-serif;
            font-weight: 900;
            margin-top: 0;
            margin-bottom: 1.75rem;
            color: #fff;
            letter-spacing: -0.5px;
            line-height: 1.25;
        }
        /* Grid de información técnica */
        .ticket-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            text-align: left;
            margin-bottom: 2rem;
        }
        .ticket-info-item {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }
        .ticket-label {
            font-size: 0.7rem;
            color: #737373;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }
        .ticket-val {
            font-size: 1.1rem;
            font-weight: 600;
            color: #f8fafc;
        }
        /* Perforaciones a los costados del ticket */
        .ticket-divider {
            height: 20px;
            position: relative;
            background: transparent;
            margin: 1rem 0;
        }
        .ticket-divider::before, .ticket-divider::after {
            content: '';
            position: absolute;
            top: -10px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #131313; /* Coincide con el color de fondo general de la app */
            z-index: 2;
        }
        .ticket-divider::before {
            left: -10px;
        }
        .ticket-divider::after {
            right: -10px;
        }
        .ticket-divider-line {
            position: absolute;
            top: 9px;
            left: 15px;
            right: 15px;
            border-top: 1.5px dashed rgba(255, 255, 255, 0.12);
        }
        /* Sección de QR con indicador de escaneo interactivo */
        .ticket-qr-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 1.5rem;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 16px;
            padding: 1.75rem 1rem;
        }
        .ticket-qr-container {
            position: relative;
            display: inline-block;
            background: white;
            padding: 10px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            margin-bottom: 1.25rem;
            overflow: hidden;
        }
        .ticket-qr-img {
            display: block;
            width: 150px;
            height: 150px;
        }
        /* Línea de escaneo animada */
        .ticket-qr-scan-line {
            position: absolute;
            left: 10px;
            right: 10px;
            height: 2.5px;
            background: #e50914;
            box-shadow: 0 0 8px #e50914;
            animation: scan 2.5s ease-in-out infinite;
            opacity: 0.8;
            pointer-events: none;
        }
        @keyframes scan {
            0%, 100% { top: 10px; }
            50% { top: 160px; }
        }
        .ticket-code {
            font-family: 'DM Sans', 'Inter', monospace;
            font-size: 0.95rem;
            color: #F0C96A;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 0 0 10px rgba(240, 201, 106, 0.2);
        }
        /* Botones de acción */
        .ticket-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        .btn-ticket {
            background: linear-gradient(135deg, #e50914 0%, #b80710 100%);
            color: white;
            padding: 0.75rem 1.75rem;
            border-radius: 30px;
            border: none;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(229, 9, 20, 0.3);
        }
        .btn-ticket:hover {
            opacity: 0.95;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 9, 20, 0.45);
        }
        .btn-ticket-secondary {
            background: rgba(255,255,255,0.03);
            color: #A0A0B0;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: none;
        }
        .btn-ticket-secondary:hover {
            background: rgba(255,255,255,0.07);
            border-color: rgba(255,255,255,0.15);
            color: white;
            box-shadow: none;
        }

        /* Estilos de Impresión */
        @media print {
            body {
                background: white !important;
                color: black !important;
            }
            .nav-bar, footer, .ticket-actions {
                display: none !important;
            }
            .ticket-page {
                margin: 0;
                padding: 0;
                width: 100%;
                max-width: 100%;
            }
            .ticket-wrapper {
                background: white !important;
                color: black !important;
                border: 1px solid #ccc !important;
                box-shadow: none !important;
                margin: 20px auto;
                page-break-inside: avoid;
            }
            .ticket-header {
                background: #000 !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .ticket-body {
                color: black !important;
            }
            .ticket-movie-title {
                color: black !important;
            }
            .ticket-val {
                color: black !important;
            }
            .ticket-label {
                color: #555 !important;
            }
            .ticket-code {
                color: #000 !important;
            }
            .ticket-divider::before, .ticket-divider::after {
                background: white !important;
            }
            .ticket-qr-scan-line {
                display: none !important;
            }
            .ticket-qr-section {
                background: none !important;
                border: none !important;
            }
        }
    </style>
@endpush

@section('content')
<div class="ticket-page">
    <div class="ticket-wrapper">
        <div class="ticket-header">
            <h2><i class="fas fa-ticket-alt"></i> CineVibe Entrada</h2>
        </div>
        <div class="ticket-body">
            <h3 class="ticket-movie-title">{{ $ticket->showtime->movie->name ?? $ticket->movie }}</h3>
            
            <div class="ticket-grid">
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="fas fa-video" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Sala</span>
                    <span class="ticket-val">{{ $ticket->theater->name ?? 'Sala' }}</span>
                </div>
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="fas fa-couch" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Butaca</span>
                    <span class="ticket-val">Butaca {{ $ticket->amchair }}</span>
                </div>
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="far fa-calendar-alt" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Fecha</span>
                    <span class="ticket-val">{{ $ticket->showtime ? $ticket->showtime->datetime->format('d/m/Y') : '—' }}</span>
                </div>
                <div class="ticket-info-item">
                    <span class="ticket-label"><i class="far fa-clock" style="font-size:0.75rem; margin-right:2px; opacity:0.7;"></i> Hora</span>
                    <span class="ticket-val">{{ $ticket->showtime ? $ticket->showtime->datetime->format('H:i') : '—' }}</span>
                </div>
            </div>

            <div class="ticket-divider">
                <div class="ticket-divider-line"></div>
            </div>

            <div class="ticket-qr-section">
                <div class="ticket-qr-container">
                    <div class="ticket-qr-scan-line"></div>
                    <img class="ticket-qr-img" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('tickets.show', $ticket)) }}" alt="Código QR Entrada">
                </div>
                <span class="ticket-label">ID de Entrada</span>
                <span class="ticket-code">{{ strtoupper(substr($ticket->id, 0, 8)) }}</span>
            </div>
        </div>
    </div>

    <div class="ticket-actions">
        <a href="{{ route('purchase.history') }}" class="btn-ticket btn-ticket-secondary">
            <i class="fas fa-arrow-left"></i> Volver al historial
        </a>
        <button onclick="window.print()" class="btn-ticket">
            <i class="fas fa-print"></i> Imprimir Boleto
        </button>
    </div>
</div>
@endsection
