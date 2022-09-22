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
    <table class="table table-bordered table-striped table-sm">
        
        <tbody>
            <tr>
                <th>#</th>
                <th>Fecha de pago</th>
                <th>Monto de pago</th>
                <th>Interés total</th>
                <th>Pagos totales</th>
                <th>Saldo capital</th>
            </tr>
            @foreach ($credito->rubrosCredito as $rc)
                <tr class="{{ Carbon\Carbon::now()->gt($rc->fecha_pago)?'bg-warning':'' }}">
                    <td  class="text-center" scope="row">{{ $rc->numero_pago }}</td>
                    <td>
                        {{ $rc->fecha_pago_e }}
                    </td>
                    <td class="text-center">{{ $rc->monto_pago_m }}</td>
                    <td class="text-center">{{ $rc->interes_total_m }}</td>
                    <td class="text-center">{{ $rc->pago_total_m }}</td>
                    <td class="text-center">{{ $rc->saldo_capital_m }}</td>
                </tr>
                
            @endforeach
            
        </tbody>
    </table>
</div>