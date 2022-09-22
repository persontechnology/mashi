<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;
    protected $fillable=[
        'tipo_credito_id',
        'monto_prestamo',
        'tasa_tae',
        'plazo',
        'termino',
        'dia_pago',
        'pago_mensual',
        'numero_pagos',
        'total_pago',
        'total_interes',
        'fecha_apertura',
        'estado',
        'user_id',
        'asesor_id'
    ];

    protected $casts = [
        'numero'=>'integer'
    ];
    // crear numero de credito
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->numero = $model->NumeroCreditoSiguente();
        });
    }

    public function scopeNumeroCreditoSiguente()
    {
        $credito = $this->select('numero')->latest('id')->first();
        if ($credito) {
            $ordenNumeroGenerado = $credito->numero+1;
        } else {
            $ordenNumeroGenerado = 1;
        }
        return $ordenNumeroGenerado;
    }

    //Deivid, un credito tiene un socio
    public function socio()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // Deivid, un credito tiene un asesor de credito
    public function asesorCredito()
    {
        return $this->belongsTo(User::class,'asesor_id');
    }

    // Deivid, un credito tiene  un tipo de credito
    public function tipoCredito()
    {
        return $this->belongsTo(TipoCredito::class,'tipo_credito_id');
    }

    //Deivid, un credito tiene varias rubros de credito
    public function rubrosCredito()
    {
        return $this->hasMany(RubrosCredito::class, 'credito_id');
    }

    public function getMontoPrestamoMAttribute()
    {
        return '$' . number_format($this->monto_prestamo, 2);
    }
    public function getPagoMensualMAttribute()
    {
        return '$' . number_format($this->pago_mensual, 2);
    }
    public function getTotalPagoMAttribute()
    {
        return '$' . number_format($this->total_pago, 2);
    }
    public function getTotalInteresMAttribute()
    {
        return '$' . number_format($this->total_interes, 2);
    }
}
