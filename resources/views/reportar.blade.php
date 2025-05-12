<!-- resources/views/reportar.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportar | Red Estudiantil UGB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .nav-link {
            color: #0d6efd;
            transition: 0.3s ease;
        }
        .nav-link:hover {
            color: #0a58ca;
            text-decoration: underline;
        }
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            margin-bottom: 2rem;
        }
        .logout-form {
            display: inline;
        }
        .logout-button {
            background: none;
            border: none;
            color: #0d6efd;
            padding: 0;
            font-size: 1rem;
        }
        .logout-button:hover {
            color: #0a58ca;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <nav class="container">
        <ul class="nav justify-content-between align-items-center">
            <div class="d-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reportar') }}"><i class="bi bi-flag-fill"></i> Reportar</a>
                </li>
            </div>
            <div class="d-flex align-items-center">
                <!-- Perfil -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}"><i class="bi bi-person-circle"></i> Perfil</a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="logout-form ms-3">
                        @csrf
                        <button type="submit" class="logout-button"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</button>
                    </form>
                </li>
            </div>
        </ul>
    </nav>
</header>

<main>
    <div class="container text-center mt-5">
        <h1>Sección de Reportes</h1>
        <p class="text-muted">Desde aquí puedes reportar objetos perdidos o encontrados.</p>
    </div>

    <div class="container my-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <h2 class="mb-4">Reportar Objeto Perdido o Encontrado</h2>
        <form method="POST" action="{{ route('reportar-objeto') }}">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="perdido" {{ old('tipo') == 'perdido' ? 'selected' : '' }}>🔴 Perdido</option>
                    <option value="encontrado" {{ old('tipo') == 'encontrado' ? 'selected' : '' }}>🟢 Encontrado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Reportar Objeto</button>
            <a href="/" class="btn btn-secondary ms-2">Volver al Inicio</a>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
