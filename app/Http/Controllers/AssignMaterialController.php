<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AssignMaterial;
use App\Models\UserMaterial;
use Carbon\Carbon;
use FFI\Exception;

class AssignMaterialController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $assign = AssignMaterial::select('id')->get();
        }else{
            $assign = AssignMaterial::select('id')->where('id','=',$buscar)->get();
        }
        return ['assign'=>$assign];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $assign = AssignMaterial::get();
        return['assign'=>$assign];
    }
    //Ingreso de información:
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $date=Carbon::now('America/Lima')->format('Y.m-d');
            $assign = new AssignMaterial();
            $assign->date=$date;
            $assign->id_user=$request->id_user;
            $assign->save();
            $detalles=$request->data;
            foreach($detalles as $ep=>$valor){
                $detAssign = new UserMaterial();
                $detAssign->id_assign_material=$assign->id;
                $detAssign->id_product=$valor['id'];
                $detAssign->quantity=$valor['quantity'];
                $detAssign->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
}
    //Actualización de información:
    public function update(Request $request){
        $assign = AssignMaterial::findOrFail($request->id);
        //$assing->id=$request->id;
        $assign->date=$request->date;
        $assign->id_user=$request->id_user;
        //Metodo Guardar:
        $assign->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $assign = AssignMaterial::findOrFail($request->id);
        //Metodo Eliminar
        $assign->delete();
    }
}
