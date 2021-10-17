<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Charges;

class ChargesController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $charg = Charges::select('name')->get();
        }else{
            $charg = Charges::select('name')->where('id','=',$buscar)->get();
        }
        return ['charg'=>$charg];
    }  
    //Indexación de Información:
    public function index(Request $request){
        $charg = Charges::get();
        return['charg'=>$charg];
    }
    public function index2(Request $request){
        $charg = Charges::get();
        return['charg'=>$charg];
    }
    //Ingreso de Información:
    public function store(request $request){
        $charg = new Charges;
        $charg->name=$request->name;
        //Metodo Guardar:
        $charg->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $charg = Charges::findOrFail($request->id);
        $charg->name=$request->name;
        //Metodo Guardar:
        $charg->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $charg = Charges::findOrFail($request->id);
        //Metodo Eliminar
        $charg->delete();
    }
}
