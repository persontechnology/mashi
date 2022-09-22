 <!-- Main navbar START -->
 <div class="collapse navbar-collapse" id="navbarCollapse">

    <!-- Nav Search START -->
    
    <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
        <div class="nav-item w-100">
            <form class="rounded position-relative">
                <input class="form-control ps-5 bg-light" type="search" placeholder="Cédula o Apellidos y Nombres"
                    aria-label="Search">
                <button
                    class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y"
                    type="submit"><i class="bi bi-search fs-5"> </i></button>
            </form>
        </div>
    </div>
    
    <!-- Nav Search END -->

    <ul class="navbar-nav navbar-nav-scroll mx-auto">
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard')?'active':'' }}" href="{{ route('dashboard') }}">Inicio</a>
        </li>
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('credito*')?'active':'' }}" href="{{ route('credito.index') }}">crédito</a>
        </li>
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('socio*')?'active':'' }}" href="{{ route('socio.index') }}">Socios</a>
        </li>
        <!-- Nav item 1 Demos -->
        <li class="nav-item">
            <a class="nav-link" href="#">Ahorros</a>
        </li>
        <!-- Nav item 2 Pages -->
    </ul>
</div>
<!-- Main navbar END -->

<!-- Nav right START -->
<ul class="nav flex-nowrap align-items-center ms-lg-3 list-unstyled">


    <li class="nav-item dropdown ms-2">
        <a class="nav-link icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <span class="badge-notif animation-blink"></span>
            <i class="bi bi-bell-fill fs-6"> </i>
        </a>
        <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0"
            aria-labelledby="notifDropdown">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Notifications <span
                            class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
                    <a class="small" href="#">Clear all</a>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush list-unstyled p-2">
                        <!-- Notif item -->
                        <li>
                            <div
                                class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                <div class="avatar text-center d-none d-sm-inline-block">
                                    <img class="avatar-img rounded-circle"
                                        src="{{ asset('ui/assets/images/avatar/01.jpg') }}" alt="">
                                </div>
                                <div class="ms-sm-3">
                                    <div class=" d-flex">
                                        <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend
                                            request.</p>
                                        <p class="small ms-3 text-nowrap">Just now</p>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-sm py-1 btn-primary me-2">Accept
                                        </button>
                                        <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->
                        <li>
                            <div
                                class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
                                <div class="avatar text-center d-none d-sm-inline-block">
                                    <img class="avatar-img rounded-circle"
                                        src="{{ asset('ui/assets/images/avatar/02.jpg') }}" alt="">
                                </div>
                                <div class="ms-sm-3 d-flex">
                                    <div>
                                        <p class="small mb-2">Wish <b>Amanda Reed</b> a happy
                                            birthday (Nov 12)</p>
                                        <button class="btn btn-sm btn-outline-light py-1 me-2">Say happy
                                            birthday 🎂</button>
                                    </div>
                                    <p class="small ms-3">2min</p>
                                </div>
                            </div>
                        </li>
                        <!-- Notif item -->
                        <li>
                            <a href="#"
                                class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
                                <div class="avatar text-center d-none d-sm-inline-block">
                                    <div class="avatar-img rounded-circle bg-success"><span
                                            class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span>
                                    </div>
                                </div>
                                <div class="ms-sm-3">
                                    <div class="d-flex">
                                        <p class="small mb-2">Webestica has 15 like and 1 new
                                            activity</p>
                                        <p class="small ms-3">1hr</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- Notif item -->
                        <li>
                            <a href="#"
                                class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
                                <div class="avatar text-center d-none d-sm-inline-block">
                                    <img class="avatar-img rounded-circle"
                                        src="{{ asset('ui/assets/images/logo/12.svg') }}" alt="">
                                </div>
                                <div class="ms-sm-3 d-flex">
                                    <p class="small mb-2"><b>Bootstrap in the news:</b> The search
                                        giant’s parent company, Alphabet, just joined an exclusive club
                                        of tech stocks.</p>
                                    <p class="small ms-3">4hr</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
                </div>
            </div>
        </div>
    </li>


    <li class="nav-item ms-3 dropdown">
        <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button"
            data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img class="avatar-img rounded-2" src="{{ asset('ui/assets/images/avatar/07.jpg') }}"
                alt="">
        </a>
        <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3"
            aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3">
                <div class="d-flex align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                        <img class="avatar-img rounded-circle"
                            src="{{ asset('ui/assets/images/avatar/07.jpg') }}" alt="avatar">
                    </div>
                    <div>
                        <a class="h6 stretched-link" href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <p class="small m-0">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                </div>
                <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center"
                    href="my-profile.html">Ver perfil</a>
            </li>
            <!-- Links -->
            <li><a class="dropdown-item" href="settings.html"><i
                        class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
            <li>
                <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                    <i class="fa-fw bi bi-life-preserver me-2"></i>Support
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="docs/index.html" target="_blank">
                    <i class="fa-fw bi bi-card-text me-2"></i>Documentation
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item bg-danger-soft-hover"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-power fa-fw me-2"></i>Cerrar sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <!-- Dark mode switch START -->
            <li>
                <div class="modeswitch-wrap" id="darkModeSwitch">
                    <div class="modeswitch-item">
                        <div class="modeswitch-icon"></div>
                    </div>
                    <span>Modo oscuro</span>
                </div>
            </li>
            <!-- Dark mode switch END -->
        </ul>
    </li>
    <!-- Profile START -->

</ul>
<!-- Nav right END -->