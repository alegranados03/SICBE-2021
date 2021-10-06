<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable=[];

    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'cuenta_id');
    }

    public function cuentas()
    {
        return $this->hasMany('App\Models\Cuenta', 'padre_id');
    }

    public function padre()
    {
        return $this->belongsTo('App\Models\Cuenta', 'padre_id');
    }
}
