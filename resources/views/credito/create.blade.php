@extends('layouts.app')



@section('content')
    <div class="container">
        <form action="{{ route('credito.store') }}" method="post">
            <div class="calculator-amortization">
                
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h4 card-title mb-lg-0">Cálculo del programa de amortización</h1>
                            <div class="thirty form row" id="formPrestamoTabla">
                                <div class="col-md-3">
                                    <label for="">Tipo de créditom:</label>
                                    <select class="form-select js-choice" onchange="cambiarTAE(this);" name="tipo_credito" id="tipo_credito" required>
                                        @foreach ($tipo_creditos as $tc)
                                            <option {{ old('tipo_credito')==$tc->id?'selected':'' }} value="{{ $tc->id }}">{{ $tc->tasa_referencial }}%-{{ $tc->segmento }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail4" class="form-label">Día de pago</label>
                                    <input type="date" name="dia_pago" value="{{ old('dia_pago',Carbon\Carbon::today()->format('Y-m-d')) }}" id="fecha_pago" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputState" class="form-label">Socio</label>
                                    <select class="form-select js-choice" name="socio">
                                        @foreach ($usuarios as $user)
                                            <option {{ old('socio')==$user->id?'selected':'' }} value="{{ $user->id }}">{{ $user->cedula }} - {{ $user->apellidos_nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Procesar crédito</label>
                                    <button type="submit" class="btn btn-info btn-block btn-lg">Procesar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="seventy table-responsive">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Monto solicitado</th>
                                    <th>Pago mensual</th>
                                    <th>Número de pagos</th>
                                    <th>Total de pago</th>
                                    <th>Total de interes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><p id="monto_solicitado">0</p></td>
                                    <td><input type="hidden" required id="pago_mensual" name="pago_mensual" value="{{ old('pago_mensual') }}" /><p id="pago_mensual_txt">0</p></td>
                                    <td><input type="hidden" required id="numero_pagos" name="numero_pagos" value="{{ old('numero_pagos') }}" /><p id="numero_pagos_txt">0</p></td>
                                    <td><input type="hidden" required id="pagos_totales" name="total_pago" value="{{ old('total_pago') }}" /><p id="pagos_totales_txt">0</p></td>
                                    <td><input type="hidden" required id="interes_total" name="total_interes" value="{{ old('total_interes') }}" /><p id="interes_total_txt">0</p></td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="results"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                    </div>
                
            </div>
        </form>
    </div>

    
@endsection

@push('scripts')
    <script>
        
        var e = document.getElementById("tipo_credito");
        var option= e.options[e.selectedIndex];
        var datatae =$(option).text().split("%");
        var monto="{{ old('amount','0') }}"
        var interes=datatae[0];
        var plazo='12m';

        @if (old('amount'))  
                $('.amount').val("{{ old('amount') }}")
                monto="{{ old('amount') }}"
        @endif

        @if (old('term'))  
                $('.term').val("{{ old('term') }}")
                plazo="{{ old('term') }}"
        @endif

        moment.locale('es')
        $(".calculator-amortization").accrue({
                default_values: {
                    amount: monto,
                    rate: interes,
                    term: plazo
                },
                mode: "amortization",
                error_text: '',
                callback: function ( elem, data ){
                    $('#monto_solicitado').html(data.original_amount);
                    $('#pago_mensual').val(data.payment_amount_formatted);
                    $('#numero_pagos').val(data.num_payments);
                    $('#pagos_totales').val(data.total_payments_formatted);
                    $('#interes_total').val(data.total_interest_formatted);

                    
                    $('#pago_mensual_txt').html(data.payment_amount_formatted);
                    $('#numero_pagos_txt').html(data.num_payments);
                    $('#pagos_totales_txt').html(data.total_payments_formatted);
                    $('#interes_total_txt').html(data.total_interest_formatted);
                    
                }
            });

        function cambiarTAE(e){
            var splittae=$(e).text().split("%");
            interes=splittae[0];
            $('.rate').val(splittae[0])
        }
 
    </script>
@endpush


@prepend('scripts')
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('js/jquery.accrue.js') }}"></script>
@endprepend