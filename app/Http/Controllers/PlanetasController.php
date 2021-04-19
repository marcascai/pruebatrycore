<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Planetas;
use DB;

class PlanetasController extends Controller
{
    public function getPlanetas(){
        return response()->json(Planetas::all(), 200);
    }

    public function getPlanetasBiId($id){
        $planeta = Planetas::find($id);
        if (is_null($planeta)) {
            return response()->json(['message' =>'Planeta no existe'], 404);
        }
        self::sumarVisita($id, 'planetas');
        return response()->json(Planetas::find($id), 200);
    }

    public function addPlaneta(Request $request){
        $planeta = Planetas::create($request->all());
        return response()->json($planeta, 201);
    }

    public function updatePlaneta(Request $request, $id) {
        $planeta = Planetas::find($id);
        if (is_null($planeta)) {
            return response()->json(['message' =>'Planeta no existe'], 404);
        }
        $planeta->update($request->all());
        return response($planeta, 200);
    }

    public function deletePlaneta(Request $request, $id){
        $planeta = Planetas::find($id);
        if (is_null($planeta)) {
            return response()->json(['message' =>'Planeta no existe'], 404);
        }
        $planeta->delete();
        return response()->json(null, 204);
    }

    public function topPlanetas(){
        $personas = DB::table('planetas')
                    ->orderByDesc('planetas.visitas')
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
}
