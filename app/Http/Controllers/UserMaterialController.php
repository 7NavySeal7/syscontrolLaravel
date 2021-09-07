<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserMaterial;

class UserMaterialController extends Controller
{
    //Informe de Detalle:
    public function getDetails(Request $request){
        $reg = UserMaterial::select('id')
        ->get();
        return['Informe'=>$reg];
    }
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $useMat = UserMaterial::select('id')->get();
        }else{
            $useMat = UserMaterial::select('id')->where('id','=',$buscar)->get();
        }
        return ['useMat'=>$useMat];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $useMat = UserMaterial::get();
        return['useMat'=>$useMat];
    }
    //Actualización de Información:
    public function update(Request $request){
        $useMat = UserMaterial::findOrFail($request->id);
        $useMat->id=$request->id;
        $useMat->id_assign_material=$request->id_assign_material;
        $useMat->id_product=$request->id_product;
        $useMat->quantity=$request->quantity;
        //Metodo Guardar:
        $useMat->save();
    }
    //ELiminación de Información:
    public function destroy(Request $request){
        $useMat = UserMaterial::findOrFail($request->id);
        //Metodo Eliminar
        $useMat->delete();
    }
}
