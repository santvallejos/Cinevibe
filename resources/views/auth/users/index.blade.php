@extends('layouts.navbar-y-footer.app')

@section('title', 'Gestionar Usuarios — CineVibe')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/pages/admin.css') }}">
    <style>
        .list-container {
            max-width: 1100px;
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
            flex-wrap: wrap;
            gap: 1rem;
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
        .filter-form {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .filter-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            padding: 0.5rem 1rem;
            color: white;
            outline: none;
            font-size: 0.9rem;
        }
        .filter-input:focus {
            border-color: #e50914;
        }
        .rol-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: bold;
        }
        .rol-admin {
            background: rgba(229, 9, 20, 0.15);
            color: #e50914;
            border: 1px solid rgba(229, 9, 20, 0.3);
        }
        .rol-cliente {
            background: rgba(40, 167, 69, 0.15);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
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
    @if(session('error'))
        <div style="background: rgba(229, 9, 20, 0.15); border: 1px solid rgba(229, 9, 20, 0.3); color: #e50914; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="list-header">
        <h1 class="list-title">
            <i class="fas fa-users" style="color: #e50914;"></i> Gestión de Usuarios
        </h1>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.dashboard') }}" class="btn-action" style="background: rgba(255,255,255,0.05); color: #A0A0B0; border: 1px solid rgba(255,255,255,0.1);">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <a href="{{ route('admin.users.create') }}" class="btn-action">
                <i class="fas fa-plus"></i> Nuevo Usuario
            </a>
        </div>
    </div>

    {{-- Filtros y Búsqueda --}}
    <form action="{{ route('admin.users.index') }}" method="GET" class="filter-form">
        <input type="text" name="search" placeholder="Buscar por nombre o email..." value="{{ request('search') }}" class="filter-input" style="flex-grow: 1; min-width: 200px;">
        
        <select name="role" class="filter-input">
            <option value="">Todos los Roles</option>
            @foreach($roles as $r)
                <option value="{{ $r->id }}" {{ request('role') == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn-action" style="padding: 0.5rem 1.25rem;">
            <i class="fas fa-search"></i> Filtrar
        </button>
        @if(request()->anyFilled(['search', 'role']))
            <a href="{{ route('admin.users.index') }}" class="btn-action" style="background: rgba(255,255,255,0.1); color: white; border: none; padding: 0.5rem 1.25rem;">
                Limpiar
            </a>
        @endif
    </form>

    <div class="table-card" style="margin-top: 0;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                <tr>
                    <td class="td-num">{{ $u->id }}</td>
                    <td><strong style="color: white;">{{ $u->name }}</strong></td>
                    <td style="color: #A0A0B0;">{{ $u->email }}</td>
                    <td>
                        @if($u->rol_id == 1)
                            <span class="rol-badge rol-admin">Admin</span>
                        @else
                            <span class="rol-badge rol-cliente">Cliente</span>
                        @endif
                    </td>
                    <td style="color: #A0A0B0;">{{ $u->created_at->format('d/m/Y H:i') }}</td>
                    <td style="text-align: right; display: flex; justify-content: flex-end; gap: 0.5rem;">
                        <a href="{{ route('admin.users.edit', $u) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        @if($u->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar a este usuario?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:2rem;color:#A0A0B0;">
                        No se encontraron usuarios.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
