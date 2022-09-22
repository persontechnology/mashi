<div class="col-sm-6">
    <label for="apellidos" class="form-label">Apellidos<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-person-fill"></i>
        </span>
        <input type="text" value="{{ old('apellidos', $socio->apellidos ?? '') }}" placeholder="Ingrese apellidos."
            name="apellidos" id="apellidos" class="form-control @error('apellidos') is-invalid @enderror" required
            autofocus>
        @error('apellidos')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="nombres" class="form-label">Nombres<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-person-fill"></i>
        </span>
        <input type="text" value="{{ old('nombres', $socio->nombres ?? '') }}" placeholder="Ingrese nombres."
            name="nombres" id="nombres" class="form-control @error('nombres') is-invalid @enderror" required>
        @error('nombres')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-sm-6 col-lg-4">
    <label for="cedula" class="form-label">Cédula<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-credit-card-fill"></i>
        </span>
        <input type="number" value="{{ old('cedula', $socio->cedula ?? '') }}" placeholder="Ingrese cédula."
            name="cedula" id="cedula" class="form-control @error('cedula') is-invalid @enderror" required>
        @error('cedula')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="sexo" class="form-label">Sexo<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-people-fill"></i>
        </span>
        <select name="sexo" id="sexo" class="form-select @error('sexo') is-invalid @enderror" required>
            <option value="Hombre" {{ old('sexo', $socio->sexo ?? '') == 'Hombre' ? 'selected' : '' }}> Hombre
            </option>
            <option value="Mujer" {{ old('sexo', $socio->sexo ?? '') == 'Mujer' ? 'selected' : '' }}>Mujer</option>
        </select>
        @error('sexo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="celular" class="form-label">Celular<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-phone-fill"></i>
        </span>
        <input type="tel" value="{{ old('celular', $socio->celular ?? '') }}" placeholder="Ingrese celular."
            name="celular" id="celular" class="form-control @error('celular') is-invalid @enderror" required>
        @error('celular')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-sm-6 col-lg-4">
    <label for="provincia" class="form-label">Provincia<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-geo-alt-fill"></i>
        </span>
        <input type="text" value="{{ old('provincia', $socio->provincia ?? '') }}" placeholder="Ingrese provincia."
            name="provincia" id="provincia" class="form-control @error('provincia') is-invalid @enderror" required>
        @error('provincia')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="canton" class="form-label">Cantón<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-geo-fill"></i>
        </span>
        <input type="text" value="{{ old('canton', $socio->canton ?? '') }}" placeholder="Ingrese cantón."
            name="canton" id="canton" class="form-control @error('canton') is-invalid @enderror" required>
        @error('canton')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="parroquia" class="form-label">Parroquía<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-map-fill"></i>
        </span>
        <input type="text" value="{{ old('parroquia', $socio->parroquia ?? '') }}" placeholder="Ingrese parroquia."
            name="parroquia" id="parroquia" class="form-control @error('parroquia') is-invalid @enderror" required>
        @error('parroquia')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="recinto" class="form-label">Recinto, referencia<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-compass-fill"></i>
        </span>
        <input type="text" value="{{ old('recinto', $socio->recinto ?? '') }}" placeholder="Ingrese recinto."
            name="recinto" id="recinto" class="form-control @error('recinto') is-invalid @enderror" required>
        @error('recinto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="direccion" class="form-label">Dirección<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-signpost-2-fill"></i>
        </span>
        <input type="text" value="{{ old('direccion', $socio->direccion ?? '') }}" placeholder="Ingrese dirección."
            name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" required>
        @error('direccion')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="nacionalidad" class="form-label">Nacionalidad<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-person-heart"></i>
        </span>
        <input type="text" value="{{ old('nacionalidad', $socio->nacionalidad ?? '') }}"
            placeholder="Ingrese nacionalidad." name="nacionalidad" id="nacionalidad"
            class="form-control @error('nacionalidad') is-invalid @enderror" required>
        @error('nacionalidad')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="estado_civil" class="form-label">Estado civil<i class="text-danger">*</i></label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-person-lines-fill"></i>
        </span>

        <select name="estado_civil" id="estado_civil" class="form-select @error('estado_civil') is-invalid @enderror"
            required>
            <option value="Soltero"
                {{ old('estado_civil', $socio->estado_civil ?? '') == 'Soltero' ? 'selected' : '' }}>
                Soltero</option>
            <option value="Casado"
                {{ old('estado_civil', $socio->estado_civil ?? '') == 'Casado' ? 'selected' : '' }}>Casado
            </option>
            <option value="Divorciado"
                {{ old('estado_civil', $socio->estado_civil ?? '') == 'Divorciado' ? 'selected' : '' }}>Divorciado
            </option>
            <option value="Viuido"
                {{ old('estado_civil', $socio->estado_civil ?? '') == 'Viuido' ? 'selected' : '' }}>Viuido
            </option>
            <option value="Unión libre"
                {{ old('estado_civil', $socio->estado_civil ?? '') == 'Unión libre' ? 'selected' : '' }}>Unión libre
            </option>
        </select>
        @error('estado_civil')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="email" class="form-label">Email</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-envelope-fill"></i>
        </span>
        <input type="text" value="{{ old('email', $socio->email ?? '') }}" placeholder="Ingrese email." name="email"
            id="email" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <label for="telefono" class="form-label">Teléfono</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-telephone-fill"></i>
        </span>
        <input type="text" value="{{ old('telefono', $socio->telefono ?? '') }}" placeholder="Ingrese teléfono."
            name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror">
        @error('telefono')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="lugar_nacimiento" class="form-label">Lugar nacimiento</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-signpost-2-fill"></i>
        </span>
        <input type="text" value="{{ old('lugar_nacimiento', $socio->lugar_nacimiento ?? '') }}"
            placeholder="Ingrese lugar nacimiento." name="lugar_nacimiento" id="lugar_nacimiento"
            class="form-control @error('lugar_nacimiento') is-invalid @enderror">
        @error('lugar_nacimiento')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-calendar-date-fill"></i>
        </span>
        <input type="date" value="{{ old('fecha_nacimiento', $socio->fecha_nacimiento ?? '') }}"
            placeholder="Ingrese fecha nacimiento." name="fecha_nacimiento" id="fecha_nacimiento"
            class="form-control @error('fecha_nacimiento') is-invalid @enderror">
        @error('fecha_nacimiento')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="foto" class="form-label">Foto</label>
    <div class="d-flex align-items-center">
        <div class="avatar-uploader me-3">
            <div class="avatar-edit">
                <input type="file" name="foto" id="foto" accept="image/*" class="@error('foto') is-invalid @enderror"/>
                <label for="foto"></label>
                @error('foto')
                <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="avatar avatar-xl position-relative">
                @if (Storage::exists($socio->foto ?? ''))
                    <img id="avatar-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ Storage::url($socio->foto) }}" alt="">
                @else
                    <img id="avatar-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ asset('ui/assets/images/avatar/placeholder.jpg') }}" alt="">
                @endif
                
            </div>
        </div>
        <div class="avatar-remove">
            <button type="button" id="avatar-reset-img" class="btn btn-light">Quitar</button>
        </div>
    </div>

</div>

<div class="col-12">
    <h5 class="card-title mb-0">Datos del conyuge</h5>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="nombre_conyuge" class="form-label">Nombre</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-person-hearts"></i>
        </span>
        <input type="text" value="{{ old('nombre_conyuge', $socio->nombre_conyuge ?? '') }}"
            placeholder="Ingrese nombre conyuge." name="nombre_conyuge" id="nombre_conyuge"
            class="form-control @error('nombre_conyuge') is-invalid @enderror">
        @error('nombre_conyuge')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="cedula_conyuge" class="form-label">Cédula</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-card-heading"></i>
        </span>
        <input type="text" value="{{ old('cedula_conyuge', $socio->cedula_conyuge ?? '') }}"
            placeholder="Ingrese cédula conyuge." name="cedula_conyuge" id="cedula_conyuge"
            class="form-control @error('cedula_conyuge') is-invalid @enderror">
        @error('cedula_conyuge')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="col-sm-6 col-lg-4">
    <label for="celular_conyuge" class="form-label">Celular</label>
    <div class="input-group">
        <span class="input-group-text border-0">
            <i class="bi bi-phone-fill"></i>
        </span>
        <input type="text" value="{{ old('celular_conyuge', $socio->celular_conyuge ?? '') }}"
            placeholder="Ingrese celular conyuge." name="celular_conyuge" id="celular_conyuge"
            class="form-control @error('celular_conyuge') is-invalid @enderror">
        @error('celular_conyuge')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
