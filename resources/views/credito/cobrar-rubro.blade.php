@extends('layouts.app')

{{-- @section('sidebar')
    @parent
    @include('menus.sidebar')
@endsection --}}

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <p>
                <strong>Socio:</strong> {{ $rubroCredito->credito->socio->apellidos_nombres }} 
                <br>
                <strong>C.I:</strong> {{ $rubroCredito->credito->socio->cedula }}
            </p> 
            <p>
                <strong>Número de pago:</strong> {{ $rubroCredito->numero_pago }}
                <br>
                <strong>Fecha de pago:</strong> {{ $rubroCredito->fecha_pago_e }}
                <br>
                <strong>Saldo pendiente:</strong> {{ $rubroCredito->montoCobrarPagoRubroCreditos() }}
            </p>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ route('credito.guardarCobrarRubro') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $rubroCredito->id }}">
                <!-- Social Links START -->
                <div class="col-12">
                  <h5 class="card-title mb-0">Realizar cobro</h5>
                </div>
                <!-- Facebook -->
                <div class="col-12">
                  <label  class="form-label">Ingrese valor</label>
                  <div class="input-group">
                    <span class="input-group-text border-0"> <i class="bi bi-currency-dollar"></i> </span>
                    <input type="text" name="valor" class="form-control" placeholder="0.00" value="{{ old('valor') }}" required>
                  </div>
                </div>
                <!-- Button  -->
                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-primary mb-0">Cobrar</button>
                </div>
              </form>
              <hr>
              <div class="col-12">
                <h5 class="card-title mb-0">COBROS REALIZADOS</h5>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Cajero</th>
                            <th>
                                <i class="bi bi-three-dots"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rubroCredito->listadoPagoRubroCreditos as $prc)
                        <tr>
                            <td scope="row">
                                {{ $prc->created_at }}
                            </td>
                            <td>
                                {{ $prc->valor }}
                            </td>
                            <td>
                                {{ $prc->cajero->apellidos_nombres }}
                            </td>
                            <td>
                                <a href="{{ route('credito.pdfCobrarRubro',$prc->id) }}" target="_blanck" class="btn btn-primary-soft btn-sm mt-1 mt-md-0"> <i class="bi bi-printer-fill"></i> Imprimir</a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                TOTAL
                            </th>
                            <td>
                                {{ $rubroCredito->totalPagoRubroCredito() }}
                            </td>
                            <td colspan="2">

                            </td>
                        </tr>
                    </tfoot>
                </table>
              </div>
        </div>
    </div>
</div>


@endsection