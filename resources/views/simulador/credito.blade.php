@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="row g-2">
                  <div class="col-lg-2">
                    <!-- Card title -->
                    <h1 class="h4 card-title mb-lg-0">Group</h1>
                  </div>
                  <div class="col-sm-6 col-lg-3 ms-lg-auto">
                    <!-- Select Groups -->
                    <select class="form-select" id="socios">
                      <option value="AB">Alphabetical</option>
                      <option value="NG">Newest group</option>
                      <option value="RA">Recently active</option>
                      <option value="SG">Suggested</option>
                    </select>
                  </div>
                    <div class="col-sm-6 col-lg-3">
                    <!-- Button modal -->
                    <a class="btn btn-primary-soft ms-auto w-100" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateGroup"> <i class="fa-solid fa-plus pe-1"></i> Create group</a>
                  </div>
                </div>
              </div>
              <!-- Card header START -->

            <div class="card-header">
                <p class="card-title">Cálculo del programa de amortización</p>
                
            </div>
            <div class="card-body">
                
                <div class="calculator-amortization">
                    <div class="thirty form row" id="formPrestamoTabla">
                    </div>
                    <div class="seventy table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Monto solicitado</th>
                            <th>Pago mensual</th>
                            <th>Número de pagos</th>
                            <th>Pagos totales</th>
                            <th>Interes total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td id="monto_solicitado">0</td>
                            <td id="pago_mensual">0</td>
                            <td id="numero_pagos">0</td>
                            <td id="pagos_totales">0</td>
                            <td id="interes_total">0</td>
                          </tr>
                        </tbody>
                      </table>
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
        var monto='10000';;
        var interes='35.07';
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