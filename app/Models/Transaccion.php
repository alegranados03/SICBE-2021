<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $fillable=['id', 'total_debe', 'total_haber', 'descripcion'];
    protected $table='transaccion';

    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'transaccion_id');
    }

    public function cuentas()
    {
        return $this->belongsToMany(Cuenta::class,'movimiento','transaccion_id', 'cuenta_id');
    }
}
