@extends('layouts.app')

@section('content')
<style>
	textarea:focus, input:focus{
	    outline: none;
	}
	@font-face {
	    font-family:  'font-1';
	    src: url('/assets/fuentes/ttf/font-1.eot');
	    src: url('/assets/fuentes/ttf/font-1.eot?#iefix') format('embedded-opentype'),
	        url('/assets/fuentes/ttf/font-1.woff2') format('woff2'),
	        url('/assets/fuentes/ttf/font-1.woff') format('woff'),
	        url('/assets/fuentes/ttf/font-1.ttf') format('truetype'),
	        url('/assets/fuentes/ttf/font-1.svg#font-1') format('svg');
	    font-weight: normal;
	    font-style: normal;
	    font-display: swap;
	}
	@font-face {
	    font-family: 'font-2';
	    src: url('/assets/fuentes/ttf/font-2.eot');
	    src: url('/assets/fuentes/ttf/font-2.eot?#iefix') format('embedded-opentype'),
	        url('/assets/fuentes/ttf/font-2.woff2') format('woff2'),
	        url('/assets/fuentes/ttf/font-2.woff') format('woff'),
	        url('/assets/fuentes/ttf/font-2.ttf') format('truetype'),
	        url('/assets/fuentes/ttf/font-2.svg#font-2') format('svg');
	    font-weight: normal;
	    font-style: normal;
	    font-display: swap;
	}
	@font-face {
	    font-family: 'font-3';
	    src: url('/assets/fuentes/ttf/font-3.eot');
	    src: url('/assets/fuentes/ttf/font-3.eot?#iefix') format('embedded-opentype'),
	        url('/assets/fuentes/ttf/font-3.woff2') format('woff2'),
	        url('/assets/fuentes/ttf/font-3.woff') format('woff'),
	        url('/assets/fuentes/ttf/font-3.ttf') format('truetype'),
	        url('/assets/fuentes/ttf/font-3.svg#font-3') format('svg');
	    font-weight: normal;
	    font-style: normal;
	    font-display: swap;
	}
	@font-face {
	    font-family: 'font-4';
	    src: url('/assets/fuentes/ttf/font-4.eot');
	    src: url('/assets/fuentes/ttf/font-4.eot?#iefix') format('embedded-opentype'),
	        url('/assets/fuentes/ttf/font-4.woff2') format('woff2'),
	        url('/assets/fuentes/ttf/font-4.woff') format('woff'),
	        url('/assets/fuentes/ttf/font-4.ttf') format('truetype'),
	        url('/assets/fuentes/ttf/font-4.svg#font-4') format('svg');
	    font-weight: normal;
	    font-style: normal;
	    font-display: swap;
	}
</style>
<form id="personaliza" method="post">
	<input type="hidden" id="fuente" value="{{$producto_fotos->fuente}}">
	<input type="hidden" id="fondo" value="{{$producto_fotos->fondo}}">
	<input type="hidden" id="id_foto" value="{{$producto_fotos->id}}">
	<input type="hidden" id="foto" value="{{$producto_fotos->nombre}}">

	<input type="hidden" id="tipo" value="{{$dimension}}">						}
	<section class="bg-light" style="padding: 30px 0;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-4" style="padding-top:80px;">
				<a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm" >Atras</a>
				</div>
				<div class="col-4" style="padding-top:80px;" align="center">
				<small>Editar fondo y texto</small>
				</div>
				<div class="col-4" style="padding-top:80px;" align="right">
				<button type="submit" class="btn btn-dark btn-sm">Guardar</button>
				</div>
			</div>
		</div>
	</section>
	<section style="padding: 20px 0;">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-3 col-md-4 col-12">
	                <div class="card border-0 sidebar sticky-bar">
	                    <div class="card-body p-0">

	                        <div class="widget" style="padding-top:10px;">
	                            <h4 class="widget-title">Fondo de Color</h4>
	                            <ul class="list-unstyled mt-1 mb-0">
								<?php

									$directory="assets/fondos/".$dimension."/color/";
									foreach (glob($directory."*.jpg") as $filename) {
									$fotos = basename($filename, '.jpg');
									 ?>
	                                <li class="list-inline-item">
									<a href="#" id="<?php echo $fotos;  ?>">
									<img src="/<?php echo $filename; ?>" class="rounded-circle" height="30" width="30" style="border: 1px solid #ccc;">
									</a>
									</li>
									<?php }  ?>
							   </ul>
	                        </div>

							<div class="widget" style="padding-top:10px;">
	                            <h4 class="widget-title">Fondo de Imagen</h4>
	                            <ul class="list-unstyled mt-1 mb-0">
								<?php
									 $directory="assets/fondos/".$dimension."/pattern/";

									foreach (glob($directory."*.jpg") as $filename) {
									$fotos = basename($filename, '.jpg');
									 ?>
	                                <li class="list-inline-item">
									<a href="#" id="<?php echo $fotos;  ?>">
									<img src="/<?php echo $filename; ?>" class="rounded-circle" height="30" width="30" style="border: 1px solid #ccc;">
									</a>
									</li>
									<?php }  ?>
							   </ul>
	                        </div>

							<div class="widget" style="padding-top:10px;">
	                            <h4 class="widget-title">Texto</h4>
	                            <ul class="list-unstyled mt-1 mb-0">
								<?php
									$directory="assets/fuentes/cover/";
									foreach (glob($directory."*.jpg") as $filename) {
									$fotos = basename($filename, '.jpg');
									 ?>
	                                <li class="list-inline-item">
									<a href="#" id="<?php echo $fotos;  ?>">
									<img src="/<?php echo $filename; ?>" class="img-fluid rounded" style="border: 1px solid #ccc;">
									</a>
									</li>
									<?php }  ?>
							   </ul>
	                        </div>

	                    </div>
	                </div>
	            </div>

	            <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
	                <div class="row">


	                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
	                        &nbsp;
	                    </div>
						<div class="col-4">
	                       <div class="card  text-center border-0">
								<div class="position-relative" style="height: 350px;width:290px;border: 1px solid #ccc;" id="mini-editor">
									<img src="/ediciones/{{$producto_fotos->id_producto_orden}}/{{$producto_fotos->nombre}}" style="object-fit: cover;height: 300px; width: 270px; padding-top: 10px;">
								<input type="text" id="texto" value="{{$producto_fotos->texto}}" name="texto" placeholder="Texto" maxlength="40" style="background: transparent;text-align: center;padding-top:10px;font-size:15px;border: 0px;width: 270px;">
								</div>
							</div>
	                    </div>
	                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
	                      &nbsp;
	                    </div>


	                </div>
	            </div>
	        </div>
	    </div>
	</section>
</form>
<div class="modal fade" id="paso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
      <div class="modal-content">
        <div class="modal-body">
         <div align="center"><img src="/assets/img/bien.png"><br><br>Su diseño fue guardado</div>

        </div>
        <div class="modal-footer">
          <a href="" onclick="javascript:window.location='index.php?page=edita&orden=" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
        </div>
      </div>
    </div>
</div>
<script>
$("#personaliza").submit(function(e) {
	e.preventDefault();
	var formData = new FormData();
	formData.append('fondo', $('#fondo').val());
	formData.append('fuente', $('#fuente').val());
	formData.append('texto', $('#texto').val());
	formData.append('foto', $('#foto').val());
	formData.append('tipo', $('#tipo').val());
	formData.append('id_foto', $('#id_foto').val());

	$.ajax('/api/guardarMarco', {
		method: "POST",
		data: formData,
		processData: false,
		contentType: false,
		success: function (data) {
			setTimeout(function(){
			window.location.href = '/editar-fotos/{{$producto_fotos->productoOrden->orden->id}}/{{$producto_fotos->productoOrden->producto->id}}/{{$producto_fotos->id_producto_orden}}';
			}, 4000);
			$("#paso").modal('show');
		},
		error: function (data) {
			console.log(data);
		}
	});
});

$(document).ready(function () {
	preview();
	<?php
		$directory="assets/fondos/".$dimension."/color/";

		foreach (glob($directory."*.jpg") as $filename) {
		$fotos = basename($filename, '.jpg');  ?>
		$('#<?php echo $fotos;  ?>').click(function () {
	        $('#mini-editor').css('background-image', 'url("/<?php echo $filename; ?>")');
			$('#mini-editor').css('background-size', '350px 290px');
			$('#fondo').val('<?php echo $filename; ?>');
			console.log('{{$filename}}')
	    });
    <?php }  ?>
	<?php

		$directory="assets/fondos/".$dimension."/pattern/";
		foreach (glob($directory."*.jpg") as $filename) {
		$fotos = basename($filename, '.jpg');  ?>
	 $('#<?php echo $fotos;  ?>').click(function () {

          $('#mini-editor').css('background-image', 'url("/<?php echo $filename; ?>")');
		  $('#mini-editor').css('background-size', '350px 290px');
		  $('#fondo').val('<?php echo $filename; ?>');
		  console.log('{{$filename}}')
    });
    <?php }  ?>
	<?php
		$directory="assets/fuentes/ttf/";
		foreach (glob($directory."*.ttf") as $filename) {
		$fotos = basename($filename, '.ttf');  ?>
	 	$('#<?php echo $fotos;  ?>').click(function () {
	 		console.log('<?php echo $fotos; ?>');
        	$('#texto').css('font-family', '<?php echo $fotos; ?>');
			$('#fuente').val('<?php echo $filename; ?>');
    	});
    <?php }  ?>

});

function preview(){
	var fondo = $('#fondo').val();
	var fuente = $('#fuente').val();
	console.log(fuente)

	if(fuente != ''){
		fuente = fuente.split('/');
		fuente = fuente[3].split(".");
		fuente = fuente[0]
		$('#texto').css('font-family', fuente);
	}


	$('#mini-editor').css('background-image', 'url("/' + fondo + '")');

}
</script>
@endsection