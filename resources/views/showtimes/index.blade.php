@extends('layouts.navbar-y-footer.app')

@section('title', 'Funciones — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    <style>
        .list-container {
            max-width: 1000px;
            margin: 3rem auto;
            padding: 1.5rem;
            background: rgba(30, 30, 40, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
        }
        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .list-title {
            color: #ffffff;
            font-family: 'Manrope', sans-serif;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-action {
            background: linear-gradient(135deg, #e50914 0%, #b80710 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }
        .btn-action:hover {
            opacity: 0.9;
            color: white;
        }
        .btn-edit {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.2s;
            margin-right: 0.5rem;
        }
        .btn-edit:hover {
            background: #ffc107;
            color: #1a1a1a;
        }
        .btn-delete {
            background: rgba(229, 9, 20, 0.15);
            color: #e50914;
            border: 1px solid rgba(229, 9, 20, 0.3);
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.2s;
        }
        .btn-delete:hover {
            background: #e50914;
            color: white;
        }
    </style>
@endpush

@section('content')
<div class="list-container">
    @if(session('success'))
        <div style="background: rgba(40, 167, 69, 0.15); border: 1px solid rgba(40, 167, 69, 0.3); color: #28a745; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="list-header">
        <h1 class="list-title">
            <i class="fas fa-clapperboard" style="color: #e50914;"></i> Funciones Programadas
        </h1>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.dashboard') }}" class="btn-action" style="background: rgba(255,255,255,0.05); color: #A0A0B0; border: 1px solid rgba(255,255,255,0.1);">
                <i class="fas fa-arrow-left"></i> Volver a Panel
            </a>
            <a href="{{ route('showtimes.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nueva Función
            </a>
        </div>
    </div>

    <div class="table-card" style="margin-top: 0;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Película</th>
                    <th>Sala</th>
                    <th>Fecha y Hora</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($showtimes as $s)
                <tr>
                    <td class="td-num">{{ $s->id }}</td>
                    <td><strong style="color: white;">{{ $s->movie->name ?? '—' }}</strong></td>
                    <td>{{ $s->theater->name ?? '—' }}</td>
                    <td>{{ $s->datetime->format('d/m/Y H:i') }}</td>
                    <td style="text-align: right; display: flex; justify-content: flex-end; align-items: center; gap: 0.5rem;">
                        <a href="{{ route('showtimes.edit', $s) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('showtimes.destroy', $s) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta función?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:2rem;color:#A0A0B0;">
                        No hay funciones registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
