<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'numero_cuenta',
        'nombres',
        'apellidos',
        'cedula',
        'provincia',
        'canton',
        'parroquia',
        'recinto',
        'direccion',
        'telefono',
        'celular',
        'lugar_nacimiento',
        'fecha_nacimiento',
        'nacionalidad',
        'estado_civil',
        'nombre_conyuge',
        'cedula_conyuge',
        'celular_conyuge',
        'foto',
        'estado',
        'sexo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'numero_cuenta'=>'integer'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->numero_cuenta = $model->NumeroCuentaSiguente();
        });
    }

    public function scopeNumeroCuentaSiguente()
    {
        $user = $this->select('numero_cuenta')->latest('id')->first();
        if ($user) {
            $ordenNumeroGenerado = $user->numero_cuenta+1;
        } else {
            $ordenNumeroGenerado = 1;
        }
        return $ordenNumeroGenerado;
    }

    public function getApellidosNombresAttribute()
    {
        if($this->apellidos){
            return $this->apellidos.' '.$this->nombres;
        }else{
            return $this->email; 
        }
        
    }
}
