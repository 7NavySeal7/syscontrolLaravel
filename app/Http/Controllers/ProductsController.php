<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    //Metodo getData
    public function getData(Request $request)
    {
        $buscar=$request->id;
        if ($buscar=='') {
            $prod = Products::select('id_category')->get();
        }else{
            $prod = Products::select('id_category')->where('id','=',$buscar)->get();
        }
        return ['prod'=>$prod];
    }   
    //Indexación de Información:
    public function index(Request $request){
        $prod = Products::get();
        return['prod'=>$prod];
    }
    //Ingreso de Información:
    public function store(request $request){
        $prod = new Products;
        $prod->id_navegate=$request->id_navegate;
        $prod->id_material=$request->id_material;
        $prod->id_supplier=$request->id_supplier;
        //$prod->internal_code=$request->internal_code;
        $prod->external_code=$request->external_code;
        $prod->quantity=$request->quantity;
        $prod->id_unit_weight=$request->id_unit_weight;
        $prod->weight_quantity=$request->weight_quantity;
        $prod->id_umeasurement=$request->id_umeasurement;
        $prod->height_measurement=$request->height_measurement;
        $prod->width_measurement=$request->width_measurement;
        $prod->depth_measurement=$request->depth_measurement;
        $prod->condition=$request->condition;
        $prod->picture=$request->picture;
        //Metodo Guardar:
        $prod->save();
    }
    //Actualización de Información:
    public function update(Request $request){
        $prod = Products::findOrFail($request->id);
        $prod->id_user=$request->id_user;
        $prod->id_material=$request->id_material;
        $prod->id_supplier=$request->id_supplier;
        //$prod->internal_code=$request->internal_code;
        $prod->external_code=$request->external_code;
        $prod->quantity=$request->quantity;
        $prod->unit_weight=$request->unit_weight;
        $prod->weight_quantity=$request->weight_quantity;
        $prod->u_measurement=$request->u_measurement;
        $prod->height_measurement=$request->height_measurement;
        $prod->width_measurement=$request->width_measurement;
        $prod->depth_measurement=$request->depth_measurement;
        $prod->condition=$request->condition;
        $prod->picture=$request->picture;
        //Metodo Guardar:
        $prod->save();
    }
    //Eliminación de Información:
    public function destroy(Request $request){
        $prod = Products::findOrFail($request->id);
        //Metodo Eliminar
        $prod->delete();
    }
}
