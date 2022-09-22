@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('socio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h1 class="h4 card-title mb-0">Crear socio <strong class="text-danger">{{ $numero_cuenta_siguente }}</strong></h1>
                <span>Campos obligatorios marcados con <i class="text-danger">*</i></span>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('usuario.socio.datos')
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary mb-0">Crear socio</button>
            </div>
        </div>
    </form>
</div>
@endsection
