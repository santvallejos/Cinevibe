@extends('layouts.navbar-y-footer.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Contacto — CineVibe</title>

    {{-- Font Awesome para los íconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- CSS del panel admin --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    
    <style>
        .message-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: border-color 0.2s;
            position: relative;
        }
        .message-card.unread {
            border-left: 4px solid #e50914 !important;
            background: rgba(229, 9, 20, 0.02);
        }
        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding-bottom: 0.75rem;
            margin-bottom: 0.75rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .message-sender {
            display: flex;
            flex-direction: column;
        }
        .message-sender-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
        }
        .message-sender-email {
            font-size: 0.85rem;
            color: #A0A0B0;
        }
        .message-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.85rem;
            color: #A0A0B0;
        }
        .message-subject {
            font-weight: 700;
            color: #ffb4aa;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }
        .message-body {
            color: #e2e8f0;
            font-size: 0.95rem;
            line-height: 1.5;
            white-space: pre-wrap;
        }
        .btn-read-toggle {
            background: rgba(229, 9, 20, 0.15);
            border: 1px solid rgba(229, 9, 20, 0.3);
            color: #ffb4aa;
            padding: 0.35rem 0.85rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }
        .btn-read-toggle:hover {
            background: #e50914;
            color: #fff;
        }
        .badge-read-status {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }
        .badge-unread {
            background: rgba(229, 9, 20, 0.15);
            color: #ff8585;
            border: 1px solid rgba(229, 9, 20, 0.3);
        }
        .badge-read {
            background: rgba(255, 255, 255, 0.05);
            color: #a0aec0;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .nav-admin-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 0.5rem;
        }
        .nav-admin-tab {
            color: #A0A0B0;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .nav-admin-tab:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
        }
        .nav-admin-tab.active {
            color: #fff;
            background: rgba(229, 9, 20, 0.15);
            border: 1px solid rgba(229, 9, 20, 0.3);
        }
    </style>
</head>
<body>

<div class="hero-banner">
    <h1>🎬 CineVibe</h1>
    <p>La mejor experiencia cinematográfica de la ciudad</p>
</div>

<div class="panel-container">
    <div class="panel-header">
        <h2 class="panel-title">Bandeja de Consultas de Usuarios</h2>
        <span class="badge-rol badge-admin">Admin</span>
    </div>

    {{-- Navegación Interna de Admin --}}
    <div class="nav-admin-tabs">
        <a href="{{ route('admin.dashboard') }}" class="nav-admin-tab"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="nav-admin-tab"><i class="fas fa-film"></i> Películas</a>
        <a href="{{ route('theaters.index') }}" class="nav-admin-tab"><i class="fas fa-door-open"></i> Salas</a>
        <a href="{{ route('showtimes.index') }}" class="nav-admin-tab"><i class="fas fa-clapperboard"></i> Funciones</a>
        <a href="{{ route('admin.users.index') }}" class="nav-admin-tab"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('admin.sales.index') }}" class="nav-admin-tab"><i class="fas fa-receipt"></i> Ventas</a>
        <a href="{{ route('admin.messages.index') }}" class="nav-admin-tab active"><i class="fas fa-envelope"></i> Consultas</a>
    </div>

    @if(session('success'))
        <div class="alert alert--success" style="background: rgba(34, 197, 94, 0.15); border: 1px solid rgba(34, 197, 94, 0.4); color: #86efac; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Bandeja de Mensajes --}}
    <div>
        @if($messages->isEmpty())
            <div style="text-align: center; padding: 4rem; color: #A0A0B0; background: rgba(255, 255, 255, 0.01); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px;">
                <i class="fas fa-envelope-open" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                <p>No hay mensajes ni consultas en la bandeja de entrada.</p>
            </div>
        @else
            @foreach($messages as $message)
                <div class="message-card {{ $message->is_read ? '' : 'unread' }}">
                    <div class="message-header">
                        <div class="message-sender">
                            <span class="message-sender-name">{{ $message->name }}</span>
                            <span class="message-sender-email">
                                <i class="fas fa-envelope" style="font-size: 0.8rem; margin-right: 0.25rem;"></i>{{ $message->email }}
                            </span>
                        </div>
                        <div class="message-meta">
                            <span class="badge-read-status {{ $message->is_read ? 'badge-read' : 'badge-unread' }}">
                                {{ $message->is_read ? 'Leído' : 'No Leído' }}
                            </span>
                            <span>
                                <i class="far fa-clock" style="margin-right: 0.25rem;"></i>{{ $message->created_at->format('d/m/Y H:i') }}
                            </span>
                            
                            @if(!$message->is_read)
                                <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" style="margin: 0; display: inline;">
                                    @csrf
                                    <button type="submit" class="btn-read-toggle">
                                        <i class="fas fa-check"></i> Marcar leído
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="message-subject">Asunto: {{ $message->subject }}</div>
                    <div class="message-body">{{ $message->message }}</div>
                </div>
            @endforeach
        @endif
    </div>
</div>

</body>
</html>
