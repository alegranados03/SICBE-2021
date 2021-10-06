<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $fillable=[];

    public function cuenta()
    {
        return $this->belongsTo('App\Models\Cuenta', 'cuenta_id');
    }


    public function transaccion()
    {
        return $this->belongsTo('App\Models\Transaccion', 'transaccion_id');
    }

}
