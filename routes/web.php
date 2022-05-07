<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', 'TestController@cortar');
Route::get('/', 'HomeController@index');
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/dispositivo', function () {
    return view('dispositivo');
});

Auth::routes();



Route::group(['middleware' => ['web', 'dispositivo']], function () {
	//Route::get('home', 'HomeController@index')->name('home');
	Route::get('productos/{id}/categoria', 'Producto\ProductoController@getProductosCategoria');
	Route::get('productos/{id}/detalle', 'Producto\ProductoController@getProductoDetalle');
	Route::post('cargar-fotos', 'Editor\CargarController@index');
	Route::get('editar-fotos/{orden}/{producto}/{producto_orden}', 'Editor\CargarController@indexEditor');
	Route::get("revertir/{id}", "Editor\CargarController@revertir");
	
	Route::get("/preview-general/{producto_orden}", "Editor\CargarController@verPreview");
	Route::post('editar-fotos/{producto_orden}', 'Editor\CargarController@guardarSubOrden');
	Route::get('pagar', 'Pago\PagoController@ordenes');
	Route::post('/pago/{orden}', 'Pago\PagoController@index');
	Route::put('/pago/{orden}', 'Pago\PagoController@pagar');
	Route::get('/mis-pedidos', 'Usuario\UsuarioController@ordenes');
	Route::get('/perfil', 'Usuario\UsuarioController@perfil');
	Route::put('/perfil', 'Usuario\UsuarioController@update');
	Route::get('/agregar-marco/{producto_fotos}', 'Editor\EditorController@marco');
	Route::post('guardarDiseno', 'Editor\CargarController@guardarDiseno');
	Route::get('/politicas', function(){
		return view('panel.politicas.index');
	});
	Route::get('/terminos', function(){
		return view('panel.terminos.index');
	});
	Route::get('login/facebook', 'Auth\LoginFacebookController@redirect');
	Route::get('login/facebook/callback', 'Auth\LoginFacebookController@callback');
	Route::get('sub-orden/{producto_orden}/eliminar', 'Pago\PagoController@eliminar');
	Route::post('preview/{producto_orden}', 'Producto\ProductoController@getProductoPreview');
	Route::post('/contacto', 'HomeController@contacto');

});

