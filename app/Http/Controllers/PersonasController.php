<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Personas;
use DB;
class PersonasController extends Controller
{
    public function getPersonas(){

        $personas = DB::table('personas')
                    ->join('planetas','personas.planeta','=','planetas.id')
                    ->select('personas.*', 'planetas.nombre as nombreplaneta')
                    ->get();

        return response()->json($personas, 200);
        //return response()->json(Personas::all(), 200);
    }

    public function getPersonasBiId($id){
        $persona = Personas::find($id);
        if (is_null($persona)) {
            return response()->json(['message' =>'Persona no existe'], 404);
        }
        self::sumarVisita($id, 'personas');
        self::sumarVisita($persona->planeta, 'planetas');
        return response()->json($persona::find($id), 200);
    }

    public function addPersona(Request $request){
        $persona = Personas::create($request->all());
        return response()->json($persona, 201);
    }

    public function updatePersona(Request $request, $id) {
        $persona = Personas::find($id);
        if (is_null($persona)) {
            return response()->json(['message' =>'Persona no existe'], 404);
        }
        $persona->update($request->all());
        return response($persona, 200);
    }

    public function deletePersona(Request $request, $id){
        $persona = Personas::find($id);
        if (is_null($persona)) {
            return response()->json(['message' =>'Persona no existe'], 404);
        }
        $persona->delete();
        return response()->json(null, 204);
    }

    public function topPersonas(){
        $personas = DB::table('personas')
                    ->join('planetas','personas.planeta','=','planetas.id')
                    ->select('personas.*', 'planetas.nombre as nombreplaneta')
                    ->orderByDesc('personas.visitas')
                    ->limit(3)
                    ->get();

        return response()->json($personas, 200);
    }

    //suma una visita en la tabla indicada
    public function sumarVisita($id, $tabla){
        DB::table($tabla)
        ->where('id', $id)
        ->update(['visitas' => DB::raw('visitas+1')]);
    }

    public function getUsuariosByPlaneta($id){
        // $persona = Personas::find($id);
        // if (is_null($persona)) {
        //     return response()->json(['message' =>'Persona no existe'], 404);
        // }
        $personas = DB::table('personas')
                    ->select('personas.*')
                    ->where('planeta', $id)
                    ->get();
        return response()->json($personas, 200);
    }

}
