@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row g-4">
            <!-- Main content START -->
            <div class="col-lg-8 mx-auto">
                <!-- Card START -->
                <div class="card">
                    <div class="card-header py-3 border-0 d-flex align-items-center justify-content-between">
                        <h1 class="h5 mb-0">Créditos</h1>
                        <!-- Notification action START -->
                        <div class="dropdown">
                            <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardNotiAction"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction">
                                <li><a class="dropdown-item" href="{{ route('credito.create') }}"> <i class="bi bi-check-lg fa-fw pe-2"></i>Nuevo</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Push
                                        notifications </a></li>
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Email
                                        notifications </a></li>
                            </ul>
                        </div>
                        <!-- Notification action END -->
                    </div>
                    <div class="card-body p-2">

                        <ul class="list-unstyled">
                            @foreach ($creditos as $credito)
                                <li>
                                    <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative border-top">
                                        <!-- Avatar -->
                                        <div class="avatar text-center">
                                            @if (Storage::exists($credito->socio->foto))
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ Storage::url($credito->socio->foto) }}" alt="">
                                            @else
                                                <div class="avatar-img rounded-circle bg-success">
                                                    <span
                                                        class="text-white position-absolute top-50 start-50 translate-middle fw-bold">
                                                        {{ Str::limit($credito->socio->apellidos_nombres, 2, '') }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Info -->
                                        <div class="mx-sm-3 my-2 my-sm-0">
                                            <p class="small mb-0"><b>{{ $credito->socio->apellidos_nombres }}:</b>
                                                #{{ $credito->socio->cedula }}</p>
                                            <p class="small mb-0"><strong>Número de crédito:</strong>
                                                {{ $credito->numero }}</p>
                                            <p class="small mb-0"><strong>Monto solicitado:</strong>
                                                {{ $credito->monto_prestamo_m }}</p>
                                            <p class="small mb-0"><strong>Día de pago:</strong>
                                                {{ $credito->dia_pago }}</p>
                                            <a class="btn btn-link btn-sm" href="{{ route('credito.show',$credito) }}"> <u> Acceder al crédito </u></a>
                                        </div>
                                        <!-- Action -->
                                        <div class="d-flex ms-auto">
                                            <p class="small me-5 text-nowrap">5hrs</p>
                                            <!-- Notification action START -->
                                            <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                                                <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2"
                                                    id="cardNotiAction8" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <!-- Card share action dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="cardNotiAction8">
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy
                                                            Nguyen
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <!-- Notification action END -->
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="card-footer border-0 py-3 text-center position-relative d-grid pt-0">
                        <!-- Load more button START -->
                        <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button"
                            aria-pressed="true">
                            <span class="load-text"> Load more notifications </span>
                            <div class="load-icon">
                                <div class="spinner-grow spinner-grow-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </a>
                        <!-- Load more button END -->
                    </div>
                </div>
                <!-- Card END -->
            </div>
        </div> <!-- Row END -->
    </div>
@endsection
