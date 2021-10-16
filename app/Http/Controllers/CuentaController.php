<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Response;

class CuentaController extends Controller
{

    public function __construct()
    {
        $this->idCuentasResultado = [
            26,
            30,
            51,
            56,
            131,
            132,
            133,
            134,
            135,
            136,
            137,
            138,
            139,
            140,
            141,
            142,
            143,
            144,
            145,
            146,
            147,
            148,
            149,
            150,
            151,
            152,
            153,
            154,
            155,
            156,
            157,
            158,
            159,
            160,
            161,
            162,
            163,
            164,
            165,
            166,
            167,
            168,
            169,
            170,
            171,
            172,
            173,
            174,
            175,
            176,
            177,
            178,
            179,
            180,
            181,
            182,
            183,
            184,
            185,
            186,
            187,
            188,
            189,
            190,
            191,
            192,
            193,
            194,
            195,
            196,
            197,
        ];
    }


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

    public function balanceComprobacion(){
        $cuentas = $this->cierreCuentas(Cuenta::all());
        return Response::json(['cuentas'=>$cuentas],200);
    }

    public function estadoCapital(){
        $cuentas = $this->cierreCuentas(Cuenta::where('numero_cuenta','LIKE','3%')->get());
        return Response::json(['cuentas'=>$cuentas],200);   
    }

    public function estadoResultados(){
        $cuentas = $this->cierreCuentas($cuentas = Cuenta::all());
        $responseCuentas = ['cuentas'=>[]];
        foreach($cuentas as $cuenta){
            if(in_array($cuenta->id,$this->idCuentasResultado)){
                $responseCuentas['cuentas'][]=$cuenta;
            }
        }

        return Response::json(['cuentas'=>$responseCuentas],200);
    }
    
    public function cierreCuentas($cuentas){
        foreach($cuentas as $cuenta){
            $cuenta->total_debe= 0.0 ;
            $cuenta->total_haber = 0.0;
            $cuenta->movimientos = $cuenta->movimientos()->where('debe','>=','0')->get();
            $total_debe = 0;
            $total_haber = 0;
            foreach($cuenta->movimientos as $movimiento){
                 $total_debe += $movimiento->debe;
                 $total_haber += $movimiento->haber;
            }
            $cierre = $total_debe - $total_haber;
            if($cierre > 0){
                $cuenta->total_debe = number_format($cierre,2);
            }else if($cierre < 0){
                $cuenta->total_haber = -1*number_format($cierre,2);
            }
        }
        return $cuentas;
    }
}