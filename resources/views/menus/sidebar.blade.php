<div class="navbar navbar-vertical navbar-light">
    <div class="offcanvas offcanvas-start custom-scrollbar rounded pt-3" tabindex="-1" id="navbarVerticaloffcanvas">
        <div class="offcanvas-body pt-5 pt-lg-0">
            <!-- Card START -->

            <!-- Avatar -->
            <div class="avatar avatar-lg mb-3">
                <a href="#!">
                    @if (Storage::exists($socio->foto))
                        <img class="avatar-img rounded-circle border border-white border-3" src="{{ Storage::url($socio->foto) }}" alt="">
                    @else
                        <img id="avatar-preview" class="avatar-img rounded-circle border border-white border-3 shadow-sm" src="{{ asset('ui/assets/images/avatar/placeholder.jpg') }}" alt="">
                    @endif
                </a>
            </div>
            <!-- Info -->
            <h5 class="mb-0"> <a href="#!">{{ $socio->apellidos_nombres }} </a> </h5>
            <small>{{ $socio->cedula }}</small>
            <!-- User stat START -->
            <div class="hstack gap-2 gap-xl-3 mt-3">
                <!-- User stat item -->
                <div>
                    <h6 class="mb-0">256</h6>
                    <small>DEPOSITOS</small>
                </div>
                <!-- Divider -->
                <div class="vr"></div>
                <!-- User stat item -->
                <div>
                    <h6 class="mb-0">2.5K</h6>
                    <small>CRÉDITOS</small>
                </div>
                <!-- Divider -->
                <div class="vr"></div>
                <!-- User stat item -->
                <div>
                    <h6 class="mb-0">365</h6>
                    <small>AHORROS</small>
                </div>
            </div>
            <!-- User stat END -->

            <!-- Divider -->
            <hr>

            <!-- Side Nav START -->
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link active" href="#!"> 
                        <img class="me-2 h-20px fa-fw" src="{{ asset('ui/assets/images/icon/home-outline-filled.svg') }}" alt="">
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> 
                        <img class="me-2 h-20px fa-fw" src="{{ asset('ui/assets/images/icon/medal-outline-filled.svg') }}" alt="">
                        <span>Nuevo crédito</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> 
                        <img class="me-2 h-20px fa-fw" src="{{ asset('ui/assets/images/icon/clock-outline-filled.svg') }}" alt=""><span>Listado de créditos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <img class="me-2 h-20px fa-fw"
                            src="{{ asset('ui/assets/images/icon/like-outline-filled.svg') }}"
                            alt=""><span>Subscriptions
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <img class="me-2 h-20px fa-fw"
                            src="{{ asset('ui/assets/images/icon/star-outline-filled.svg') }}" alt=""><span>My
                            favorites
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <img class="me-2 h-20px fa-fw"
                            src="{{ asset('ui/assets/images/icon/task-done-outline-filled') }}.svg"
                            alt=""><span>Wishlist
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <img class="me-2 h-20px fa-fw"
                            src="{{ asset('ui/assets/images/icon/notification-outlined-filled.svg') }}"
                            alt=""><span>Notifications </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <img class="me-2 h-20px fa-fw"
                            src="{{ asset('ui/assets/images/icon/cog-outline-filled.svg') }}" alt=""><span>Settings
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <img class="me-2 h-20px fa-fw"
                            src="{{ asset('ui/assets/images/icon/arrow-boxed-outline-filled.svg') }}"
                            alt=""><span>Logout
                        </span></a>
                </li>
            </ul>
            <!-- Side Nav END -->
        </div>
    </div>
</div>
