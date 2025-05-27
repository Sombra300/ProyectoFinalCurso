<div class="container">
    <div class="container sticky-top" id="Menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href=""><img src="{{ asset('img/logoEquipo.jpeg') }}" alt="logo de la web" id="imgLogo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link"  href="{{route('index')}}">Mis personajes</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('characters.index')}}">Ver otros personajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('clases.index')}}">Clases</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('races.index')}}">Razas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('items.index')}}">Objetos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('spells.index')}}">Hechizos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('abilities.index')}}">Habilidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('lenguages.index')}}">Lenguajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('backgrounds.index')}}">Trasfondos</a>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->rol=='admin')
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('users.index')}}">Ver Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('clases.create')}}">Añadir Clase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('races.create')}}">Añadir Raza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('items.create')}}">Añadir Objeto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('spells.create')}}">Añadir Hechizo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('abilities.create')}}">Añadir Habilidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('lenguages.create')}}">Añadir Lenguaje</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('backgrounds.create')}}">Añadir Trasfondo</a>
                        </li>
                    @endif
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('users.account')}}">Cuenta</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('login')}}">Loguéate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('signup')}}">Regístrarte</a>
                </li>
            @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
