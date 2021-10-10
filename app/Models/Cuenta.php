<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable=['id', 'numero_cuenta', 'numero_real', 'nombre_cuenta', 'padre_id', 'debe', 'haber', 'tipo_id'];
    protected $table='cuenta';


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

    public function obtenerCuentas(){
        if(sizeof($this->cuentas)>0){
            foreach($this->cuentas as $cuenta){
                $cuenta->obtenerCuentas();
            }
        }else{
                return null;
        }
    }
}
