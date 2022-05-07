<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Session;
use App\ProductoOrden;
use App\TiraOrden;
use DB;
class ProductoController extends Controller
{
    public function getProductosCategoria(Request $request, $id){
    	$productos = Producto::where("id_categoria", $id)->get();
    	$nombre = $productos[0]->categoria->nombre;
    	return view('panel.productos.index', compact('productos', 'nombre'));
    }
    public function getProductoDetalle($id){
    	$data = Producto::find($id);
    	return view('panel.productos.detalle', compact('data'));
    }

    public function getProductoPreview(ProductoOrden $producto_orden){
        $fotos = TiraOrden::where('id_orden_producto', $producto_orden->id)->orderBy('display_order', 'asc')->get();
        return view('panel.editor.preview', compact('fotos')); 
        
    }

    public function reorder(Request $request, $id){
        $order  = explode(",",$request["order"]);
        for($i=0; $i < count($order);$i++) {
            DB::select("UPDATE reorder SET display_order='" . $i . "' WHERE id=". $order[$i]);       
        }
    }

    public function tira($producto_orden){
        //Formato Tira de Fotos
        $ancho = 532;
        $alto  = 406;

        $nombres = [];
        $foto = 'assets/clientes/'. $producto_orden->orden->numero_orden ."/" . $producto_orden->producto->nombre  .  "/" . $producto_orden->id . "/";
        //Tira 1
        $destino = imagecreatefromjpeg('assets/fondos/5x15/color/5x15-0.jpg');
        $data = TiraOrden::where('id_orden_producto', $id)->orderBy('display_order', 'asc')->get();
        $origen = imagecreatefromjpeg($data[0]->image_name);
        $origen1 = imagecreatefromjpeg($data[1]->image_name);
        $origen2 = imagecreatefromjpeg($data[2]->image_name);
        $origen3 = imagecreatefromjpeg($data[3]->image_name);
        imagecopymerge($destino, $origen, 28, 28, 0, 0, 532, 406, 100);
        imagecopymerge($destino, $origen1, 28, 465, 0, 0, 532, 406, 100);
        imagecopymerge($destino, $origen2, 28, 900, 0, 0, 532, 406, 100);
        imagecopymerge($destino, $origen3, 28, 1335, 0, 0, 532, 406, 100);
        imagejpeg($destino, 'archivos/' . "T" . $producto_orden->fotos[0]->nombre);
        $nombres[0] = 'archivos/' . "T" . $producto_orden->fotos[0]->nombre;
        imagedestroy($destino);
        imagedestroy($origen);

        //Tira 2
        $destino = imagecreatefromjpeg('assets/fondos/5x15/color/5x15-0.jpg');
        $origen = imagecreatefromjpeg($data[0]->image_name);
        $origen1 = imagecreatefromjpeg($data[1]->image_name);
        $origen2 = imagecreatefromjpeg($data[2]->image_name);
        $origen3 = imagecreatefromjpeg($data[3]->image_name);
        imagecopymerge($destino, $origen, 28, 28, 0, 0, 532, 406, 100);
        imagecopymerge($destino, $origen1, 28, 465, 0, 0, 532, 406, 100);
        imagecopymerge($destino, $origen2, 28, 900, 0, 0, 532, 406, 100);
        imagecopymerge($destino, $origen3, 28, 1335, 0, 0, 532, 406, 100);
        imagejpeg($destino, 'archivos/' . "T" . $producto_orden->fotos[4]->nombre);
        $nombres[1] = 'archivos/' . "T" . $producto_orden->fotos[4]->nombre;
        imagedestroy($destino);
        imagedestroy($origen);
        return $nombres;

    }

    public function cortar($max_width, $max_height, $source_file, $dst_dir, $quality = 100){
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $image_create = "imagecreatefromjpeg";
        $image = "imagejpeg";
        if($imgsize["mime"] == "image/png"){
            $image_create = "imagecreatefrompng";
            //$image = "imagepng";
        }
        $quality = 100;
        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);
        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        if($width_new > $width){+
            $h_point = (($height - $height_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        }else{
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }
        $image($dst_img, $dst_dir, $quality);
        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);
    }


}
