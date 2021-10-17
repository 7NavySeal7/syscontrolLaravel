<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Departament;

class DepartamentController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $depart = Departament::select('name')->get();
        }else{
            $depart = Departament::select('name')->where('id','=',$buscar)->get();
        }
        return ['depart'=>$depart];
    }    
    //Indexación de Información:
    public function index(Request $request){
        $depart = Departament::get();
        return['depart'=>$depart];
    }
    public function index2(Request $request){
        $depart = Departament::get();
        return['depart'=>$depart];
    }
    //Ingreso de Información:
    public function store(request $request){
        $depart = new Departament;
        $depart->id=$request->id;
        $depart->name=$request->name;
        $depart->id_city=$request->id_city;
        //Metodo de guardar:
        $depart->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $depart = Departament::findOrFail($request->id);
        $depart->id=$request->id;
        $depart->name=$request->name;
        $depart->id_city=$request->id_city;
        //Metodo de guardar:
        $depart->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $depart = Departament::findOrFail($request->id);
        //Metodo Eliminar
        $depart->delete();
    }
}
