<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Contacto;
use App\Orden;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ordenes = Orden::whereHas('pago')->whereHas('direccion')->get();
        return view('home');
    }

    public function contacto(Request $request){
        $email = "sofia@laretrateriaec.com";
        if($request->hasFile('archivo_contacto')){
            $destinationPath = base_path() . '/public/archivos/';
            $archivo = $request->file('archivo_contacto')->getClientOriginalName();
            $factura = pathinfo($archivo,PATHINFO_FILENAME);
            $extension = pathinfo($archivo,PATHINFO_EXTENSION);
            $nombre = $factura . "." . $extension;
            $file =  $request->file('archivo_contacto');
            $file->move($destinationPath, $nombre );
        }
        Notification::route('mail', $email)->notify(new Contacto($request));
        return redirect('/#contacto')->with(['success' => 'Tu Información ha sido enviada con exito!']);

    }
}
