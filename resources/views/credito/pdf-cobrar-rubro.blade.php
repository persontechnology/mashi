
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'PAGO CREDITO-'.$rubroCredito->numero_pago.' '.$socio->apellidos_nombres.'.pdf' }}</title>
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ public_path('ui/assets/css/style.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-6">
            <div class="card mx-2 border-dark border-2" style="background-color:#eff2f6">
              
              <div class="card-body">
                <h4 class="card-title">{{ $socio->apellidos_nombres }}</h4>
                <p class="card-text">C.I./RUC: {{ $socio->cedula }}</p>
                <p class="card-text">{{ $socio->direccion }}</p>
                <p class="card-text">{{ $socio->celular }}</p>
                <h1>Pago #: {{ $rubroCredito->numero_pago }}</h1>
              </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border border-dark border-2 mx-2">
              <div class="card-body">
                <h4 class="card-title">Fecha pago de crédito</h4>
                <p class="card-text">{{ $rubroCredito->fecha_pago_e }}</p>
                <h4 class="card-title">Fecha factura</h4>
                <p class="card-text">{{ $pagoRubroCredito->created_at }}</p>
                <h1> Valor: {{ $credito->pago_mensual_m }}</h1>
              </div>
            </div>
        </div>
    </div>
    <div class="mt-3 mx-2">
        <div class="card border border-dark border-2" style="background-color:#eff2f6;">
            <p class="mx-2 mb-0 pb-0">
                Asesor:
                <strong>{{ $credito->asesorCredito->apellidos_nombres }}</strong>
            </p>
        </div>

        <table class="table table-bordered table-inverse table-responsive mt-3 border border-dark">
            <thead class="thead-inverse">
                <tr style="background-color:#eff2f6;">
                    <th colspan="3">DETALLE</th>
                </tr>
                <tr>
                    <th>FECHA</th>
                    <th>DESCRIPCIÓN</th>
                    <th>VALOR</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">
                            {{ $pagoRubroCredito->created_at }}
                        </td>
                        <td>
                            <p>Pago de crédito # {{ $rubroCredito->numero_pago }} de {{ $rubroCredito->fecha_pago_e }}</p>
                        </td>
                        <td>
                            <p>$ {{ $pagoRubroCredito->valor }}</p>
                        </td>
                    </tr>
                </tbody>
        </table>
    </div>
    
    
    
</body>
</html>