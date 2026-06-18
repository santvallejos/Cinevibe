@extends('layouts.navbar-y-footer.app')

@section('title', 'Mensajes de Contacto — CineVibe')

@push('styles')
    {{-- Font Awesome para los íconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- CSS del panel admin --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
@endpush

@section('content')

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
@endsection
