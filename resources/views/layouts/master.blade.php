<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea 3</title>
    {{-- BootsTrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">
</head>
<body>
    @guest
    @else
    <nav class="navbar navbar-expand-lg ps-3 navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ route('inicio') }}">Arrendatron</a>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                @if (Auth::user()->rol === "Admin")
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('usuarios.create') }}">Crear</a>
                        <a class="dropdown-item" href="{{ route('usuarios.index') }}">Listar</a>
                    </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false">Tipos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('tipos.create') }}">Crear</a>
                            <a class="dropdown-item" href="{{ route('tipos.index') }}">Listar</a>
                        </div>
                    </li>

                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false">Vehículos</a>
                        <div class="dropdown-menu">
                            @if (Auth::user()->rol === 'Admin')
                            <a class="dropdown-item" href="{{ route('vehiculos.create') }}">Crear</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('vehiculos.index') }}">Listar</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false">Arriendos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('arriendos.create') }}">Crear</a>
                            <a class="dropdown-item" href="{{ route('arriendos.index') }}">Listar</a>
                        </div>
                    </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false">Clientes</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('clientes.create') }}">Crear</a>
                        <a class="dropdown-item" href="{{ route('clientes.index') }}">Listar</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                    <div class="dropdown-menu">
                        <form action="{{ route('usuarios.logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">Cerrar sesion</button>
                        </form>
                        <a class="dropdown-item" href="{{ route('home.password') }}">Cambiar Contraseña</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Hola: {{ Auth::user()->nombre." ".Auth::user()->apellido }}, Estás conectado como: {{ Auth::user()->rol }}</a>
                </li>
            </ul>
        </div>
    </nav>
    @endguest
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
{{-- Iconos --}}
    <script src="https://kit.fontawesome.com/840a79b414.js" crossorigin="anonymous"></script>
    {{-- BootsTrap --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </html>
