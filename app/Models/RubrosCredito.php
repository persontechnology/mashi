<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubrosCredito extends Model
{
    use HasFactory;
    protected $fillable=[
        'numero_pago',
        'fecha_pago',
        'monto_pago',
        'interes_total',
        'pago_total',
        'saldo_capital',
        'estado',
        'credito_id',
    ];
    public function getFechaPagoEAttribute()
    {
        $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $fecha = Carbon::parse($this->fecha_pago);
        $mes = $meses[($fecha->format('n')) - 1];
        return  $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
    }
    public function getMontoPagoMAttribute()
    {
        return '$' . number_format($this->monto_pago, 2);
    }
    public function getInteresTotalMAttribute()
    {
        return '$' . number_format($this->interes_total, 2);
    }
    public function getPagoTotalMAttribute()
    {
        return '$' . number_format($this->pago_total, 2);
    }
    public function getSaldoCapitalMAttribute()
    {
        return '$' . number_format($this->saldo_capital, 2);
    }

    // un rubro de credito tiene un credito
    public function credito()
    {
        return $this->belongsTo(Credito::class, 'credito_id');
    }
    
    // Un rubro credito tiene varios pagos d rubro de creditos
    public function listadoPagoRubroCreditos()
    {
        return $this->hasMany(PagoRubroCredito::class, 'rubros_creditos_id');
    }

    public function montoCobrarPagoRubroCreditos()
    {
        $valor=$this->monto_pago-$this->hasMany(PagoRubroCredito::class, 'rubros_creditos_id')->sum('valor');
        return number_format($valor,2,'.', '');
    }
    public function totalPagoRubroCredito()
    {
        return $this->hasMany(PagoRubroCredito::class, 'rubros_creditos_id')->sum('valor');
    }

    public function getColorEstadoMAttribute()
    {
        
        if($this->monto_pago===$this->totalPagoRubroCredito()){
            $this->estado='CANCELADO';
            $this->save();
            return 'bg-success';
        }

        $fechaPagoEsHoy= Carbon::today()->gt($this->fecha_pago);

        if($this->monto_pago>$this->totalPagoRubroCredito() && $fechaPagoEsHoy){
            $this->estado='VENCIDO';
            $this->save();
            return 'bg-warning';
        }

        return '';
    }
}
