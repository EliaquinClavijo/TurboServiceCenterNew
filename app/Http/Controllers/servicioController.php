<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicio;
use App\cliente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\observacion;
class servicioController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $servicio= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->get();
             
        $reclamos = DB::table("reclamos")
        ->select("reclamos.servicio_id", DB::raw("COUNT(reclamos.estado) as estado"))
        ->where('reclamos.estado','VIGENTE')
        ->groupBy("reclamos.servicio_id")
        ->get();
        

        return view('servicio.index',['servicio'=>$servicio,'reclamos'=>$reclamos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ultimo =servicio::whereRaw('id = (select max(`id`) from servicios)')->first();
        return view('servicio.create',['ultimo'=>$ultimo]);
    }
    
    public function recuperardni(Request $request){
    
        $consulta=file_get_contents("http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI=".$request->input('dni'));
        $data = [];
        $data["name"] = $consulta;
        return response()->json($data);
    }
    public function recuperarRuc($id){
        $data="";
        if(strlen($id)==8){
            $data=file_get_contents("https://ww1.essalud.gob.pe/sisep/postulante/postulante/postulante_obtenerDatosPostulante.htm?strDni=".$id);
        }
        else{
            $data=file_get_contents('https://api.sunat.cloud/ruc/'.$id);
            //$data=json_decode($data2);
        }
        
        return response()->json(['data' => $data]);
    }
    public function recuperarprof($id){
        $servicio = servicio::find($id);
        return response()->json(['servicio' => $servicio]);
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
        
        $r1=$request->get('id');
        $r2=$request->get('dni');
     
        $r6=$request->get('nro_celular');
        $r7=$request->get('fecha');
        $r8=$request->get('turbo');
        $r9=$request->get('modelo');
        $r10=$request->get('motor');
        $r11=$request->get('placa');
        $r12=$request->get('descripcion');
        $r13=$request->get('adelanto');
        $r14=$request->get('costo_total');
        $r15=$request->get('marca');
        $r16=$request->get('importe');
        $r17=$request->get('observacion');


        $fechaactual = getdate();
        $fecha_final=$fechaactual['seconds'].$fechaactual['minutes'].$fechaactual['hours'].$fechaactual['mday'].$fechaactual['mon'].$fechaactual['year'];
       
        $cliente = cliente::find($r2);
        print_r($r2);
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
        if ($r17!=NULL) {
            $observacion= new observacion([
                    'id'=>$request->get('id'),
                    'text'=>strtoupper($r17),
                    'fecha'=>$r7,     
                ]);
            $observacion->save();
        }


        $costo=0;
        for ($i=0; $i <count($request->get('importe')) ; $i++) { 
            $costo+=$request->get('importe')[$i];
        }
        
        

        if($r2==NULL){
            if ($costo>0) {
                $servi = new servicio([
                    'id'=>$r1,
                    'fecha'=>$r7,
                    'turbo'=>strtoupper($r8),
                    'modelo'=>strtoupper($r9),
                    'marca'=>strtoupper($r15),
                    'motor'=>strtoupper($r10),
                    'placa'=>strtoupper($r11),
                    'descripcion'=>json_encode($r12),
                    'importe'=>json_encode($r16),
                    'adelanto'=>$r13,
                    'costo_total'=>$costo,
                    'cliente_id'=>$fecha_final,
                ]);
                $servi->save();

              

            }
            else{
                $servi = new servicio([
                    'id'=>$r1,
                    'fecha'=>$r7,
                    'turbo'=>strtoupper($r8),
                    'modelo'=>strtoupper($r9),
                    'marca'=>strtoupper($r15),
                    'motor'=>strtoupper($r10),
                    'placa'=>strtoupper($r11),
                    'descripcion'=>json_encode($r12),
                    'importe'=>json_encode($r16),
                    'adelanto'=>$r13,
                    'costo_total'=>$r14,
                    'cliente_id'=>$fecha_final,
                ]);
                $servi->save();
            }
            
        }
        else{
            if ($costo>0) {
                $servi = new servicio([
                    'id'=>$r1,
                    'fecha'=>$r7,
                    'turbo'=>strtoupper($r8),
                    'modelo'=>strtoupper($r9),
                    'marca'=>strtoupper($r15),
                    'motor'=>strtoupper($r10),
                    'placa'=>strtoupper($r11),
                    'descripcion'=>json_encode($r12),
                    'importe'=>json_encode($r16),
                    'adelanto'=>$r13,
                    'costo_total'=>$costo,
                    'cliente_id'=>$r2,
                ]);
                $servi->save();
            }
            else{
                $servi = new servicio([
                    'id'=>$r1,
                    'fecha'=>$r7,
                    'turbo'=>strtoupper($r8),
                    'modelo'=>strtoupper($r9),
                    'marca'=>strtoupper($r15),
                    'motor'=>strtoupper($r10),
                    'placa'=>strtoupper($r11),
                    'descripcion'=>json_encode($r12),
                    'importe'=>json_encode($r16),
                    'adelanto'=>$r13,
                    'costo_total'=>$r14,
                    'cliente_id'=>$r2,
                ]);
                $servi->save();
            }
            
        }
        
        return redirect('/servicio');

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
        $obs = observacion::find($id);
        $ser= DB::table('servicios')
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')
            ->where('servicios.id',$id)
            ->first();
        $view=\View::make('servicio.show1',compact('ser','obs'))->render();
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
        $obs = observacion::find($id);
        $acti=DB::table('actividades')->get();
        $ide=DB::table('servicios')->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')->select('servicios.*', 'clientes.nombre','clientes.apellido_pate','clientes.apellido_mate','clientes.nro_celular')->where('servicios.id',$id)->first();
        return view('servicio.edit',['ide'=>$ide,'acti'=>$acti,'obs'=>$obs]);
       
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

        $dni=$request->input('dni');
        $cliente = cliente::find($dni);
        $cliente->nombre=strtoupper($request->input('nombre'));
        $cliente->apellido_pate=strtoupper($request->input('ape_paterno'));
        $cliente->apellido_mate=strtoupper($request->input('ape_materno'));
        $cliente->nro_celular=$request->input('nro_celular');
        $cliente->save();
        
        $obs = observacion::find($id);
        if ($obs==NULL and $request->input('observacion')!=NULL) {
            $observacion= new observacion([
                    'id'=>$request->get('id'),
                    'text'=>strtoupper($request->input('observacion')),
                    'fecha'=>$request->input('fecha'),     
                ]);
            $observacion->save();
        }
        if ($obs!=NULL) {
            $obs= observacion::find($id);
             $obs->text=strtoupper($request->get('observacion'));
             $obs->fecha=$request->get('fecha');
             $obs->save();
        }
        $costo=0;
        for ($i=0; $i <count($request->get('importe')) ; $i++) { 
            $costo+=$request->get('importe')[$i];
        }
        if ($costo>0) {
            $servicio = servicio::find($id);
             
             $servicio->fecha=$request->get('fecha');
             $servicio->turbo=strtoupper($request->get('turbo'));
             $servicio->modelo=strtoupper($request->get('modelo'));
             $servicio->marca=strtoupper($request->get('marca'));
             $servicio->motor=strtoupper($request->get('motor'));
             $servicio->placa=strtoupper($request->get('placa'));
             $servicio->descripcion=json_encode($request->get('descripcion'));
             $servicio->importe=json_encode($request->get('importe'));
             $servicio->adelanto=$request->get('adelanto');
             $servicio->costo_total=$costo;
             $servicio->save();
        }
        else{
            $servicio = servicio::find($id);
             
             $servicio->fecha=$request->get('fecha');
             $servicio->turbo=strtoupper($request->get('turbo'));
             $servicio->modelo=strtoupper($request->get('modelo'));
             $servicio->marca=strtoupper($request->get('marca'));
             $servicio->motor=strtoupper($request->get('motor'));
             $servicio->placa=strtoupper($request->get('placa'));
             $servicio->descripcion=json_encode($request->get('descripcion'));
             $servicio->importe=json_encode($request->get('importe'));
             $servicio->adelanto=$request->get('adelanto');
             $servicio->costo_total=$request->get('costo_total');
             $servicio->save();
        }
        

        return redirect('/servicio');
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
        $article = servicio::findOrFail($id);
        $article->delete();
        $obs = observacion::findOrFail($id);
        $obs->delete();
        return redirect('/servicio');
    }
}
