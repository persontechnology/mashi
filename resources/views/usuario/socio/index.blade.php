@extends('layouts.app')
@section('content')

<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
      <div class="row g-2">
        <div class="col-lg-2">
          <!-- Card title -->
          <h1 class="h4 card-title mb-lg-0">Socios</h1>
        </div>
        <div class="col-sm-6 col-lg-3 ms-lg-auto">
          <!-- Select Groups -->
          <select class="form-select js-choice choice-select-text-none" data-search-enabled="false">
            <option value="AB">Alphabetical</option>
            <option value="NG">Newest group</option>
            <option value="RA">Recently active</option>
            <option value="SG">Suggested</option>
          </select>
        </div>
          <div class="col-sm-6 col-lg-3">
          <!-- Button modal -->
          <a class="btn btn-primary-soft ms-auto w-100" href="{{ route('socio.create') }}"> <i class="fa-solid fa-plus pe-1"></i> Crear socio</a>
        </div>
      </div>
    </div>
    <!-- Card header START -->
    <!-- Card body START -->
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-sm table-striped table-bordered text-center">
              <thead>
                  <tr>
                      <th></th>
                      <th>Foto</th>
                      <th>Apellidos & Nombres</th>
                      <th># Cuenta</th>
                      <th>Cédula</th>
                      <th>Teléfono</th>
                      <th>Email</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($socios as $s)
                  <tr>
                    <td>
                      <div class="dropdown ms-auto">
                        <!-- Card share action menu -->
                        <a class="nav-link text-secondary mb-0" href="#" id="socioAcccion{{ $s->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="socioAcccion{{ $s->id }}">
                          

                          <li><a class="dropdown-item" href="{{ route('socio.show',$s->id) }}"> <i class="bi bi-person-lines-fill pe-2"></i>Detalle</a></li>
                          @can('update', $s)
                          <li><a class="dropdown-item" href="{{ route('socio.edit',$s->id) }}"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Editar</a></li>    
                          @endcan
                          
                        </ul>
                      </div>
                    </td>
                    <td scope="row">
                      @if (Storage::exists($s->foto))
                        <div class="avatar me-3 mb-3 mb-md-0">
                          <a href="#!"> <img class="avatar-img rounded-circle" src="{{ Storage::url($s->foto) }}" alt=""> </a>
                        </div>    
                      @endif
                      
                    </td>
                    <td>
                      {{ $s->apellidos_nombres }}
                    </td>
                    <td>{{ $s->numero_cuenta }}</td>
                    <td>{{ $s->cedula }}</td>
                    <td>{{ $s->celular }}</td>
                    <td>{{ $s->email }}</td>
                </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <!-- Card body END -->
</div>

@endsection

