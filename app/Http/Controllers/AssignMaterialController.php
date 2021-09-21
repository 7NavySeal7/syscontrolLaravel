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
            $assign = AssignMaterial::select('id','date')->get();
            $useMat = UserMaterial::select('id','quantity')->get();
        }else{
            $assign = AssignMaterial::select('id')->where('id','=',$buscar)->get();
            $useMat = UserMaterial::select('id')->where('id','=',$buscar)->get();
        }
        return ['Informe de Asignación'=>['assign'=>$assign, 'useMat'=>$useMat]];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $assign = AssignMaterial::get();
        $useMat = UserMaterial::get();
        return['assign'=>$assign, 'useMat'=>$useMat];
    }
    //Ingreso de información:
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $date=Carbon::now('America/Lima')->format('Y.m-d');
            $assign = new AssignMaterial();
            $assign->date=$date;
            $assign->id_navegate=$request->id_navegate;
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
        try {
            DB::beginTransaction();
            $date=Carbon::now('America/Lima')->format('Y.m-d');
            $assign = AssignMaterial::findOrFail($request->id);
            $assign->date=$date;
            $assign->id_navegate=$request->id_navegate;
            $assign->save();
            $detalles=$request->data;
            foreach($detalles as $ep=>$valor){
                $detAssign = UserMaterial::findOrFail($valor['id']);
                $detAssign->id_assign_material=$assign->id;
                $detAssign->id_product=$valor['id_product'];
                $detAssign->quantity=$valor['quantity'];
                $detAssign->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
    
    //Eliminación de Información:
    public function destroy(Request $request){
        try {
            DB::beginTransaction();
            $detalles=$request->data;
            foreach($detalles as $ep=>$valor){
                $detAssign = UserMaterial::findOrFail($valor['id']);
                //Metodo Eliminar
                $detAssign->delete();
            }
            $assign = AssignMaterial::findOrFail($request->id);
            //Metodo Eliminar
            $assign->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
