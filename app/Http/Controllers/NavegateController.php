<?php

namespace App\Http\Controllers;
use App\Models\Navegate;
use Illuminate\Http\Request;

class NavegateController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $useCont = Navegate::select('name')->get();
        }else{
            $useCont = Navegate::select('name')->where('id','=',$buscar)->get();
        }
        return ['useCont'=>$useCont];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $useCont = Navegate::get();
        return['useCont'=>$useCont];
    }
    //Ingreso de información:
    public function store(request $request){
        $useCont = new Navegate;
        $useCont->id=$request->id;
        $useCont->name=$request->name;
        $useCont->surname=$request->surname;
        $useCont->phone=$request->phone;
        $useCont->email=$request->email;
        $useCont->type_of_user=$request->type_of_user;
        $useCont->id_roles=$request->id_roles;
        $useCont->id_charge=$request->id_charge;
        $useCont->password=$request->password;
        //Metodo Guardar:
        $useCont->save();
    }
    //Actualización de información:
    public function update(Request $request){
        $useCont = Navegate::findOrFail($request->id);
        $useCont->id=$request->id;
        $useCont->name=$request->name;
        $useCont->surname=$request->surname;
        $useCont->phone=$request->phone;
        $useCont->email=$request->email;
        $useCont->type_of_user=$request->type_of_user;
        $useCont->id_roles=$request->id_roles;
        $useCont->id_charge=$request->id_charge;
        $useCont->password=$request->password;
        //Metodo Guardar:
        $useCont->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $useCont = Navegate::findOrFail($request->id);
        //Metodo Eliminar
        $useCont->delete();
    }
}
