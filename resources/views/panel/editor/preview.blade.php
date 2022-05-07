@extends('layouts.app')
@section('content')  
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
	.gallery ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}

	.gallery ul li {
		padding: 7px;
		border: 2px solid #ccc;
		float: left;
		margin: 10px 7px;
		background: none;
		width: auto;
		height: auto;
	}

	.gallery img {
		width: 250px;
	}
	
</style>
<section class="bg-light" style="padding: 30px 0;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4" style="padding-top:80px;">
			<a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm" >Atras</a>
			</div>
			<div class="col-4" style="padding-top:80px;" align="center">
			<small>Coloca las fotos en el orden que desees</small>
			</div>
			<div class="col-4" style="padding-top:80px;" align="right">
			<a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-dark btn-sm" >Guardar</a>
			</div>
		</div>
	</div>
</section>
<section style="padding: 20px 0;" >
	<div class="container gallery">
			<div class="reorder-gallery row">
				@foreach($fotos as $foto)
				<div id="{{$foto->id}}" class="ui-sortable-handle col-lg-6 col-xs-6 col-md-6 col-sm-6 d-flex justify-content-center" >
					<a href="javascript:void(0);"><img src="/ediciones/{{$foto->suborden->id}}/{{$foto->nombre}}" alt="" style="object-fit: cover; height: 200px; width: 200px; cursor: all-scroll;">
					</a></div>
				@endforeach
			</div>
	</div>
</section>


<script>
	$(document).ready(function(){	
		$("div.reorder-gallery").sortable({		
			update: function( event, ui ) {
				updateOrder();
			}
		});  
	});
	function updateOrder() {	
		var item_order = new Array();
		$('div.reorder-gallery div').each(function() {
			item_order.push($(this).attr("id"));
		});
		var order_string = 'order='+item_order;
		$.ajax({
			type: "post",
			url: "/api/reorder/{{$fotos[0]->id_orden_producto}}",
			data: order_string,
			cache: false,
			success: function(data){			
			}
		});
	}
</script>
@endsection
