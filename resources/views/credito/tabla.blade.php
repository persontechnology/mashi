<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr><th class="text-center" colspan="4">TABLA DE PAGOS</th></tr>
        </thead>
        <tbody>
            <tr>
                <th>Socio</th>
                <td>{{ $credito->socio->apellidos_nombres }}</td>
                <th>Número de cuenta </th>
                <td>{{ $credito->socio->numero_cuenta }}</td>
            </tr>
            <tr>
                <th>Tipo de crédito</th>
                <td>{{ $credito->tipoCredito->segmento }}</td>
                <th>Número de crédito </th>
                <td>{{ $credito->numero }}</td>
            </tr>
            <tr>
                <th>Tasa interés</th>
                <td>{{ $credito->tasa_tae }} %</td>
                <th>Plazo </th>
                <td>{{ $credito->plazo }} {{ $credito->termino=='a'?'años':'meses' }}</td>
            </tr>
            <tr>
                <th>Día de pago</th>
                <td>{{ Carbon\Carbon::parse($credito->dia_pago)->format('d') }}</td>
                <th>Asesor de crédito </th>
                <td>{{ $credito->asesorCredito->apellidos_nombres }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Monto solicitado</th>
                <th>Pago mensual</th>
                <th>Número de pagos</th>
                <th>Total de pago	</th>
                <th>Total de interés</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $credito->monto_prestamo_m }}</td>
                <td>{{ $credito->pago_mensual_m }}</td>
                <td>{{ $credito->numero_pagos }}</td>
                <td>{{ $credito->total_pago_m }}</td>
                <td>{{ $credito->total_interes_m }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-sm text-center">
        
        <tbody>
            <tr>
                <th>#</th>
                <th>Fecha de pago</th>
                <th>Monto de pago</th>
                <th>Interés total</th>
                <th>Pagos totales</th>
                <th>Saldo capital</th>
                <th>Estado</th>
                <th>
                    <i class="bi bi-three-dots"></i>
                </th>
            </tr>
            @foreach ($credito->rubrosCredito as $rc)
                <tr>
                    <td  class="{{ $rc->color_estado_m }}" scope="row">{{ $rc->numero_pago }}</td>
                    <td>
                        {{ $rc->fecha_pago_e }}
                    </td>
                    <td>{{ $rc->monto_pago_m }}</td>
                    <td>{{ $rc->interes_total_m }}</td>
                    <td>{{ $rc->pago_total_m }}</td>
                    <td>{{ $rc->saldo_capital_m }}</td>
                    <td>
                        <p>
                            {{ $rc->estado }} <br>
                            @if ($rc->estado==='VENCIDO')
                            <small>${{ $rc->montoCobrarPagoRubroCreditos() }} por {{ \Carbon\Carbon::parse( $rc->fecha_pago )->diffInDays( Carbon\Carbon::today() ) }} días</small>
                            @endif
                        </p>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardNotiAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Card share action dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction">
                            <li><a class="dropdown-item" target="_blanck" href="{{ route('credito.cobrarRubro',$rc->id) }}"> <i class="bi bi-currency-dollar pe-2"></i>COBRAR</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                
            @endforeach
            
        </tbody>
    </table>
</div>