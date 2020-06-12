<?php

namespace App\Http\Controllers;

use App\cotizacion;
use Illuminate\Http\Request;
use App\servicio;
use App\cliente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicio= DB::table('cotizacion')
            ->join('clientes', 'cotizacion.cliente_id', '=', 'clientes.id')
            ->select('cotizacion.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->get();

        return view('cotizacion.index',['servicio'=>$servicio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cotizacion.create');
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

        $r2=$request->get('dni');
     
        $r6=$request->get('nro_celular');
        $r7=$request->get('fecha');
        $r8=$request->get('turbo');
        $r9=$request->get('modelo');
        $r10=$request->get('motor');
        $r11=$request->get('placa');
        $r12=$request->get('descripcion');
        
        $r131=$request->get('observacion');
        
        $r14=$request->get('costo_total'); 
        $r15=$request->get('marca');
        $r16=$request->get('importe');


        $costo=0;
        for ($i=0; $i <count($request->get('importe')) ; $i++) { 
            $costo+=$request->get('importe')[$i];
        }
         $fechaactual = getdate();
        $fecha_final=$fechaactual['seconds'].$fechaactual['minutes'].$fechaactual['hours'].$fechaactual['mday'].$fechaactual['mon'].$fechaactual['year'];
       
        $cliente = cliente::find($r2);
        if($cliente==NULL){
            if ($r2==NULL) {
                $cli = new cliente([
                'id'=>$fecha_final,
                'nombre'=>strtoupper($request->get('nombre')),
                'apellido_pate'=>strtoupper($request->get('ape_paterno')),
                'apellido_mate'=>strtoupper($request->get('ape_materno')),
                'nro_celular'=>$r6,
                ]);
                $cli->save();
            }
            else{
                $cli = new cliente([
                'id'=>$r2,
                'nombre'=>strtoupper($request->get('nombre')),
                'apellido_pate'=>strtoupper($request->get('ape_paterno')),
                'apellido_mate'=>strtoupper($request->get('ape_materno')),
                'nro_celular'=>$r6,
                ]);
                $cli->save();
            }
        }
        $cliente_aux="";
        if($r2==NULL){
            $cliente_aux=$fecha_final;
        }
        else{
            $cliente_aux=$r2;
        }
        $servi = new cotizacion([
                    
                    'fecha'=>$r7,
                    'turbo'=>strtoupper($r8),
                    'modelo'=>strtoupper($r9),
                    'marca'=>strtoupper($r15),
                    'motor'=>strtoupper($r10),
                    'placa'=>strtoupper($r11),
                    'observacion' => strtoupper($r131),
                    'descripcion'=>json_encode($r12),
                    'importe'=>json_encode($r16),
                    'costo_total'=>$costo,
                    'cliente_id'=>$cliente_aux
                    
                ]);
        $servi->save();
        $servi->observacion = $r131;
        $servi->save();
        return redirect('/cotizacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ser= DB::table('cotizacion')
            ->join('clientes', 'cotizacion.cliente_id', '=', 'clientes.id')
            ->select('cotizacion.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('cotizacion.id',$id)
            ->first();
        $view=\View::make('cotizacion.show',compact('ser'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper('A4');
        return $pdf->stream('cotizacion'.'.pdf'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $acti=DB::table('actividades')->get();
        $ide=DB::table('cotizacion')->join('clientes', 'cotizacion.cliente_id', '=', 'clientes.id')->select('cotizacion.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')->where('cotizacion.id',$id)->first();
        return view('cotizacion.edit',['ide'=>$ide,'acti'=>$acti]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dni=$request->input('dni');
        $cliente = cliente::find($dni);
        $cliente->nombre=strtoupper($request->input('nombre'));
        $cliente->apellido_pate=strtoupper($request->input('ape_paterno'));
        $cliente->apellido_mate=strtoupper($request->input('ape_materno'));
        $cliente->save();
        

        $costo = 0 ;
        for ($i=0; $i <count($request->get('importe')) ; $i++) { 
            $costo+=$request->get('importe')[$i];
        }
        if ($costo>0) {
            $servicio = cotizacion::find($id);
             
             $servicio->fecha=$request->get('fecha');
             $servicio->turbo=strtoupper($request->get('turbo'));
             $servicio->modelo=strtoupper($request->get('modelo'));
             $servicio->marca=strtoupper($request->get('marca'));
             $servicio->motor=strtoupper($request->get('motor'));
             $servicio->placa=strtoupper($request->get('placa'));
             $servicio->observacion=strtoupper($request->get('observacion'));
             $servicio->descripcion=json_encode($request->get('descripcion'));
             $servicio->importe=json_encode($request->get('importe'));
             $servicio->costo_total=$costo;
             $servicio->save();
        }
        else{
             $servicio = cotizacion::find($id);
             $servicio->fecha=$request->get('fecha');
             $servicio->turbo=strtoupper($request->get('turbo'));
             $servicio->modelo=strtoupper($request->get('modelo'));
             $servicio->marca=strtoupper($request->get('marca'));
             $servicio->motor=strtoupper($request->get('motor'));
             $servicio->placa=strtoupper($request->get('placa'));
             $servicio->observacion=strtoupper($request->get('observacion'));
             $servicio->descripcion=json_encode($request->get('descripcion'));
             $servicio->importe=json_encode($request->get('importe'));
    
             $servicio->costo_total=$request->get('costo_total');
             $servicio->save();
        }
        

        return redirect('/cotizacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $article = cotizacion::findOrFail($id);
        $article->delete();
        return redirect('/cotizacion');
    }
}
