<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $count = Country::select('name')->get();
        }else{
            $count = Country::select('name')->where('id','=',$buscar)->get();
        }
        return ['count'=>$count];
    }    
    //Indexación de Información:
    public function index(Request $request){
        $count = Country::get();
        return['count'=>$count];
    }
    //Ingreso de Información:
    public function store(request $request){
        $count = new Country;
        $count->id=$request->id;
        $count->name=$request->name;
        $count->id_departament=$request->id_departament;
        //Metodo de Guardar:
        $count->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $count = Country::findOrFail($request->id);
        $count->id=$request->id;
        $count->name=$request->name;
        $count->id_departament=$request->id_departament;
        //Metodo de Guardar:
        $count->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $count = Country::findOrFail($request->id);
        //Metodo Eliminar
        $count->delete();
    }
}
