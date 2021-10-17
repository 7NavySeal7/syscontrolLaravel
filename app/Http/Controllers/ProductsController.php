<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use Inertia\Inertia;

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
        $prod = Products::join('materials','products.id_material','materials.id')
        ->join('vendors','products.id_supplier','vendors.id')
        ->join('weights','products.id_unit_weight','weights.id')
        ->join('unit_of_measurements','products.id_umeasurement','unit_of_measurements.id')
        ->select('products.id_material','materials.name as nameMat','vendors.name as nameProv','products.id_supplier',
        'products.external_code','products.quantity','weights.name as nameWeight','products.weight_quantity',
        'unit_of_measurements.name as nameUnit','products.height_measurement','products.width_measurement',
        'products.depth_measurement','products.condition','products.picture')
        ->get();
        return Inertia::render('Productos',['prod'=>$prod]);
    }
    public function index2(Request $request){
        $prod = Products::join('materials','products.id_material','materials.id')
        ->join('vendors','products.id_supplier','vendors.id')
        ->join('weights','products.id_unit_weight','weights.id')
        ->join('unit_of_measurements','products.id_umeasurement','unit_of_measurements.id')
        ->select('products.id as idProd','materials.id as id_material','materials.name as nameMat','vendors.id as id_vendors',
        'vendors.name as nameProv','products.external_code','products.quantity',
        'weights.id as idWeights','weights.name as nameWeight','products.weight_quantity',
        'unit_of_measurements.id as idMeasurement','unit_of_measurements.name as nameUnit','products.height_measurement','products.width_measurement',
        'products.depth_measurement','products.condition','products.picture')
        ->get();
        return ['prod'=>$prod];
    }
    //Ingreso de Información:
    public function store(request $request){
        $prod = new Products;
        $prod->id_material=$request->id_material;
        $prod->id_supplier=$request->id_supplier;
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
        $prod->id_material=$request->id_material;
        $prod->id_supplier=$request->id_supplier;
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
    //Eliminación de Información:
    public function destroy(Request $request){
        $prod = Products::findOrFail($request->id);
        //Metodo Eliminar
        $prod->delete();
    }
}
