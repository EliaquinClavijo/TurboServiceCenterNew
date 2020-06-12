<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\servicio;
use App\informe;
use App\cliente;
use Illuminate\Support\Facades\Storage;
class informeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informes = informe::all();
        return view('informes.index',['informes'=>$informes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimo =informe::whereRaw('id = (select max(`id`) from informes)')->first();
        return view('informes.crear',['ultimo'=>$ultimo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r2=$request->get('dni');
        $id=$request->get('id');
        $r6=$request->get('nro_celular');
        $r7=$request->get('fecha');
        $r8=$request->get('turbo');
        $r15=$request->get('marca');
        $r9=$request->get('modelo');
        $r10=$request->get('motor');
        $r11=$request->get('placa');

        
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
                'apellido_pate'=>strtoupper(@$request->get('ape_paterno')),
                'apellido_mate'=>strtoupper(@$request->get('ape_materno')),
                'nro_celular'=>$r6,
                ]);
                $cli->save();
            }
            
        }
        
        else{
            $cliente->nombre=strtoupper($request->get('nombre'));
            $cliente->apellido_pate=strtoupper($request->get('ape_paterno'));
            $cliente->apellido_mate=strtoupper($request->get('ape_materno'));
            $cliente->nro_celular=$r6;
            $cliente->save();
        }
        
        $informe = new informe([
                'id'=>$id,
                'fecha'=>$r7,
                'turbo'=>strtoupper($r8),
                'modelo'=>strtoupper($r9),
                'marca'=>strtoupper($r15),
                'motor'=>strtoupper($r10),
                'placa'=>strtoupper($r11),
                'email'=>strtoupper($request->get('email')),
                'cliente_id'=>$r2,
                'descripcion'=>strtoupper(json_encode($request->get('descripcion_info'))),
                'operacion'=>strtoupper(json_encode($request->get('operacion'))),
                'comentario'=>strtoupper(json_encode($request->get('comentario'))),
                'resultado'=>json_encode($request->get('resultado')),
                'recomendaciones'=>$request->get('recomendaciones'),
            ]);
        $informe->save();
        
        
        return redirect('/informe/');
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
        
        $info=informe::find($id);
        $ide=cliente::find($info->cliente_id);

        $view=\View::make('informes.show',compact('ide','info'))->render();
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
        // Tmre bien rata tu codigo causa >:v
        $ide=informe::find($id);
        $info=informe::find($id);
        return view('informes.cuerpo',['ide'=>$ide,'info'=>$info]);
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

        $r2=$request->get('dni');
        $id=$request->get('id');
        $r6=$request->get('nro_celular');
        $r7=$request->get('fecha');
        $r8=$request->get('turbo');
        $r15=$request->get('marca');
        $r9=$request->get('modelo');
        $r10=$request->get('motor');
        $r11=$request->get('placa');

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
        else{
            $cliente->nro_celular=$r6;
            $cliente->save();
        }
       
        //
        $info=informe::find($id);
        if($info==NULL){
            $informe = new informe([
                'id'=>$id,
                'descripcion'=>strtoupper(json_encode($request->get('descripcion_info'))),
                'operacion'=>strtoupper(json_encode($request->get('operacion'))),
                'comentario'=>strtoupper(json_encode($request->get('comentario'))),
                'resultado'=>json_encode($request->get('resultado')),
                'recomendaciones'=>$request->get('recomendaciones'),
            ]);
            $informe->save();
        }
        else{
             $informe= informe::find($id);
             $informe->fecha=$r7;
             $informe->cliente_id=$r2;
             $informe->turbo=strtoupper($r8);
             $informe->modelo=strtoupper($r9);
             $informe->marca=strtoupper($r15);
             $informe->motor=strtoupper($r10);
             $informe->placa=$r11;
             $informe->email=strtoupper($request->get('email'));
             $informe->descripcion=strtoupper(json_encode($request->get('descripcion_info')));
             $informe->operacion=strtoupper(json_encode($request->get('operacion')));
             $informe->comentario=strtoupper(json_encode($request->get('comentario')));
             $informe->resultado=json_encode($request->get('resultado'));
             $informe->recomendaciones=$request->get('recomendaciones');
             $informe->save();

        }
        return redirect('/informe/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informe = informe::findOrFail($id);
        $informe->delete();
        return redirect('/informe');
    }
}
