<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductoOrden;
use App\ProductoFotos;

class EditorController extends Controller
{
    public function lapiz(Request $request, ProductoOrden $producto_orden){
    	$carpeta_orden = base_path() . '/public/ediciones/' . $producto_orden->id . "/";
		$foto = $request->file('file')->getClientOriginalName();
		$file_path = pathinfo($foto,PATHINFO_FILENAME);
		move_uploaded_file($file_path, $carpeta_orden.'/'.$foto );
		$file =  $request->file('file');
        $file->move($carpeta_orden, $foto);
		return "list";
    }
    public function marco(Request $request , ProductoFotos $producto_fotos){
    	$dimension = $producto_fotos->productoOrden->dimension->solo_dimension;
    	return view( 'panel.editor.marco', compact( 'producto_fotos', 'dimension' ) );
    }
    public function guardarMarco(Request $request){
    	$foto = ProductoFotos::find($request->id_foto);
    	$foto->update([
    		"fondo" => $request->fondo,
    		"fuente" => $request->fuente,
    		"texto" => $request->texto,
    	]);
    	return true;
    }
}
