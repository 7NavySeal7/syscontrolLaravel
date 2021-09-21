<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $categ = Category::select('name')->get();
        }else{
            $categ = Category::select('name')->where('id','=',$buscar)->get();
        }
        return ['categ'=>$categ];
    }
    //Indexación de Información:
    public function index(Request $request){
        $categ = Category::get();
        return inertia('Categorias',['categ'=>$categ]);
    }
    //Ingreso de Información:
    public function store(request $request){
        $categ = new Category;
        $categ->id=$request->id;
        $categ->name=$request->name;
        $categ->description=$request->description;
        //Metodo Guardar:
        $categ->save();
    }
    //Actualización de información:
    public function update(Request $request){
        $categ = Category::findOrFail($request->id);
        $categ->id=$request->id;
        $categ->name=$request->name;
        $categ->description=$request->description;
        //Metodo Guardar:
        $categ->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $categ = Category::findOrFail($request->id);
        //Metodo Eliminar
        $categ->delete();
    }
}
