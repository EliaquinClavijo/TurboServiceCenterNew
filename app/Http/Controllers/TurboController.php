<?php

namespace App\Http\Controllers;

use App\turbo;
use App\modelo;
use App\modelospartno;
use App\partno;

use Illuminate\Http\Request;

class TurboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turbos = turbo::all();
        return view('turbos.index',['turbos'=>$turbos]);
    }

    public function autocomplete(Request $request){
        $data=modelo::select("name")
            ->where("name","LIKE","%{$request->input('name')}%")
            ->get();
       
        return response()->json($data);
    }


    public function recuperarturbos(Request $request){
        $partnos =  modelo::with("parnos")->where("name","=",$request->input('name'))->get()[0]->parnos;
        $data = [];

        foreach ($partnos as $key ) {
            # code...
            $all = $key->partno;
            
            $data[$all->id] = $all->name;
        }

        return response()->json($data);
        
    }
    public function recuperarmarca(Request $request){
        $Turbo = turbo::where("name","=",$request->input('name'))->get();
    
        $marcas = "";
        $modelos = "";
        $motores = "";
        if (count($Turbo)>0)
        {
            $marcas = $Turbo[0]->marcas;
            $modelos = $Turbo[0]->modelos;
            $motores = $Turbo[0]->motores;
        }
        $data = [];

        $marcas = json_decode($marcas);
        $modelos = json_decode($modelos);
        $motores = json_decode($motores);

        $data["marcas"] = $marcas;
        $data["modelos"] = $modelos;
        $data["motores"] = $motores;

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('turbos.create');
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
        $turbo = new turbo;
        $idturbo = $request->get('idturbo');
        $marcas = $request->get('marcas');
        $modelos = $request->get('modelos');
        $motores = $request->get('motores');
        $turbo->name = strtoupper($idturbo);

        if(count(turbo::where("name","=",$turbo->name)->get())==0){

        $verify = partno::where("name","=",$turbo->name)->get();
        if (count($verify) ==0) { $newp = new partno(); $newp->name = $turbo->name; $newp->save();}

        $turbo->marcas = '{"": ""}';
        $turbo->modelos ='{"": ""}';
        $turbo->motores = '{"": ""}';

        if (!is_null($marcas)){
            $obj =(array) json_decode($turbo->marcas);
            $cant = count($obj);
            for ($i = 0; $i < count($marcas); $i++) {$obj[$marcas[$i]] = $marcas[$i];}
            $arraymarcas = json_encode($obj);
            $turbo->marcas = $arraymarcas;
            echo "<script>console.log( 'Debug Objects: " .$arraymarcas. "' );</script>";
        }

        if (!is_null($modelos)){
            $obj =(array) json_decode($turbo->modelos);

            $myturbo = partno::where("name","=",$turbo->name)->get()[0];

            $cant = count($obj);
            for ($i = 0; $i < count($modelos); $i++) { $obj[$modelos[$i]] = $modelos[$i];
                $namemodelo =  strtoupper($modelos[$i]);
                $Exist = modelo::where("name","=",$namemodelo)->get();
                if (count($Exist)==0){$newm = new modelo(); $newm->name = $namemodelo; $newm->save();}

                $mymodel =  modelo::where("name","=",$namemodelo)->get()[0];

                $relation  = modelospartno::where("idmodelo","=",$mymodel->id)->where("idpartno","=",$myturbo->id)->get();
                if (count($relation)==0)
                {
                    $relation = new modelospartno();
                    $relation->idmodelo = $mymodel->id;
                    $relation->idpartno = $myturbo->id;
                    $relation->save();
                }

             }
            $arraymodelos = json_encode($obj);
            $turbo->modelos = $arraymodelos;
            echo "<script>console.log( 'Debug Objects: " .$arraymodelos. "' );</script>";
        }

        if (!is_null($motores)){
            $obj =(array) json_decode($turbo->motores);
            $cant = count($obj);
            for ($i = 0; $i < count($motores); $i++) {$obj[$motores[$i]] = $motores[$i];}
            $arraymotores = json_encode($obj);
            $turbo->motores = $arraymotores;
            echo "<script>console.log( 'Debug Objects: " .$arraymotores. "' );</script>";
        }

        $turbo->save();
        }

        return redirect('/turbos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $turbo = turbo::find($id);
        return view('turbos.turbo',['turbo'=>$turbo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = $request->get('marcas');
        $modelos = $request->get('modelos');
        $motores = $request->get('motores');
        
        echo "<script>console.log( 'Debug Objects: " . $marcas . "' );</script>";
        if (!is_null($marcas)){
        $arr = [];
        //for ($i = 0; $i < count($value); $i++) {$arr[$caracteristica[$i]] = $value[$i];}
        //$descr = json_encode($arr);
        }
    }

    public function editmarca($id)

    {
        $turbo = turbo::find($id);
        return view('turbos.marcasturbo',['turbo'=>$turbo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $turbo = turbo::find($id);
        $marcas = $request->get('marcas');
        $modelos = $request->get('modelos');
        $motores = $request->get('motores');
        
        $turbo->marcas = '{"": ""}';
        $turbo->modelos ='{"": ""}';
        $turbo->motores = '{"": ""}';
        
        $verify = partno::where("name","=",$turbo->name)->get();
        if (count($verify) ==0) { $newp = new partno(); $newp->name = $turbo->name; $newp->save();}
        

        if (!is_null($marcas)){
            $obj =(array) json_decode($turbo->marcas);
            $cant = count($obj);
            for ($i = 0; $i < count($marcas); $i++) {$obj[$marcas[$i]] = $marcas[$i];}
            $arraymarcas = json_encode($obj);
            $turbo->marcas = $arraymarcas;
            echo "<script>console.log( 'Debug Objects: " .$arraymarcas. "' );</script>";
        }

        if (!is_null($modelos)){

            $myturbo = partno::where("name","=",$turbo->name)->get()[0];
            
            $obj =(array) json_decode($turbo->modelos);
            $cant = count($obj);
            for ($i = 0; $i < count($modelos); $i++) {$obj[$modelos[$i]] = $modelos[$i];

                $namemodelo =  strtoupper($modelos[$i]);
                $Exist = modelo::where("name","=",$namemodelo)->get();
                if (count($Exist)==0){$newm = new modelo(); $newm->name = $namemodelo; $newm->save();}

                $mymodel =  modelo::where("name","=",$namemodelo)->get()[0];

                $relation  = modelospartno::where("idmodelo","=",$mymodel->id)->where("idpartno","=",$myturbo->id)->get();
                if (count($relation)==0)
                {
                    $relation = new modelospartno();
                    $relation->idmodelo = $mymodel->id;
                    $relation->idpartno = $myturbo->id;
                    $relation->save();
                }
            }
            $arraymodelos = json_encode($obj);
            $turbo->modelos = $arraymodelos;
            
        }

        if (!is_null($motores)){
            $obj =(array) json_decode($turbo->motores);
            $cant = count($obj);
            for ($i = 0; $i < count($motores); $i++) {$obj[$motores[$i]] = $motores[$i];}
            $arraymotores = json_encode($obj);
            $turbo->motores = $arraymotores;
            echo "<script>console.log( 'Debug Objects: " .$arraymotores. "' );</script>";
        }

        $turbo->update();

        return redirect('/turbos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\turbo  $turbo
     * @return \Illuminate\Http\Response
     */
    public function destroy(turbo $turbo)
    {
        //
    }
}
