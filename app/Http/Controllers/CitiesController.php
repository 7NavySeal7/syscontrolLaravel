<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cities;

class CitiesController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $city = Cities::select('name')->get();
        }else{
            $city = Cities::select('name')->where('id','=',$buscar)->get();
        }
        return ['city'=>$city];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $city = Cities::get();
        return['city'=>$city];
    }
    //Ingreso de información:
    public function store(request $request){
        $city = new Cities;
        $city->id=$request->id;
        $city->name=$request->name;
        //Metodo de Guardar:
        $city->save();
    }
    //Actualización de información:
    public function update(Request $request){
        $city = Cities::findOrFail($request->id);
        $city->id=$request->id;
        $city->name=$request->name;
        //Metodo de Guardar:
        $city->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $city = Cities::findOrFail($request->id);
        //Metodo Eliminar
        $city->delete();
    }
}
