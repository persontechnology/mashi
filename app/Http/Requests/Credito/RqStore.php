<?php

namespace App\Http\Requests\Credito;

use Illuminate\Foundation\Http\FormRequest;
use Elegant\Sanitizer\Laravel\SanitizesInput;
class RqStore extends FormRequest
{
    use SanitizesInput;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        return [
            'tipo_credito'=>'required|exists:tipo_creditos,id',
            'dia_pago'=>'required|date',
            'socio'=>'required|exists:users,id',
            'amount'=>'required|regex:'.$rg_decimal.'|gt:0',
            'rate'=>'required|regex:'.$rg_decimal,
            'term'=>'required',
            'pago_mensual'=>'required|regex:'.$rg_decimal,
            'numero_pagos'=>'required|regex:'.$rg_decimal,
            'total_pago'=>'required|regex:'.$rg_decimal,
            'total_interes'=>'required|regex:'.$rg_decimal,
            'numero_pago'=>'required|array',
            'numero_pago.*'=>'required|integer|not_in:0',
            'fecha_pago'=>'required|array',
            'fecha_pago.*'=>'required|date',
            'monto_pago'=>'required|array',
            'monto_pago.*'=>'required|regex:'.$rg_decimal,
            'interes'=>'required|array',
            'interes.*'=>'required|regex:'.$rg_decimal,
            'pago_total'=>'required|array',
            'pago_total.*'=>'required||regex:'.$rg_decimal,
            'saldo_capital'=>'required|array',
            'saldo_capital.*'=>'required|regex:'.$rg_decimal
        ];
    }

    public function filters()
    {
        return [
            'monto_pago.*' => fn ($value, array $options = []) => preg_replace("/([^0-9\\.])/i", "", $value),
            'saldo_capital.*' => fn ($value, array $options = []) => preg_replace("/([^0-9\\.])/i", "", $value),
            'pago_total.*' => fn ($value, array $options = []) => preg_replace("/([^0-9\\.])/i", "", $value),
            'interes.*'=>fn ($value, array $options = []) => preg_replace("/([^0-9\\.])/i", "", $value),
        ];
    }

    public function messages()
    {
        return [
            'amount.gt'=>'El campo monto de prestamo debe ser mayor a 0.',
            'amount.regex'=>'El campo monto de prestamo es inválido.'
        ];
    }

}
