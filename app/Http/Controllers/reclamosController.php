<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\reclamo;
class reclamosController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total= DB::table('servicios')
            ->join('clientes','servicios.cliente_id', '=','clientes.id')
            ->join('reclamos','servicios.id', '=', 'reclamos.servicio_id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular','reclamos.*')
            ->get();
        return view('reclamos.index',['total'=>$total]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recuperarnro(){
        $reclamos = DB::table("reclamos")
        ->select(DB::raw("COUNT(reclamos.estado) as estado"))
        ->where('reclamos.estado','VIGENTE')
        ->groupBy("estado")
        ->first();
         $obse =  DB::table("observacions")
        ->select(DB::raw("COUNT(*) as nro_reclamos "))
        ->first();
        return response()->json(['$reclamos' => $reclamos,'$obse'=>$obse]);
    }
    public function show($id)
    { 
        //
        $ser= DB::table('servicios')
            ->join('clientes','servicios.cliente_id', '=','clientes.id')
            ->join('reclamos','servicios.id', '=', 'reclamos.servicio_id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular','reclamos.*')
            ->where('servicios.id',$id)
            ->get();
                $view=\View::make('reclamos.show',compact('ser'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper('A4');
        return $pdf->stream('informe'.'.pdf');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $recla=DB::table('reclamos')->where('id',$id)->first();
        if($recla==NULL){
            $ide= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('servicios.id',$id)
            ->first();
        return view('reclamos.edit2',['ide'=>$ide,'recla'=>$recla]);
        }
        else{
            $ide= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('servicios.id',$recla->servicio_id)
            ->first();
        return view('reclamos.edit',['ide'=>$ide,'recla'=>$recla]);
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ide=DB::table('reclamos')->where('id',$id)->first();

        $estado='VIGENTE';
        if ($request->get('text2')!="") {
           $estado='SOLUCIONADO';
        }
        if($ide==NULL){

         $recla = new reclamo([
                         
                    'text'=>strtoupper($request->get('text')),
                    'fecha_reclamo'=>$request->get('fecha_reclamo'), 
                    'estado'=>'VIGENTE',  
                    'servicio_id'=> $request->get('id')      
                ]);
         $recla->save();
         
        }
        else{
             $recl= reclamo::find($id);
             $recl->text=strtoupper($request->get('text'));
             $recl->text2=strtoupper($request->get('text2'));
             $recl->fecha_reclamo=$request->get('fecha_reclamo');
             $recl->fecha_solucion=$request->get('fecha_solucion');
             $recl->estado=$estado;
             $recl->save();

        }
       return redirect('/reclamos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = reclamo::findOrFail($id);
        $article->delete();
        return redirect('/reclamos');
    }
}
