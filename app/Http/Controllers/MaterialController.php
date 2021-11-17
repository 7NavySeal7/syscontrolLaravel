<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Material;
use Inertia\Inertia;

class MaterialController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $material = Material::select('name')->get();
        }else{
            $material = Material::select('name')->where('id','=',$buscar)->get();
        }
        return ['material'=>$material];
    }
    //Indexación de Información:
    public function index(Request $request){
        $material = Material::join('categories','materials.id_category','categories.id')
        ->select('materials.code','materials.name','categories.name as categname','materials.description')
        ->get();
        return inertia('Materiales',['material'=>$material]);
    } 
    
    public function index2(Request $request){
        $material = Material::join('categories','materials.id_category','categories.id')
        ->select('materials.id','materials.code','materials.name','categories.id as idCat','categories.name as nameCat','materials.description')
        ->get();
        return ['material'=>$material];
    } 
    //Ingreso de Informacion: 
    public function store(request $request){
        $material = new Material;
        $material->code=$request->code;
        $material->name=$request->name;
        $material->id_category=$request->id_category;
        $material->description=$request->description;
        //Metodo de Guardar
        $material->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $material = Material::findOrFail($request->id);
        $material->code=$request->code;
        $material->name=$request->name;
        $material->id_category=$request->id_category;
        $material->description=$request->description;
        //Metodo de Guardar
        $material->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $material = Material::findOrFail($request->id);
        //Metodo Eliminar
        $material->delete();
    }
}
