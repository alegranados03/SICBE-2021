<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;
use Response;
use DB;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $transacciones  = Transaccion::all();
        
        $fechas = [];
        foreach($transacciones as $transaccion){
            $transaccion->movimientos;
            foreach($transaccion->movimientos as $movimiento){
                $movimiento->cuenta;
            }
            $stringDate = $transaccion->created_at->toDateString();
            if(array_key_exists($stringDate,$fechas)){
                array_push($fechas[$stringDate],$transaccion);
            }else{
                $fechas[$stringDate] = [$transaccion];
            }
        }

        return Response::json(['fechas'=>$fechas],200);
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function show(Transaccion $transaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaccion $transaccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaccion $transaccion)
    {
        //
    }
}
