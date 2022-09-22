@extends('layouts.app')

@section('content')
    <!-- Book conference START -->
    <section class="bg-mode pt-0 pt-lg-5">
        <div class="container">
        <div class="row g-4 justify-content-between text-center">
            <div class="col-lg-5">
            <!-- Global conference START -->
            <!-- Image -->
            <img class="rounded img-fluid" width="150px" src="{{ asset('img/piggy-bank.svg') }}" alt="">
            <!-- Info -->
            <h3 class="mt-4"> {{ config('app.name','') }}</h3>
            <h5>{{ config('app.alias','') }}</h5>
            
            <p>
                Encaminémos juntos para lograr tus objetivos.
            </p>
            </div>
            <div class="col-lg-7">
            <!-- Book a conference START -->
            
            <div class="bg-light dashed p-4 rounded">
                <div class="row g-4 justify-content-between">
                <div class="col-sm-7">
                    <div class="row g-3">
                    <!-- Date -->
                    <div class="col-6">
                        <small>Fecha</small>
                        <h6>{{ Carbon\Carbon::now()->format('d M, Y') }}</h6>
                    </div>
                    <!-- Time -->
                    <div class="col-6">
                        <small>Tiempo</small>                       
                        <h6>{{ Carbon\Carbon::now()->format('g:i A') }}</h6>
                    </div>
                    <!-- Address -->
                    <div class="col-12">
                        <small>Ahorros</small>
                        <h6>ABRE TU CUENTA DE AHORRO ONLINE</h6>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-warning" href="#"><i class="bi bi-postcard pe-2"></i> Abrir cuenta </a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-5 text-center">
                    <div class="ticket-border">
                    <!-- QR code -->
                    <img class="w-200px mx-auto" src="{{ asset('img/angel.svg') }}" alt="">
                    <h5 class="mt-2"><strong>{{ config('app.name','') }}</strong> <br><sup><small>{{ config('app.alias','') }}</small>
                        </sup></h5>
                </div>
                </div>
                </div>
            </div>
            <!-- Book a conference END -->
            </div>
        </div>
        </div>
    </section>
    <!-- Book conference END -->

    <!-- Hero event START -->
    <section class="pt-3 pb-0 position-relative" style="background-image: url({{ asset('ui/assets/images/bg/07.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: top center;">
        <div class="bg-overlay bg-dark opacity-8"></div>
        <!-- Container START -->
        <div class="container">
            <div class="pt-5">
            <div class="row position-relative">
                <div class="col-xl-8 col-lg-10 mx-auto pt-sm-5 text-center">
                <!-- Title -->
                <h1 class="text-white">Nuestros servicios</h1>
                <p class="text-white">Creamos alianzas con entidades reconocidas que contribuyen a mejorar tu calida de vida.</p>
                
                </div>
                <div class="mb-n5 mt-3 mt-lg-5">
                <div class="col-xl-9 col-lg-11 mx-auto">
                    <!-- Category START -->
                    <div class="d-md-flex gap-3 mt-5">
                    <!-- Category item -->
                    <a href="#.!" class="card card-body mb-3 mb-lg-0 p-3 text-center">
                        <img class="h-40px mb-3" src="{{ asset('ui/assets/images/icon/badge-outline-filled.svg') }}" alt="">
                        <h6>Créditos rapidos</h6>
                        
                    </a>
                    <!-- Category item -->
                    <a href="#.!" class="card card-body mb-3 mb-lg-0 p-3 text-center">
                        <img class="h-40px mb-3" src="{{ asset('ui/assets/images/icon/clipboard-outline-filled.svg') }}" alt="">
                        <h6> Ahorros rentables</h6>
                        
                    </a>
                    <!-- Category item -->
                    <a href="#.!" class="card card-body mb-3 mb-lg-0 p-3 text-center">
                        <img class="h-40px mb-3" src="{{ asset('ui/assets/images/icon/home-outline-filled.svg') }}" alt="">
                        <h6>Inversión</h6>
                    </a>
                    </div>
                    <!-- Category END -->
                </div>
                </div>
            </div>
            </div>
        </div>
    </section> 
    <!-- Hero event END -->
    
    <section>
        <div class="row my-5">
            <div class="col-12">
                <!-- Video main feed -->
                <div class="rounded py-4 py-sm-5 overflow-hidden position-relative"
                    style="background-image:url({{ asseT('ui/assets/images/post/16by9/big/02.jpg') }}); background-position: center center; background-size: cover; background-repeat: no-repeat;">
                    <div class="bg-overlay bg-dark opacity-5"></div>
                    <div class="p-4 p-sm-5 position-relative">
                        
                        <h1 class="text-white">Educación Financiera</h1>
                        <p class="text-white">Comprometidos con nuestros socios y sus necesidades, creamos espacios de aprendizaje que promueven la construcción de una cultura justa y responsable.</p>
                        
                    </div>
                </div>
                <!-- Video main END -->
            </div>
        </div>
    </section>


    

    
    
@endsection