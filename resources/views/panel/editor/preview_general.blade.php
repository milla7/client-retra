@extends('layouts.app')
@section('content')
<link href="/assets/css/alertify.css" rel="stylesheet" />
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
                
    		<a href="/editar-fotos/{{$producto_orden->orden->id}}/{{$producto_orden->producto->id}}/{{$producto_orden->id}}" class="btn btn-dark btn-sm" >Atras</a>
    		</div>
    		<div class="col-4" style="padding-top:80px;" align="center">
           
    		<small>Preview</small>
    		</div>
    		<div class="col-4" style="padding-top:80px;" align="right">
                <form action="/editar-fotos/{{$producto_orden->id}}" method="post" class="form-enviar">
                    @method('post')
                    @csrf
                    <button type="button" class="btn btn-dark btn-sm" onclick="enviar()">Siguiente</button>
                </form>
    		</div>
    	</div>
    </div>
    </section>

    <section style="min-height: 500px;">
        <div class="container">
            <div class="row" style="padding-top:50px;padding-bottom: 50px;">
                @if( $producto_orden->producto->id != 11 && $producto_orden->producto->id != 8 )
				@foreach ($producto_orden->fotos as $filename)
    				<div class="col-lg-3 col-md-6" style="padding-top:30px;">
                        <div class="card team text-center border-0">
                            <div class="position-relative doka" data-mode="modal">
                                <img style="box-shadow: 2px 2px 5px black;" src="/{{$filename->foto_original}}" data-src="/{{$filename->foto_original}}" class="img-fluid" >
                            </div>
                        </div>					
                    </div>
				@endforeach
                @else
                @foreach( $tiras as $tira )
                <div class="col-lg-3 col-md-6 offset-lg-2" style="padding-top:30px;">
                        <div class="card team text-center border-0">
                            <div class="position-relative doka" data-mode="modal">
                                <img  height="800" style="margin-right: 10px; box-shadow: 2px 2px 5px black;" 
                                src= '/assets/clientes/{{$producto_orden->orden->numero_orden}}/{{$producto_orden->producto->nombre}}/{{$producto_orden->id}}/{{$tira}}'>                           
                            </div>
                        </div>                  
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
</form>
<section class="bg-light" style="padding: 40px 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4" >
            <a href="/editar-fotos/{{$producto_orden->orden->id}}/{{$producto_orden->producto->id}}/{{$producto_orden->id}}" class="btn btn-dark btn-sm" >Atras</a>
            </div>
            <div class="col-4"  align="center">
           
            <small>Preview</small>
            </div>
            <div class="col-4" align="right">
                <form action="/editar-fotos/{{$producto_orden->id}}" method="post">
                    @method('post')
                    @csrf
                    <button type="button" class="btn btn-dark btn-sm" onclick="enviar()">Siguiente</button>
                </form>
            </div>
        </div>
    </div>
    </section>
<script src="/assets/js/alertify.js"></script>
<script type="text/javascript">
   
    function enviar(){
        alertify.confirm("He Revisado todas las fotos y estoy de acuerdo que se impriman de la manera que se visualizan", function (ev) {
            ev.preventDefault();
            $('.form-enviar').submit();
        }, function(ev) {
            //console.log(false)
        });
    }
</script>
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
        $('#producto').button();
    }
</script>
@endsection