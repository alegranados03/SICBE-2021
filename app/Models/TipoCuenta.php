<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    use HasFactory;
    protected $fillable=['id', 'tipo_cuenta'];
    protected $table='tipo_cuenta';
    public function cuentas()
    {
        return $this->hasMany('App\Models\Cuenta', 'tipo_id');
    }
}
