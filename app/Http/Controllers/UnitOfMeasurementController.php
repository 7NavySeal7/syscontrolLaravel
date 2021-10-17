<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UnitOfMeasurement;

class UnitOfMeasurementController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $unit = UnitOfMeasurement::select('name')->get();
        }else{
            $unit = UnitOfMeasurement::select('name')->where('id','=',$buscar)->get();
        }
        return ['unit'=>$unit];
    } 
    //Indexación de Información:
    public function index(Request $request){
        $unit = UnitOfMeasurement::get();
        return['unit'=>$unit];
    }

    public function index2(Request $request){
        $unit = UnitOfMeasurement::get();
        return['unit'=>$unit];
    }
    //Ingreso de información:
    public function store(request $request){
        $unit = new UnitOfMeasurement;
        $unit->id=$request->id;
        $unit->name=$request->name;
        $unit->description=$request->description;
        //Metodo de Guardar:
        $unit->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $unit = UnitOfMeasurement::findOrFail($request->id);
        $unit->id=$request->id;
        $unit->name=$request->name;
        $unit->description=$request->description;
        //Metodo de Guardar:
        $unit->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $unit = UnitOfMeasurement::findOrFail($request->id);
        //Metodo Eliminar
        $unit->delete();
    }
}
