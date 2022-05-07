@extends('layouts.app')
@section('content')
<script>
    [
        { supported: "Promise" in window, fill: "https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js" },
        { supported: "fetch" in window, fill: "https://cdn.jsdelivr.net/npm/fetch-polyfill@0.8.2/fetch.min.js" },
        {
            supported:
                "CustomEvent" in window &&
                "log10" in Math &&
                "sign" in Math &&
                "assign" in Object &&
                "from" in Array &&
                ["find", "findIndex", "includes"].reduce(function (previous, prop) {
                    return prop in Array.prototype ? previous : false;
                }, true),
            fill: "/assets/bin/polyfill/doka.polyfill.min.js",
        },
    ].forEach(function (p) {
        if (p.supported) return;
        document.write('<script src="' + p.fill + '"><\/script>');
    });
</script>
<script src="/assets/bin/jquery/doka.jquery.min.js"></script>
<script src="/assets/js/FileSaver.js"></script>
<link href="/assets/bin/browser/doka.min.css" rel="stylesheet" type="text/css" />
<style>
    .doka > label {
        visibility: hidden;
        position: absolute;
    }
    .doka > input {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 1;
        cursor: copy;
        padding: 0;
        margin: 0;
        min-width: auto;
    }
    .doka .doka--root {
        position: absolute;
        left: 0;
        top: 0;
    }
    .doka[data-state='open'] > #button {
        display: none;
    }
</style>
    <section class="bg-light" style="padding: 30px 0;">
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-4" style="padding-top:80px;">
    		<a href="/productos/{{$producto_orden->id_producto}}/detalle" class="btn btn-dark btn-sm" >Atras</a>
    		</div>
    		<div class="col-4" style="padding-top:80px;" align="center">
            @if($producto_orden->id_producto == 8 || $producto_orden->id_producto == 11)
            <form method="post" id="producto" action="/preview/{{$producto_orden->id}}" target="_blank">
                @csrf
                <input type="hidden" name="id" value="{{$producto_orden->id}}">
              <button type="submit" class="btn btn-dark btn-sm mb-1">Ordenar Fotos</button>

            </form>
            @endif
    		<small>Edita tus fotos</small>
    		</div>
    		<div class="col-4" style="padding-top:80px;" align="right">
            


<form action="/editar-fotos/{{$producto_orden->id}}" method="post">
    @method('post')
    @csrf
            <button type="submit" class="btn btn-dark btn-sm">Siguiente</button>
    		</div>
    	</div>
    </div>
    </section>

    <section style="min-height: 500px;">
        <div class="container">
            <div class="row" style="padding-top:50px;padding-bottom: 50px;">


				@foreach ($producto_orden->fotos as $filename)
				<div class="col-lg-3 col-md-6" style="padding-top:30px;">
                    <div class="card team text-center border-0">
                        <div class="position-relative doka" data-mode="modal">

                            <img src="/<?php echo $filename->foto_original; ?>" data-src="/<?php echo $filename->foto_original; ?>" class="img-fluid" style="object-fit: cover; height: 200px; width: 200px;">


						   <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                <li class="list-inline-item"><a href="#" class="btn btn-icon btn-sm btn-dark mt-2" title="Editor de Color" id="button"><i data-feather="edit-2" title="Editar" class="icons"></i></a></li>
							<?php

							if($tipo =='2' OR $tipo =='3' OR $tipo =='7' OR $tipo =='9' OR $tipo =='11' OR $tipo =='14') {?>
								<li class="list-inline-item">
                                    <a href="/agregar-marco/{{$filename->id}}" class="btn btn-icon btn-sm btn-dark mt-2" title="Borde y Texto"><i data-feather="maximize" title="Editar" class="icons"></i></a></li>
                            <?php }  ?>
							</ul>

                        </div>

                    </div>
					<input type="hidden" id="nombre[]" name="nombre[]" value="<?php echo $filename->nombre; ?>">
					<?php if($tipo !='5' && $tipo !='15' && $tipo !='6' && $tipo !='7' && $tipo !='8' && $tipo !='13' && $tipo !='14'){ ?>
					<div class="ml-0 text-center" style="padding-top: 8px;">
						<input type="button" value="-" class="minus btn-icon btn btn-dark btn-sm btn-pills" onclick="restar({{$filename->id}})">
						<input type="text" step="1" min="1" id="cantidad[]" name="cantidad[]" value="{{$filename->cantidad}}" class="btn btn-icon btn-sm btn-pills btn-outline-primary">
						<input type="button" value="+" class="plus btn-icon btn btn-dark btn-sm btn-pills" onclick="sumar({{$filename->id}})">
					</div>
					  <?php }  ?>
                </div>
				@endforeach


            </div>
        </div>
    </section>
</form>
<section class="bg-light" style="padding: 40px 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4" >
            <a href="/productos/{{$producto_orden->id_producto}}/detalle" class="btn btn-dark btn-sm" >Atras</a>
            </div>
            <div class="col-4"  align="center">
            @if($producto_orden->id_producto == 8 || $producto_orden->id_producto == 11)
            <form method="post" id="producto" action="/preview/{{$producto_orden->id}}" target="_blank">
                @csrf
                <input type="hidden" name="id" value="{{$producto_orden->id}}">
              <button type="submit" class="btn btn-dark btn-sm mb-1">Ordenar Fotos</button>

            </form>
            @endif
            <small>Edita tus fotos</small>
            </div>
            <div class="col-4" align="right">
<form action="/editar-fotos/{{$producto_orden->id}}" method="post">
    @method('post')
    @csrf
            <button type="submit" class="btn btn-dark btn-sm">Siguiente</button>
            </div>
        </div>
    </div>
    </section>
<script>
	$('.plus').click(function () {
        if ($(this).prev().val() < 999) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    $('.minus').click(function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });
    Doka.setOptions({
    	labelStatusAwaitingImage: 'Seleccione su imagen',
    	labelStatusLoadImageError: 'Error',
    	labelStatusLoadingImage: 'Cargando',
    	labelStatusProcessingImage: 'Procesando',
    	labelColorBrightness: 'Brillo',
    	labelColorContrast: 'Contraste',
    	labelColorExposure: 'Exposición',
    	labelColorSaturation: 'Saturación',
    	labelButtonConfirm:'Siguiente',
    	labelButtonCancel:'Cancelar',
    	labelButtonUtilFilter: 'Filtros',
    	labelButtonUtilColor: 'Colores',
    	labelButtonUtilMarkup: 'Texto',
    	labelMarkupRemoveShape: 'Eliminar',
    	labelMarkupToolText:'Texto',
    	labelButtonCropRotateLeft: 'Rotar',
    	labelButtonUtilCrop: 'Girar',
    	cropAllowImageFlipHorizontal: false,
    	cropAllowImageFlipVertical: false

    });
$('.doka').each(createEditor)
function createEditor(index, element) {
    var $element = $(element);
    var $target = $('div', element);
    var $preview = $('img', element);
    var state = {
        src: $preview.data('src'),
        color: null,
        filter: null
    };
    var $editButton = $('#button', element);
    $editButton.on('click', handleButtonEditClick);
    function openEditor(src, options) {
        $element.attr('data-state', 'open');
        const doka = $.fn.doka.create($target.get(0), {
            utils: ['crop', 'color', 'filter'],
            styleLayoutMode: $element.data('mode'),
            onclose: handleDokaClose,
            outputData: true,
            allowAutoDestroy: true
        });
        doka.edit(src, options)
            .then(function(output) {
                if (!output) return;
                handleDokaConfirm(src, output);
            });
    }
    function handleButtonEditClick() {
        openEditor(state.src, state);
    }
    function handleDokaConfirm(input, output) {
        state.src = input;
        state.color = output.data.color;
        state.filter = output.data.filter;
        $preview.attr('src', URL.createObjectURL(output.file));

		var blobimg = output.file;
		var imgsrc = $preview.data('src');
		var nameString = imgsrc;
		var filename = nameString.split("/").pop();

		var blob = new File([blobimg], filename, {type: "image/jpeg"});

		 var formData = new FormData();

		formData.append('file', blob);
		formData.append('nombre', filename);

		$.ajax('/api/lapiz/{{$producto_orden->id}}', {
			method: "POST",
			data: formData,
			processData: false,
			contentType: false,
			success: function (data) {
				console.log(data);
			},
			error: function (data) {
				console.log(data);
			}
		});
    }
    function handleDokaClose() {
        $element.attr('data-state', 'closed');
    }
	}
</script>
<script>
    function restar(id){
        $.ajax('/api/restar/' + id, {
            method: "get",
            processData: false,
            contentType: false,
            success: function (data) {

            },
            error: function (data) {

            }
        });
    }
    function sumar(id){
        $.ajax('/api/sumar/' + id, {
            method: "get",
            processData: false,
            contentType: false,
            success: function (data) {

            },
            error: function (data) {

            }
        });
    }
    function enviar_preview(){
        $('#producto').submit();
    }
</script>
@endsection