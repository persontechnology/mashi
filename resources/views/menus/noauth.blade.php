<!-- Main navbar START -->
<div class="collapse navbar-collapse" id="navbarCollapse">

    <ul class="navbar-nav navbar-nav-scroll mx-auto">
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">Inicio</a>
        </li>
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link" href="#">Nosotros</a>
        </li>
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link" href="#">Servicios</a>
        </li>
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link" href="#">Contactos</a>
        </li>
        <!-- Nav item 2 Pages -->
        <li class="nav-item">
            <div class="modeswitch-wrap nav-link" id="darkModeSwitch">
                <div class="modeswitch-item">
                    <div class="modeswitch-icon"></div>
                </div>
                <span>Modo oscuro</span>
            </div>
        </li>
    </ul>
</div>
<!-- Main navbar END -->
<!-- Nav right START -->
<div class="ms-3 ms-lg-auto">
    <a class="btn btn-warning" href="{{ route('login') }}"> Ingresar </a>
</div>
<!-- Nav right END -->