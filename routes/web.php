<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
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

Auth::routes();


//RUTA INDEX

Route::get('/', function () {
    return view('home');

});


//RUTAS ADMIN O PRINCIPALES

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTAS SERVICIOS

Route::resource('/servicios', App\Http\Controllers\ServicioController::class);
Route::post('/servicios', [App\Http\Controllers\ServicioController::class, 'servicio_guardar' ])->name('guardar_Servicio');
Route::post('/servicios{servicio}', [App\Http\Controllers\ServicioController::class, 'editar_servicio' ])->name('Servicio_editar');


//RUTAS CLIENTES

Route::resource('/clientes', App\Http\Controllers\ClienteController::class);
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'cliente_guardar'])->name('ClienteGuardar');
Route::put('/clientes{cliente}', [App\Http\Controllers\ClienteController::class , 'Editar_cliente'])->name('editar_cliente');


//RUTAS PROVEEDORES

Route::resource('/proveedores', App\Http\Controllers\ProveedoreController::class);
Route::post('/proveedores', [App\Http\Controllers\ProveedoreController::class, 'guardar_proveedor'])->name('Proveedores_guardar');
Route::put('/proveedores{proveedore}', [App\Http\Controllers\ProveedoreController::class, 'editar_proveedor' ])->name('editar');
Route::put('/proveedores', [App\Http\Controllers\ProveedoreController::class, 'cerrar'])->name('Proveedorescerrar');


//RUTAS USUARIOS

Route::put('/usuarios{usuario}', [App\Http\Controllers\UsuarioController::class , 'editar_usuario'])->name('Editar_usuario');
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
Route::post('/usuarios', [App\Http\Controllers\UsuarioController::class, 'usuario_guardar'] )->name('guardar_usuario');



//RUTAS PRODUCTOS
Route::resource('/productos', App\Http\Controllers\ProductoController::class);
Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'guardar'])->name('ProductoGuardar');
Route::put('/productos{producto}', [App\Http\Controllers\ProductoController::class, 'editar'])->name('ProductoEditar');
Route::put('/productos', [App\Http\Controllers\ProductoController::class, 'update_status'])->name('Editar_estado');





//RUTAS COMPRAS

Route::resource('/compras', App\Http\Controllers\ComprasController::class);
Route::put('/compras/Agregar_compra', [App\Http\Controllers\ComprasController::class, 'show'])->name('Agregar_compra');
Route::post('/compras/Agregar_compra', [App\Http\Controllers\ComprasController::class, 'Agregar_producto_compra'])->name('Agregar_producto_compra');
Route::post('/compras', [App\Http\Controllers\ComprasController::class, 'Agregar_compra'])->name('Guardar_compra');
Route::post('/compras/agregar.php', [App\Http\Controllers\ComprasController::class]);





//RUTAS VENTAS

Route::resource('/ventas', App\Http\Controllers\VentasController::class);
Route::post('/ventas/Agregar_venta', [App\Http\Controllers\VentasController::class, 'Agregar_venta'])->name('Agregar_venta');
