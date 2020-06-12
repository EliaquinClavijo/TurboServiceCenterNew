<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\observacion;
class observacionesController extends Controller
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
            ->join('observacions','servicios.id', '=', 'observacions.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular','observacions.*')
            ->get();
        return view('observaciones.index',['total'=>$total]);
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
    public function show($id)
    {
        //
        $ser= DB::table('servicios')
            ->join('clientes','servicios.cliente_id', '=','clientes.id')
            ->join('observacions','servicios.id', '=', 'observacions.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular','observacions.*')
            ->where('servicios.id',$id)
            ->first();
        $view=\View::make('observaciones.show',compact('ser'))->render();
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
        $ide= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('servicios.id',$id)
            ->first(); 
        $obs=DB::table('observacions')->where('id',$id)->first();
        return view('observaciones.edit',['ide'=>$ide,'obs'=>$obs]);
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
        $ide=DB::table('observacions')->where('id',$id)->first();
        print_r($ide);
        if($ide==NULL){
         $servi = new observacion([
                    'id'=>$request->get('id'),
                    'text'=>strtoupper($request->get('text')),
                    'fecha'=>$request->get('fecha'),     
                ]);
         $servi->save();
         
        }
        else{
             $obs= observacion::find($id);
             $obs->id=$request->get('id');
             $obs->text=strtoupper($request->get('text'));
             $obs->fecha=$request->get('fecha');
             $obs->save();

        }
       return redirect('/observaciones');
        

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
        $article = observacion::findOrFail($id);
        $article->delete();
        return redirect('/observaciones');
    }
}
