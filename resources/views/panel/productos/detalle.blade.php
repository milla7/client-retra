@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 col-12">
                <div id="detalle" class="owl-carousel owl-theme">
                    <div><img src="/assets/productos/<?=$data['img_1']; ?>"class="img-fluid rounded-top mx-auto"></div>
					<div><img src="/assets/productos/<?=$data['img_2']; ?>"class="img-fluid rounded-top mx-auto"></div>
					<div><img src="/assets/productos/<?=$data['img_3']; ?>"class="img-fluid rounded-top mx-auto"></div>
				</div>
            </div>

            <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ml-lg-4">
                    <div style="font-size:32px;color:#152934;"><?=$data['nombre']; ?></div>
                    <div style="font-size:17px;color:#1194a3;padding-top:15px;font-family: 'Gotham-Light';font-weight: 600;">Desde $<?=$data['precio']; ?></div>

					<div class="p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">

								    <li class="nav-item">
                                        <a class="nav-link rounded active" id="pills-cloud-tab" data-toggle="pill" href="#pills-cloud" role="tab" aria-controls="pills-cloud" aria-selected="false">
                                            <div class="text-center pt-1 pb-1">
                                                <h4 class="title font-weight-normal mb-0">Detalles</h4>
                                            </div>
                                        </a>
                                    </li>
									<?php if($data['id_categoria']=='2' && $data['id']!='8'){?>

                                    <li class="nav-item">
                                        <a class="nav-link rounded" id="pills-smart-tab" data-toggle="pill" href="#pills-smart" role="tab" aria-controls="pills-smart" aria-selected="false">
                                            <div class="text-center pt-1 pb-1">
                                                <h4 class="title font-weight-normal mb-0">Precio</h4>
                                            </div>
                                        </a>
                                    </li>
									<?php }?>
                                </ul>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">
                                        <p class="text-muted mb-0"><?=nl2br($data['descripcion']); ?><br><?=nl2br($data['fecha_tecnica']); ?></p>
										<div class="container" style="padding-top: 20px;">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<img src="/assets/img/envio.png"> Envío<br>
											 <div style="font-size:12px;padding-top:15px;"><?=$data['entrega']; ?></div>
										 </div>
										<div class="col-md-6 col-sm-6">
											<img src="/assets/img/formato.png"> Formato
												<div class="form-group" style="padding-top:5px;">
													<form method="post" action="/cargar-fotos">
													@csrf
													<select class="form-control custom-select" id="dimension" name="dimension">
														@foreach($data->dimensiones as $dimension)
														<?php $dim = explode("-", $dimension["dimension"]);?>
														<option value="{{$dimension->id}}"> {{$dim[0]}} {{$dim[1]}} cm</option>
														@endforeach
													</select>
												</div>
								        </div>
									 </div>
                                     <div class="row">
                                         <div class="col-md-6 col-sm-6">

                                         </div>
                                        <div class="col-md-6 col-sm-6">
                                            Seleccionar Etiqueta
                                                <div class="form-group" style="padding-top:5px;">

                                                    <select class="form-control custom-select" name="etiqueta" id="etiqueta">
                                                        <option value="Ninguna">Ninguna</option>
                                                        <option value="Feliz Cumpleaños">Feliz Cumpleaños</option>
                                                        <option value="Navidad">Navidad</option>
                                                        <option value="San Valentin">San Valentin</option>
                                                        <option value="Día del Padre">Día del Padre</option>
                                                        <option value="Día de la Madre">Día de la Madre</option>
                                                     </select>
                                                </div>
                                        </div>
                                     </div>
									 </div>
                                    </div>
                                    <?php if($data['id_categoria']=='2' && $data['id']!='8'){?>
                                    <div class="tab-pane fade" id="pills-smart" role="tabpanel" aria-labelledby="pills-smart-tab">


									@foreach($data->dimensiones as $dimension)
									<?php $dim = explode("-", $dimension["dimension"]);?>
									<div>&nbsp;</div>
									<table style="width:100%;line-height: 13px;">
									<tbody>
										<tr>
											<th style="width:50px;border-bottom: 0;font-size:10px;letter-spacing: 0;" rowspan="2"><?=$dim['1']; ?> cm</th>
											<td style="border-bottom: 1px solid rgba(68,68,68,.05);font-family: 'Gotham-Light';font-weight: 600;font-size: 12px;letter-spacing: 0;text-align: center;">Cantidad</td>

											@foreach($dimension->precios as $cn)
											<td style="border-left: 1px solid rgba(68,68,68,.05);font-family: 'Gotham-Light';font-weight: 600;font-size: 12px; letter-spacing: 0; text-align: center; line-height: 28px;border-bottom: 1px solid rgba(68,68,68,.05);"> <?=$cn['cantidad']; ?> +</td>

											@endforeach
										</tr>
										<tr>
											<td style="border-bottom: 1px solid rgba(68,68,68,.05);font-family: 'Gotham-Light';font-weight: 600;font-size: 12px;letter-spacing: 0;text-align: center;">
												Precio<br />
												<span>(por unidad)</span>
											</td>

											@foreach($dimension->precios as $cn)
											<td style="border-left: 1px solid rgba(68,68,68,.05);font-family: 'Gotham-Light';font-weight: 600;font-size: 12px; letter-spacing: 0; text-align: center; line-height: 28px;border-bottom: 1px solid rgba(68,68,68,.05);">$<?=$cn['precio']; ?></td>

											@endforeach
										</tr>
									</tbody>
								</table>

								@endforeach
                                    </div>
									<?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div align="center">
					<input type="hidden" value="<?=$data['id'];?>" name="id" id="id">
					<button type="submit" class="btn btn-dark mt-3">Seleccionar</button>
					</form>
					 </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding-bottom: 70px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="mb-4">Perfecto Para</h4>
                  </div>
            </div>
        </div>

        <div class="row justify-content-center">
        	@foreach($data->iconos as $icono)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2" align="center">
              <img src="/assets/img/{{$icono->nombre}}">
			    <p class="text-muted mt-3 mb-0">{{$icono->descripcion}}</p>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endsection