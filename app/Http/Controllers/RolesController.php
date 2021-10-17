<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $rol = Roles::select('name')->get();
        }else{
            $rol = Roles::select('name')->where('id','=',$buscar)->get();
        }
        return ['rol'=>$rol];
    }    
    //Indexación de Información:
    public function index(Request $request){
        $rol = Roles::get();
        return['rol'=>$rol];
    }
    public function index2(Request $request){
        $rol = Roles::get();
        return['rol'=>$rol];
    }
    //Ingreso de Información:
    public function store(request $request){
        $rol = new Roles;
        $rol->name=$request->name;
        //Metodo Guardar:
        $rol->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $rol = Roles::findOrFail($request->id);
        $rol->name=$request->name;
        //Metodo Guardar:
        $rol->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $rol = Roles::findOrFail($request->id);
        //Metodo Eliminar
        $rol->delete();
    }
}
