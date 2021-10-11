<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Response;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::where('padre_id', '=' , NULL)->get();
        foreach($cuentas as $cuenta){
            $cuenta->obtenerCuentas();
        }
        return Response::json(['cuentas'=>$cuentas],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return Response::json(['request'=>$request->all()]);
        $cuenta = new Cuenta();
        $cuenta->numero_cuenta = $request->numero_cuenta;
        $cuenta->nombre_cuenta = $request->nombre_cuenta;
        $cuenta->padre_id = $request->padre_id;
        $cuenta->debe = 0.0;
        $cuenta->haber = 0.0;
        $cuenta->tipo_id = $request->tipo_id;
        if($cuenta->save()){
            return Response::json(['cuenta'=>$cuenta],200);
        }else{
            return Response::json(['error'=>'Algo salió mal'],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        if(isset($cuenta)){
            return Response::json(['cuenta'=>$cuenta],200);
        }else{
            return Response::json(['error'=>'Algo salió mal'],400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cuenta = Cuenta::findOrFail($id);
        $cuenta->nombre_cuenta = $request->nombre_cuenta;
        $cuenta->debe = 0.0;
        $cuenta->haber = 0.0;
        $cuenta->tipo_id = $request->tipo_id;
        if($cuenta->save()){
            return Response::json(['cuenta'=>$cuenta],200);
        }else{
            return Response::json(['error'=>'Algo salió mal'],400);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function libroMayor()
    {   //método para libro diario
       // $transacciones  = Transaccion::where('created_at','=',fecha)->get();
       $cuentas  = Cuenta::all();
       foreach($cuentas as $cuenta){
           $cuenta->movimientos;
       }
        return Response::json(['cuentas'=>$cuentas],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
