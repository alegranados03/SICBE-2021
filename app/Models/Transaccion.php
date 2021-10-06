<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $fillable=[];

    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'transaccion_id');
    }
}
