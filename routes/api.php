<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/preview-general/{producto_orden}", "Editor\CargarController@preview");
Route::post('upload/{orden}/{producto}/{producto_orden}', 'Editor\CargarController@upload');
Route::post('lapiz/{producto_orden}', 'Editor\EditorController@lapiz');
Route::post('guardarMarco', 'Editor\EditorController@guardarMarco');
Route::get('restar/{producto_fotos}', function (App\ProductoFotos $producto_fotos){
	if($producto_fotos->cantidad > 1){
		$producto_fotos->cantidad--;
		$producto_fotos->save();
	}
	return true;
});
Route::get('sumar/{producto_fotos}', function (App\ProductoFotos $producto_fotos){
	$producto_fotos->cantidad++;
	$producto_fotos->save();
	return true;
});
Route::get('datos-factura', function(){
	$user = Auth::user();
	return response()->json(
		[
			"status" => "success",
			"data" => $user
		]
	);
});
Route::get('calcular-envio/{ciudad}', "Pago\GuiaController@calcular");


Route::get('cupon/{cupon}', function ($cupon){
	$cupon = App\Cupon::where('codigo', $cupon)->first();
	if($cupon && $cupon->estatus == 1){
		return response()->json([
			"status" => "success",
			"data" => [
				"cupon" => $cupon
			]
		]);
	}else{
		return response()->json([
			"status" => "error",
			"data" => [
				"error" => 'Cupon no encontrado'
			]
		]);
	}
});


Route::post('/contacto', 'HomeController@contacto');
Route::post('reorder/{id}', 'Producto\ProductoController@reorder');
Route::get('copiar/{producto_orden}', 'Editor\CargarController@copiarCarpeta');
