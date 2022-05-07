@extends('layouts.app')
@section('content')
@if( !Auth::user() )
	<script>window.location = "/login";</script>
@endif
<section class="bg-light" style="padding: 30px 0;">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-4" style="padding-top:80px;">

		</div>
		<div class="col-4" style="padding-top:80px;" align="center">
		<small>Detalles del Pedido</small>
		</div>
		<div class="col-4" style="padding-top:80px;" align="right">
		@if( $orden != null)
		@if(count($orden->productos_activos) > 0)
		<form action="/pago/{{$orden->id}}" method="post">
			@csrf
			<button type="submit" class="btn btn-dark btn-sm" >Finalizar</button>
		</form>
		@endif
		@endif
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
                                <th class="py-3" style="min-width: 300px;">Producto</th>
                                <th class="text-center py-3" style="min-width: 160px;">Precio</th>
                                <th class="text-center py-3" style="min-width: 160px;">Cantidad</th>
                                <th class="text-center py-3" style="min-width: 160px;">Total</th>
                            </tr>
                        </thead>

                        <tbody>
                        	@if($orden != null)
                        		@if(count($orden->productos_activos) > 0)
                                	@foreach($orden->productos_activos as $sub)
	                                	@if($sub->estatus == 1)
		                                    <tr>
											    <td class="h6"><a href="/sub-orden/{{$sub->id}}/eliminar" class="text-danger">X</a></td>
		                                        <td>
		                                            <div class="d-flex align-items-center">
		                                                <img src="/assets/productos/{{$sub->producto->img_1}}" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
		                                                <h6 class="mb-0 ml-3">{{$sub->producto->nombre}} {{$sub->dimension->solo_dimension}}</h6>
		                                            </div>
		                                        </td>
		                                        <?php
		                                        	$cantidad = 0;
		                                        ?>
		                                        @foreach($sub->fotos as $foto)
		                                        <?php
		                                        	$cantidad = $cantidad + $foto->cantidad;
		                                        ?>
		                                        @endforeach
		                                        @if( $cantidad == 0 )
		                                        <?php
		                                        	$cantidad = 1;
		                                        ?>
		                                        @endif
		                                        <td class="text-center">$
												{{round($sub->total / $cantidad, 2)}}
												</td>
		                                        <td class="text-center">
		                                        {{$cantidad}}
		                                        </td>
		                                        <td class="text-center font-weight-bold">$
												{{$sub->total}}
												</td>
		                                    </tr>
	                                    @endif
                                    @endforeach
                                @else
                                <tr><td class="text-center h6 text-danger" colspan="5"> El carrito esta vacio </td></tr>
                                @endif
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
@endsection