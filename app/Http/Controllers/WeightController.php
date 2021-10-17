<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Weight;

class WeightController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $peso = Weight::select('name')->get();
        }else{
            $peso = Weight::select('name')->where('id','=',$buscar)->get();
        }
        return ['peso'=>$peso];
    }
    //Indexación de Información:
    public function index(Request $request){
        $peso = Weight::get();
        return['peso'=>$peso];
    }

    public function index2(Request $request){
        $peso = Weight::get();
        return['peso'=>$peso];
    }
    //Ingreso de Información:
    public function store(request $request){
        $peso = new Weight;
        $peso->name=$request->name;
        $peso->description=$request->description;
        //Metodos Guardar:
        $peso->save();
    } 
    //Actualización de Información:
    public function update(Request $request){
        $peso = Weight::findOrFail($request->id);
        $peso->name=$request->name;
        $peso->description=$request->description;
        //Metodos Guardar:
        $peso->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $peso = Weight::findOrFail($request->id);
        //Metodo Eliminar
        $peso->delete();
    }
}
