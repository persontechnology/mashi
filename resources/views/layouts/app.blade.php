<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Meta Tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/vendor/tiny-slider/dist/tiny-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/vendor/plyr/plyr.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/vendor/choices.js/public/assets/styles/choices.min.css') }}" />
    @stack('scriptsHeader')
    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('ui/assets/css/style.css') }}">
    <!-- Bootstrap JS -->
    <script src="{{ asset('ui/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        

</head>

<body>

    <div id="app">
        <header class="navbar-light fixed-top header-static bg-mode">

            <!-- Logo Nav START -->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo START -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="light-mode-item navbar-brand-item" src="{{ asset('img/logo/icono.png') }}" alt="logo">
                        <img class="dark-mode-item navbar-brand-item" src="{{ asset('img/logo/icono.png') }}" alt="logo">
                    </a>
                    <!-- Logo END -->

                    @hasSection ('sidebar')
                    <button class="icon-md btn btn-light p-0 d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarVerticaloffcanvas" aria-controls="navbarVerticaloffcanvas">
                        <i class="bi bi-justify-left fs-4"></i>
                 </button>

                    @endif

                    <!-- Responsive navbar toggler -->
                    <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-animation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    @auth
                        
                       @include('menus.auth')
                    @else
                        @include('menus.noauth')
                    @endauth

                    
                </div>
            </nav>
            <!-- Logo Nav END -->
        </header>

        <main>

            <!-- Container START -->
            <div class="container-fluid">

                <!-- Sidenav START -->
                @auth
                    @hasSection ('sidebar')
                        @section('sidebar')
                    @show
                @endif
                @endauth
                <!-- Sidenav END -->
                
                <!-- Main content START -->
                <div class="page-content">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has($msg))
                        <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 11">
                            <div class="toast align-items-center text-white bg-{{ $msg }}" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                <div class="toast-body">
                                {{ Session::get($msg) }}
                                </div>
                                <button type="button" class="btn-close me-2 m-auto bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                      <script>
                            var toastLiveExample = document.getElementById('liveToast')
                            var toast = new bootstrap.Toast(toastLiveExample)
                            toast.show()
                      </script>
                    @endif
                    @endforeach
                    
                    @if ($errors->any())
                    <div class="container">
                        <div class="alert alert-danger border-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <strong>{{ $error }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>
                        
                    @endif

                    @yield('content')
                    <!-- footer START -->
                    <footer class="card card-body mt-2">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <!-- Footer nav START -->
                                <ul class="nav lh-1">
                                    <li class="nav-item">
                                        <a class="nav-link ps-0" href="#">Nosotros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank"
                                            href="https://support.webestica.com/login">Soporte </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank" href="docs/index.html">Documentación </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="privacy-and-terms.html">Privavidad & terminos</a>
                                    </li>
                                </ul>
                                <!-- Footer nav START -->
                                <!-- Copyright START -->
                                <p class="mb-0 mt-4">©{{ date('Y') }} <a class="text-body" href="https://www.webestica.com"> <strong>{{ config('app.name') }}</strong> </a>Todos los derechos reservados</p>
                                <!-- Copyright END -->
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-md-end">
                                    <a href="#"><img class="h-50px"
                                            src="{{ asset('ui/assets/images/app-store.svg') }}" alt="app-store"></a>
                                    <a href="#"><img class="h-50px ms-2"
                                            src="{{ asset('ui/assets/images/google-play.svg') }}" alt="google-play"></a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- footer END -->
                </div>
                <!-- Main content END -->

            </div>
            <!-- Container END -->

        </main>
    </div>

    
    <!-- Vendors -->
    <script src="{{ asset('ui/assets/vendor/tiny-slider/dist/tiny-slider.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/plyr/plyr.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/glightbox-master/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('ui/assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    @stack('scripts')
    <!-- Template Functions -->
    <script src="{{ asset('ui/assets/js/functions.js') }}"></script>
   
</body>

</html>