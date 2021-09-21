<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vendors;
use Inertia\Inertia;

class VendorsController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $proved = Vendors::select('name')->get();
        }else{
            $proved = Vendors::select('name')->where('id','=',$buscar)->get();
        }
        return ['proved'=>$proved];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $proved = Vendors::join('countries','vendors.id_country','countries.id')
        ->select('vendors.name','vendors.nit','vendors.direction','vendors.email',
        'vendors.contact','vendors.web','countries.name as pais')
        ->get();
        return Inertia::render('Proveedores',['proved'=>$proved]);
    }
    //Ingreso de información:
    public function store(request $request){
        $proved = new Vendors;
        $proved->name=$request->name;
        $proved->nit=$request->nit;
        $proved->direction=$request->direction;
        $proved->email=$request->email;
        $proved->contact=$request->contact;
        $proved->web=$request->web;
        $proved->id_country=$request->id_country;
        //Metodo Guardar:
        $proved->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $proved = Vendors::findOrFail($request->id);
        $proved->name=$request->name;
        $proved->nit=$request->nit;
        $proved->direction=$request->direction;
        $proved->email=$request->email;
        $proved->contact=$request->contact;
        $proved->web=$request->web;
        $proved->id_country=$request->id_country;
        //Metodo Guardar:
        $proved->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $proved = Vendors::findOrFail($request->id);
        //Metodo Eliminar
        $proved->delete();
    }
}
