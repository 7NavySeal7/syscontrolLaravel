<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\UnitOfMeasurementController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ChargesController;
use App\Http\Controllers\NavegateController;
use App\Http\Controllers\AssignMaterialController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserMaterialController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

/*-------------------------------------------------------------------------------------------------------*/

//Ingreso de Datos Sección de proveedores:

//Control de Cities:
Route::post('/api/cities/store',[CitiesController::class,'store']); //true
Route::put('/api/cities/update',[CitiesController::class,'update']); //true
Route::delete('/api/cities/delete',[CitiesController::class,'destroy']); //true
Route::get('/api/cities/index',[CitiesController::class,'index'])->name('cities'); //true
Route::get('/api/cities/getData',[CitiesController::class,'getData']); //true
//Control de Departaments:
Route::post('/api/departaments/store',[DepartamentController::class,'store']); //true
Route::put('/api/departaments/update',[DepartamentController::class,'update']); //true
Route::delete('/api/departaments/delete',[DepartamentController::class,'destroy']); //true
Route::get('/api/departaments/index',[DepartamentController::class,'index'])->name('departaments'); //true
Route::get('/api/departaments/getData',[DepartamentController::class,'getData']); //true

//Control de Countries:
Route::post('/api/countries/store',[CountryController::class,'store']); //true
Route::put('/api/countries/update',[CountryController::class,'update']); //true
Route::delete('/api/countries/delete',[CountryController::class,'destroy']); //true
Route::get('/api/countries/index',[CountryController::class,'index'])->name('countries'); //true
Route::get('/api/countries/getData',[CountryController::class,'getData']); //true

//Control de Vendors:
Route::post('/api/vendors/store',[VendorsController::class,'store']); //true
Route::put('/api/vendors/update',[VendorsController::class,'update']); //true
Route::delete('/api/vendors/delete',[VendorsController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/vendors/index',[VendorsController::class,'index'])->name('proveedores'); //true
Route::get('/api/vendors/getData',[VendorsController::class,'getData']); //true

/*-------------------------------------------------------------------------------------------------------*/

//Ingreso de Datos Sección de Usuarios:

//Control de Charges:
Route::post('/api/charges/store',[ChargesController::class,'store']); //true
Route::put('/api/charges/update',[ChargesController::class,'update']); //true
Route::delete('/api/charges/delete',[ChargesController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/charges/index',[ChargesController::class,'index'])->name('cargos'); //true
Route::get('/api/charges/getData',[ChargesController::class,'getData']); //true

//Control de Roles:
Route::post('/api/roles/store',[RolesController::class,'store']); //true
Route::put('/api/roles/update',[RolesController::class,'update']); //true
Route::delete('/api/roles/delete',[RolesController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/roles/index',[RolesController::class,'index'])->name('roles'); //true
Route::get('/api/roles/getData',[RolesController::class,'getData']); //true

//Control de Navegates:
Route::post('/api/navegate/store',[NavegateController::class,'store']); //true
Route::put('/api/navegate/update',[NavegateController::class,'update']); //true
Route::delete('/api/navegate/delete',[NavegateController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/navegate/index',[NavegateController::class,'index'])->name('usuario'); //true
Route::get('/api/navegate/getData',[NavegateController::class,'getData']); //true

/*-------------------------------------------------------------------------------------------------------*/

//Ingreso de Datos Sección Categorias y Materiales:

//Control de Categories:
Route::post('/api/categories/store',[CategoryController::class,'store']); //true
Route::put('/api/categories/update',[CategoryController::class,'update']); //true
Route::delete('/api/categories/delete', [CategoryController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/categories/index',[CategoryController::class,'index'])->name('categorias'); //true
Route::get('/api/categories/getData',[CategoryController::class,'getData']); //true

//Control de Materials:
Route::post('/api/materials/store',[MaterialController::class,'store']); //true
Route::put('/api/materials/update',[MaterialController::class,'update']); //true
Route::delete('/api/materials/delete',[MaterialController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/materials/index',[MaterialController::class,'index'])->name('materiales'); //true
Route::get('/api/materials/getData',[MaterialController::class,'getData']); //true

/*-------------------------------------------------------------------------------------------------------*/

//Ingreso de Datos Peso y Unidades de Medida:

//Control de Weight:
Route::post('/api/weights/store',[WeightController::class,'store']); //true
Route::put('/api/weights/update',[WeightController::class,'update']); //true
Route::delete('/api/weights/delete',[WeightController::class,'destroy']); //true
Route::get('/api/weights/index',[WeightController::class,'index']); //true
Route::get('/api/weights/getData',[WeightController::class,'getData']); //true

//Control UnitOfMeasurements:
Route::post('/api/measurements/store',[UnitOfMeasurementController::class,'store']); //true
Route::put('/api/measurements/update',[UnitOfMeasurementController::class,'update']); //true
Route::delete('/api/measurements/delete',[UnitOfMeasurementController::class,'destroy']); //true
Route::get('/api/measurements/index',[UnitOfMeasurementController::class,'index']); //true
Route::get('/api/measurements/getData',[UnitOfMeasurementController::class,'getData']); //true

/*-------------------------------------------------------------------------------------------------------*/

//Ingreso de datos Sección de Productos:

//Control de Products:
Route::post('/api/products/store',[ProductsController::class,'store']); //true
Route::put('/api/products/update',[ProductsController::class,'update']); //true
Route::delete('/api/products/delete',[ProductsController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/products/index',[ProductsController::class,'index'])->name('productos'); //true
Route::get('/api/products/getData',[ProductsController::class,'getData']); //true

/*-------------------------------------------------------------------------------------------------------*/

//Ingreso de datos Asignación de Material y Registro de Asignación en UserMaterial:

//Control de AssignMaterials:
Route::post('/api/assign/store',[AssignMaterialController::class,'store']); //true
Route::put('/api/assign/update',[AssignMaterialController::class,'update']); //true
Route::delete('/api/assign/delete',[AssignMaterialController::class,'destroy']); //true
Route::middleware(['auth:sanctum', 'verified'])->get('/api/assign/index',[AssignMaterialController::class,'index'])->name('asignaciónMaterial'); //true
Route::get('/api/assign/getData',[AssignMaterialController::class,'getData']); //true


//Control de UserMaterials:
Route::get('/api/user_material/getDetails',[UserMaterialController::class,'getDetails']); //true
Route::put('/api/user_material/update',[UserMaterialController::class,'update']); //true
//Route::delete('/api/user_material/delete',[UserMaterialController::class,'destroy']); //true
Route::get('/api/user_material/index',[UserMaterialController::class,'index'])->name('userMaterial'); //true
Route::get('/api/user_material/getData',[UserMaterialController::class,'getData']); //true

/*-------------------------------------------------------------------------------------------------------*/
