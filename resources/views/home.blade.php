<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Red Estudiantil UGB</title>
  <link rel="stylesheet" href="style.css"/>
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

<style>
    body {
        background-color: #f9f9f9;
    }

    .card {
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.02);
    }

    h2 {
        font-weight: bold;
        color: #343a40;
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
  <main class="container">
  <div class="container my-4">
    <h2 class="mb-4">Objetos Perdidos / Encontrados</h2>
    <div id="objetos-lista" class="row g-4"></div> <!-- ID corregido -->
  </div>
</main>


  <footer class="text-center mt-5 text-muted">
    <small>&copy; 2025 Red Estudiantil UGB. Todos los derechos reservados.</small>
  </footer>
 

<script>
document.addEventListener('DOMContentLoaded', () => {
  fetch('/objetos')

        .then(response => response.json())
        .then(data => {
            const lista = document.getElementById('objetos-lista'); // Nuevo ID aquí
            lista.innerHTML = ''; // Limpiar antes de cargar

            data.forEach(obj => {
                const card = document.createElement('div');
                card.className = 'col-md-4';

                card.innerHTML = `
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">${obj.titulo}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">${obj.tipo === 'perdido' ? '🔴 Perdido' : '🟢 Encontrado'}</h6>
                            <p class="card-text">${obj.descripcion}</p>
                            <small class="text-muted">${obj.ubicacion}</small>
                        </div>
                    </div>
                `;

                lista.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error al cargar los objetos:', error);
        });
});

</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
