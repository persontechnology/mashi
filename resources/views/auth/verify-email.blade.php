@extends('layouts.app')
@section('content')
<x-auth-card>
    <x-slot name="logo">
        <h3 class="card-title">Verficar email</h3>
        <a href="/">
            <x-application-logo class="card-img-top" />
        </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success" role="alert">
            <strong class="text-success">{{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}</strong>
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-button>
                    {{ __('Reenviar correo electrónico de verificación') }}
                </x-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-warning my-1">
                {{ __('Cerrar sessión') }}
            </button>
        </form>
    </div>
</x-auth-card>

@endsection
