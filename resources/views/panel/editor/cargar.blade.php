@extends('layouts.app')

@section('content')

<style>
	svg.uppy-c-icon.uppy-Dashboard-poweredByIcon{
		display:none;
	}
	.uppy-Dashboard-poweredByUppy{
		display:none;
	}
</style>
<section class="bg-light" style="padding: 30px 0;">
	<div class="container"> 
		<div class="row justify-content-center">
			<div class="col-4" style="padding-top:80px;">
			<a href="/productos/{{$producto->id}}/detalle" class="btn btn-dark btn-sm" >Atras</a>
			</div>
			<div class="col-4" style="padding-top:80px;" align="center">
			<small>Selecciona tus fotos</small>
			</div>
			<div class="col-4" style="padding-top:80px;" align="right">
			<small>Fotos (<span id="count">0</span>/{{$producto->dimensiones[0]->cap_max}})</small><br>
			<span style="font-size:10px;">Minimo {{$producto->dimensiones[0]->cap_min}} Fotos</span>
			</div>
		</div>
	</div>
</section>
<div class="container mt-4">
	<div class="alert alert-warning" role="alert" align="center">
		<a href="https://www.iloveimg.com/es/convertir-a-jpg" target="_blank" class="text-white text-center">
			Si tu imagen no esta en un Formato JPG, puedes convertirla aquí!
		</a>
	</div>

</div>

<section style="min-height:900px;">
    <div class="container">
		<div class="row">
			<div class="col-12">
			<link href="https://releases.transloadit.com/uppy/v1.23.2/uppy.min.css" rel="stylesheet">
			<div id="drag-drop-area" name="files[]" align="center"></div>
				<script src="https://releases.transloadit.com/uppy/v1.23.2/uppy.min.js"></script>
				<script src="assets/js/locale.js"></script>
				<script>
					var uppy = Uppy.Core({
					debug: true,
					autoProceed: false,
					locale: Uppy.locales.es_ES,
					onBeforeFileAdded: (currentFile, files) => {
						//document.getElementById('count').innerHTML=Object.keys(files).length;
						//console.log(currentFile)
					},
					restrictions: {
						maxFileSize: 100097152,//100Mb
						maxNumberOfFiles: {{$producto->dimensiones[0]->cap_max}},
						minNumberOfFiles: {{$producto->dimensiones[0]->cap_min}},
						allowedFileTypes: ['image/jpeg']
					}
					})
					.use(Uppy.Dashboard, {
						trigger: '.UppyModalOpenerBtn',
						inline: true,
						target: '#drag-drop-area',
						replaceTargetContent: true,
						showProgressDetails: true,
						note: '{{$producto->nombre}} - Dimensiones {{$producto->dimensiones[0]->dimension}} cm - Fotos Min: {{$producto->dimensiones[0]->cap_min}}',
						height: 600,
						width: 1200,
						browserBackButtonClose: true
					})

					//.use(Uppy.Instagram, { target: Uppy.Dashboard, companionUrl: 'https://companion.uppy.io' })
					//.use(Uppy.Facebook, { target: Uppy.Dashboard, companionUrl: 'https://companion.uppy.io' })
					.use(Uppy.XHRUpload, { endpoint: '/api/upload/{{$orden->id}}/{{$producto->id}}/{{$suborden->id}}' , fieldName: 'files[]'})

					uppy.on('complete', (result) => {
						console.log(result.failed.length)
						if( result.failed.length == 0 ){
							var fotos = document.getElementById("count");
							var contar = fotos.innerText;

							$.ajax('/api/copiar/{{$suborden->id}}', {
								method: "GET",
								processData: false,
								contentType: false,
								success: function (data) {
									console.log(data);
									window.location.href = '/editar-fotos/{{$orden->id}}/{{$producto->id}}/{{$suborden->id}}';
								},
								error: function (data) {
									console.log(data);
								}
							});
						}
				  	})
				  	uppy.on('file-removed', (file, reason) => {
					  var number =  parseInt( $('#count').text() );
					  $("#count").text(number -1 )
					})
					uppy.on('file-added', (file) => {
					  number =  parseInt( $('#count').text() );
					  $("#count").text(number + 1 )
					})
				</script>
			</div>
		</div>
	</div>
</section>

@endsection