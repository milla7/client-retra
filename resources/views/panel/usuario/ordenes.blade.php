@extends('layouts.app')

@section('content')
@extends('layouts.app')
@section('content')
<?php
	if(!Auth::user()){
?>
<section style="padding-top:200px;padding-bottom:200px;">
<div class="container">
    <div class="row">
        <div class="col-12" align="center">
			<img src="assets/img/mal.png">
			<br>
			<br>
			¡Tu carrito esta vacío!
		</div>
	</div>
</div>
</section>
<?php
	}else{
?>
<section class="bg-light" style="padding: 30px 0;">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-4" style="padding-top:80px;">
		<a href="#" onclick="history.go(-1)" class="btn btn-dark btn-sm" >Atras</a>
		</div>
		<div class="col-4" style="padding-top:80px;" align="center">
		<small>Detalles del Pedido</small>
		</div>
		<div class="col-4" style="padding-top:80px;" align="right">

		</div>
	</div>
</div>
</section>
<section style="padding: 30px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive bg-white shadow">
                            <table class="table table-center table-padding mb-0">
                                <thead>
                                    <tr>
                                        <th class="py-3" style="min-width:20px "></th>
                                        <th class="py-3" style="min-width: 300px;">Número de Orden</th>
                                        <th class="text-center py-3" style="min-width: 160px;">Fecha</th>
                                        <th class="text-center py-3" style="min-width: 160px;">Estatus</th>
                                        <th class="text-center py-3" style="min-width: 160px;">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                	@if(count($ordenes) != 0)
                                	@foreach($ordenes as $orden)

	                                    <tr>
	                                    	<td>
	                                    		*
	                                    	</td>
	                                        <td>
	                                        	{{$orden->numero_orden}}
	                                        </td>
	                                        <td class="text-center">
												{{$orden->fecha}}
											</td>
	                                        <td class="text-center">
	                                           {{$orden->estatus->nombre}}
	                                        </td>
	                                        <td class="text-center font-weight-bold">$
	                                        	{{$orden->total}}
											</td>
	                                    </tr>
                                    @endforeach
                                    @else
                                    <tr><td class="text-center h6 text-danger" colspan="5"> El carrito esta vacio </td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div><!--end col-->

					<div class="col-lg-8 col-md-6 mt-4 pt-2">
                        <a href="/" class="btn btn-dark">Continuar Comprando</a>
                    </div>

                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
		<?php
	}
?>
@endsection

@endsection