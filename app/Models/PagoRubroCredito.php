<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoRubroCredito extends Model
{
    use HasFactory;

    // Un pago de rubro de credito tiene lo realiza un cajero
    public function cajero()
    {
        return $this->belongsTo(User::class, 'cajero_id');
    }

    // un pago rubro credito tiene un rubro de credito
    public function rubroCredito()
    {
        return $this->belongsTo(RubrosCredito::class, 'rubros_creditos_id');
    }
}
