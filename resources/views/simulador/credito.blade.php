@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Cálculo del programa de amortización</p>
                <div class="hstack gap-2 gap-xl-3 justify-content-center">
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0" id="monto_solicitado">0</h6>
                        <small>Monto solicitado:</small>
                    </div>
                    <div class="vr"></div>
                    <div>
                      <h6 class="mb-0" id="pago_mensual">0</h6>
                      <small>Pago Mensual:</small>
                    </div>
                    <div class="vr"></div>
                    <!-- User stat item -->
                    <div>
                      <h6 class="mb-0" id="numero_pagos">0</h6>
                      <small>Número de Pagos:</small>
                    </div>
                    <!-- Divider -->
                    <div class="vr"></div>
                    <!-- User stat item -->
                    <div>
                      <h6 class="mb-0" id="pagos_totales">0</h6>
                      <small>Pagos Total:</small>
                    </div>
                    <div class="vr"></div>
                    <div>
                        <h6 class="mb-0" id="interes_total">0</h6>
                        <small>Interés Total:</small>
                      </div>
                  </div>
            </div>
            <div class="card-body">
                
                <div class="calculator-amortization">
                    <div class="thirty form" id="formPrestamoTabla">
                    </div>
                    <div class="seventy table-responsive">
                        <div class="results"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@push('scripts')
    <script>
        var monto='1000';;
        var interes='18.50';
        var plazo='12m';

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
                    $('#pago_mensual').html(data.payment_amount_formatted);
                    $('#numero_pagos').html(data.num_payments);
                    $('#pagos_totales').html(data.total_payments_formatted);
                    $('#interes_total').html(data.total_interest_formatted);
                }
            });
    </script>
@endpush


@prepend('scripts')
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('js/jquery.accrue.js') }}"></script>
@endprepend
