<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoFotos;
use App\ProductoOrden;
use App\Orden;
use App\Producto;
use App\Icono;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Detalle;
use Illuminate\Support\Facades\Http;
use App\User;

class TestController extends Controller
{
    public function cortar(){
        $data = [
            "id" => 1
        ];
        $usuario = User::find(1);
        $response = Http::post('https://api.laretrateriaec.com/api/editarUsuario');
        $response = $response->json();
        $request = new Request;
        $request->request->add(['nombres' => 'test']);
        //dd($request);
        if($response["status"] == 'error'){
            $errors = $response["data"];

            return view('panel.usuario.perfil', compact('usuario'))->withErrors($errors)->withInput($request->all());
        }
    }
 
}
