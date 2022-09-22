@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('socio.destroy',$socio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
    
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h1 class="h4 card-title mb-0">Detalle socio <strong class="text-danger">{{ $socio->numero_cuenta }}</strong></h1>
            </div>
            <fieldset disabled>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $socio->id }}">
                        @include('usuario.socio.datos',['socio'=>$socio])
                        <div class="col-sm-6 col-lg-4">
                            <label for="estado" class="form-label">estado</label>
                            <div class="input-group">
                                <span class="input-group-text border-0">
                                    <i class="bi bi-lightbulb-fill"></i>
                                </span>
                                <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                                    <option value="1" {{ old('estado',$socio->estado??'')===1?'selected':'' }}>Activo</option>
                                    <option value="0" {{ old('estado',$socio->estado??'')===0?'selected':'' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    

                </div>
            </fieldset>
            @can('delete', $socio)
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-danger mb-0">Eliminar socio</button>
                </div>    
            @endcan
            
        </div>
    
    </form>
</div>
@endsection
