@extends('layouts.app')
@section('content')
<style>
    #overlay, #overlay-envio {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.5);
      z-index: 2;
    }

    #text, #text-envio{
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 50px;
      color: white;
      transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
    }
</style>
<div id="overlay">
  <div id="text">Procesando Orden...</div>
</div>
<div id="overlay-envio">
  <div id="text-envio">Calculando Envío...</div>
</div>
<section class="bg-light" style="padding: 30px 0;">
    <input type="hidden" value="{{$orden->numero_orden}}" id="numero_orden">
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-4" style="padding-top:80px;">
    		<a href="#" onclick="history.go(-1)" class="btn btn-dark btn-sm" >Atras</a>
    		</div>
    		<div class="col-4" style="padding-top:80px;" align="center">
    		<small>Procesar Pedido</small>
    		</div>
    		<div class="col-4" style="padding-top:80px;" align="right">
    			&nbsp;
    		</div>
    	</div>
    </div>
</section>
<section style="padding: 30px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
            <div class="form-check form-check-inline my-4">
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="datos" name="mismos_datos" onclick="factura('{{ Auth::user()->id }}')">
                        <label class="custom-control-label" for="datos">Usar mismos datos para la factura</label>
                    </div>
                </div>


            </div>
                <div class="rounded shadow-lg p-4">
                    <h5 class="mb-0">Datos de Facturaci&oacute;n :</h5>

                    <form id="form" class="form mt-4" action="/pago/{{$orden->id}}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" id="transaction_reference" name="transaction_reference">
                        <input type="hidden" id="authorization_code" name="authorization_code">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Nombre  /  Raz&oacute;n Social <span class="text-danger">*</span></label>
                                    <input  id="nombres" name="nombres" type="text" class="form-control requerido" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Cedula / RUC <span class="text-danger">*</span></label>
                                    <input name="documento" id="cedula" type="number" class="form-control requerido" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong  id="cedula_error">La cedula debe tener almenos 10 digitos</strong>
                                    </span>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Direcci&oacute;n <span class="text-danger">*</span></label>
                                    <input name="direccion" id="direccion" type="text" class="form-control requerido" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Tel&eacute;fono <span class="text-danger">*</span></label>
                                    <input type="tel" id="celular" name="celular" class="form-control requerido" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control requerido" >
                                </div>
                            </div><!--end col-->
                            </div><!--end row-->
                    <div class="form-check form-check-inline my-4">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="datos_direccion" name="datos_direccion" onclick="direccion_envio('{{ Auth::user()->id }}')">
                                <label class="custom-control-label" for="datos_direccion">Usar mismos datos</label>
                            </div>
                        </div>

                        <div class="form-group mb-0 ml-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="oficina" name="oficina" onclick="recogerOficina()">
                                <label class="custom-control-label" for="oficina">Recoger en Oficina</label>
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-10 datos_envio">Datos de Envío y Metodo de Env&iacute;o :</h5>
                        <div class="row mt-10 datos_envio">
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Nombre  y Apellidos <span class="text-danger">*</span></label>
                                    <input id="nombres_envio" name="nombres_envio" type="text" class="form-control envio requerido requerido2" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Cedula / RUC <span class="text-danger">*</span></label>
                                    <input name="documento_envio" id="documento_envio" type="number" class="form-control envio requerido requerido2" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong  id="documento_error">La cedula debe tener almenos 10 digitos</strong>
                                    </span>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Tel&eacute;fono <span class="text-danger">*</span></label>
                                    <input type="tel" id="telefono" name="telefono_envio" class="form-control envio requerido requerido2" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="mail_envio" id="mail_envio" class="form-control envio requerido requerido2" >
                                </div>
                            </div><!--end col-->

                            <div class="col-6">
                                <div class="form-group position-relative">
                                    <label>Ciudad <span class="text-danger">*</span></label>
                                    <select class="form-control envio requerido requerido2" id="ciudad" name="ciudad" onchange="calcular()">
                                        <option value="">Buscar</option>
                                        @foreach(App\Provincia::all() as $provincia)
                                        <optgroup label="{{$provincia->nombre}}">
                                        @foreach($provincia->ciudades as $ciudad)
                                        <option value="{{$ciudad->id}}">{{$ciudad->nombre}} </option>
                                        @endforeach
                                        </optgroup>
                                        @endforeach
                                   </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="form-group position-relative">
                                    <label>Calle Principal <span class="text-danger">*</span></label>
                                    <input  id="calle" name="calle_envio" type="text" class="form-control envio requerido requerido2" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>N&uacute;mero De Casa, Departamento, Oficina, Etc.: <span class="text-danger">*</span></label>
                                    <input  id="casa" id="casa_envio" name="casa_envio" type="text" class="form-control envio requerido requerido2" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Calle Secundaria: </label>
                                    <input name="calle2_envio" id="calle2" type="text" class="form-control envio" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Referencia E Indicaciones: </label>
                                    <input  id="referencia" name="referencia_envio" type="text" class="form-control envio" >
                                </div>
                            </div><!--end col-->


                        </div><!--end row-->
                        <div class="row mt-10">
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Dejanos tu comentario sobre ¿qué opinas de La Retrateria?: <span class="text-danger"></span></label>
                                    <input id="comentarios" name="comentarios_envio" type="text" class="form-control envio">
                                </div>
                            </div><!--end col-->
                        </div>

                </div>


            </div><!--end col-->

            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="rounded shadow-lg p-4">
                    <div class="table-responsive">

                    <div class="form-group mb-0 position-relative">
                        <div class="input-group">
                            <input type="text" name="cupon" id="cupon" class="form-control" placeholder="Código de Cupón" >
                            <input type="hidden" name="cupon_aplicado" id="cupon_aplicado" value="0">
                            <div class="input-group-append">
                                <button class="btn btn-dark" id="boton_cupon" type="button" onclick="aplicarCupon()">Aplicar Cupón</button>
                            </div>
                            <div class="invalid-feedback cupon_error">Error, intente con otro cupon!</div>
                        </div>
                    </div>

                        <table class="table table-center table-padding mb-0">
                            <tbody>
                                <tr>
                                    <td class="h6 border-0">Subtotal</td>
                                    <input type="hidden" id="sub_total" value="{{$orden->sub_total}}">
                                    <td class="text-center font-weight-bold border-0" id="sub_total_text">$ {{$orden->sub_total }}</td>
                                </tr>
                                <tr>
                                    <td class="h6">Env&iacute;o</td>
                                    <input type="hidden" id="costo_envio" name="precio_envio">
                                    <td class="text-center font-weight-bold" id="envio_precio"> - </td>
                                </tr>
                                <tr>
                                    <td class="h6">IVA</td>
                                    <input type="hidden" id="iva" name="iva" value="{{$orden->iva}}">
                                    <input type="hidden" id="iva_s" name="iva_s" value="{{$orden->iva}}">
                                    <td class="text-center font-weight-bold" id="iva_text">$ {{$orden->iva}}</td>
                                </tr>
                                <tr class="bg-light">
                                    <td class="h5 font-weight-bold">Total</td>
                                    <input type="hidden" id="total" name="total" value="{{$orden->total}}">
                                    <td class="text-center text-primary h4 font-weight-bold" id="total_text">$ {{$orden->total}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <ul class="list-unstyled mt-4 mb-0">
                                <li class="mt-3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <div class="form-group mb-0">
                                        <input type="radio" id="tipo_p" name="tipo_pago" class="custom-control-input" value="1" checked>
                                        <label class="custom-control-label" for="tipo_p"><img src="/assets/img/selec_1.jpg"></label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <div class="form-group mb-0">
                                        <input type="radio" id="tipo_t" name="tipo_pago" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="tipo_t"><img src="/assets/img/selec_2.jpg"></label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div id="cuenta" style="display: none;" class="card explore-feature border-0 rounded text-center bg-white shadow">
                            <!--<div class="card-body">
                                <h5 class="mt-3 title">BANCO PICHINCHA</h5>
                                <p class="text-muted mb-0">
                                    Cuenta de Ahorros<br>
                                    2205782640<br>
                                    Sofía Becerra<br>
                                    0104388244<br>
                                    info@laretrateriaec.com <br>
                                    099-4625268<br>
                                </p>

                            </div>-->
                        </div>

            <div class="form-check form-check-inline my-4">
                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="terms_accept" name="terms_accept" onclick="terminos()">
                            <label class="custom-control-label" for="terms_accept">Acepto los Términos y Condiciones</label>
                        </div>
                    </div>
                </div>
                        <div class="mt-4 pt-2">
                            <button id="boton_pago" class="js-payment-checkout btn btn-block btn-dark">Pagar Ahora</button>
                        </div>
                    </div>
                </div>
            </div>
            </form><!--end form-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

<div class="modal fade" id="paso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
        <div class="modal-body">
            <div align="center"><img src="/assets/img/bien.png"><br><br>Su Pago fue Procesado</div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="no-paso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
        <div class="modal-body">
            <div align="center"><img src="/assets/img/mal.png"><br><br>Su Pago no fue Procesado</div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>

<script>
    function recogerOficina(){
        tipo = $("input[name=oficina]:checked").val()
        if(tipo == 'on'){
            $('.envio').removeClass("requerido");
            $('.envio').removeClass("is-invalid");
            $(".datos_envio").attr("hidden", "hidden");

            $('#costo_envio').val(0);
            $("#envio_precio").text("-");
            var precio = parseFloat( 0 )
            var sub_total = parseFloat( $('#sub_total').val() )
            var iva = ( sub_total + precio ) * 0.12;
            iva = parseFloat( iva.toFixed(2) )
            var total = (sub_total + iva + precio).toFixed(2);

            $('#iva_text').text("$ " + iva)
            $('#iva').val(iva)
            $('#total_text').text("$ " + total)
            $('#total').val((sub_total + iva + precio).toFixed(2))

            $('#ciudad').val("");
        }else{
            $(".datos_envio").attr("hidden", false);
            $('.requerido2').addClass("requerido");
            $('.requerido2').addClass("is-invalid");
        }
    }
    function calcular(){
        document.getElementById("overlay-envio").style.display = "block";
        var id_ciudad = $('#ciudad').val();
        $.ajax({
            url: '/api/calcular-envio/' + id_ciudad,
            success: function(respuesta) {
                document.getElementById("overlay-envio").style.display = "";
                $('#costo_envio').val(respuesta.data.precio);
                $("#envio_precio").text("$ " + respuesta.data.precio)
                var precio = parseFloat( respuesta.data.precio )
                var sub_total = parseFloat( $('#sub_total').val() )
                var iva = ( sub_total + precio ) * 0.12;
                iva = parseFloat( iva.toFixed(2) )
                var total = (sub_total + iva + precio).toFixed(2);

                $('#iva_text').text("$ " + iva)
                $('#iva').val(iva)
                $('#total_text').text("$ " + total)
                $('#total').val((sub_total + iva + precio).toFixed(2))
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    }
    $('input[type=radio][name=tipo_pago]').change(function() {
        if (this.value == '1') {
            $("#cuenta").hide();
        }
        else if (this.value == '2') {
           $("#cuenta").show();
        }
    });
    let btnOpenCheckout = document.querySelector('.js-payment-checkout');
    btnOpenCheckout.addEventListener('click', function () {
        event.preventDefault();
        tipo = $("input[name=tipo_pago]:checked").val()
        if(tipo == 1){
        	tarjeta();
        }else{
        	transferencia();
        }
    })
    function tarjeta(){
    	let paymentCheckout = new PaymentCheckout.modal({
	        client_app_code: 'LARETRATERIA-EC-CLIENT',
	        client_app_key: 'DJJPcw4T5beS9iZgHAP4Ps12mO25fO',
	        locale: 'es',
	        env_mode: 'prod',
	        onOpen: function () {
	          console.log('modal open');
	        },
	        onClose: function () {
	          console.log('modal closed');
	        },
	        onResponse: function (response) {
            	if (response.transaction.status === 'success') {
    				$("#transaction_reference").val( response.transaction.id )
                    $("#authorization_code").val( response.transaction.authorization_code )
                    document.getElementById("overlay").style.display = "block";
                    $('.form').submit();
                } else {
                	$("#no-paso").modal('show');
                }
	        }
        });

        paymentCheckout.open({
          user_id: '1759474057',
          user_email: $('#email').val(),
          user_phone: $('#celular').val(),
          order_description: 'Orden:' + $('#numero_orden').val(),
          order_amount: parseFloat($('#total').val()),
          order_vat: parseFloat($('#iva').val()),
          order_reference: $('#numero_orden').val(),
          order_taxable_amount: parseFloat($('#total').val()) - parseFloat($('#iva').val()),
          order_tax_percentage: 12
        });


	      window.addEventListener('popstate', function () {
	        paymentCheckout.close();
	      });
    }
    function transferencia(){
    	document.getElementById("overlay").style.display = "block";
        $('.form').submit();
        //$("#paso").modal('show');
    }
</script>
<script>
</script>

<script>
$(document).ready(function() {
    //Siempre que salgamos de un campo de texto, se chequeará esta función
    $('#datos').click();
    $("#boton_pago").prop("disabled", true);
    $("#form .requerido").keyup(function() {
        var form = $(this).parents("#form");
        var check = checkCampos(form);
        if(check) {
            $("#boton_pago").prop("disabled", false);
        }
        else {
            $("#boton_pago").prop("disabled", true);
        }
    });
});

//Función para comprobar los campos de texto
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function checkCampos(obj) {
    var camposRellenados = true;
    obj.find(".requerido").each(function() {
        var s = $(this);
        if( s.val().length <= 0 ) {
            $(this).addClass("is-invalid");
            camposRellenados = false;
        }else{
            $(this).removeClass("is-invalid");
        }
    });

    if( !$('#terms_accept').is(":checked") ){
        camposRellenados = false;
    }

    if( !isEmail( $('#email').val() ) && $('#email').val().length > 0 ){
        $('#email').addClass("is-invalid");
        camposRellenados = false;
    }else{
        $('#email').removeClass("is-invalid");
    }

    if( !isEmail( $('#mail_envio').val() ) && $('#mail_envio').val().length > 0 ){
        $('#mail_envio').addClass("is-invalid");
        camposRellenados = false;
    }else{
        $('#mail_envio').removeClass("is-invalid");
    }


    if( $( '#cedula').val().length < 10 && $( '#cedula').val().length != 0  ){
        $('#cedula').addClass("is-invalid");
        camposRellenados = false;
    }else{
        $('#cedula').removeClass("is-invalid");
    }


    if( $('#documento_envio').val().length < 10 ){
        if( $('#documento_envio').hasClass('requerido') ){
            $('#documento_envio').addClass("is-invalid");
            camposRellenados = false;
        }
    }else{
        $('#documento_envio').removeClass("is-invalid");
    }





    if(camposRellenados == false) {
        return false;
    }
    else {
        return true;
    }
}

function factura(id){
        var aux = $('#datos').is(":checked");
        //$('#check_' + id).prop('checked', true).triggerHandler('click');
        if(aux){
            $.ajax({
                type:'GET',
                url: "{{ url('api/datos-factura')}}",
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.status == 'success'){
                        value = data.data;
                        $('#nombres').val(value.nombres + " " + value.apellidos);
                        $('#cedula').val(value.cedula);
                        $('#direccion').val(value.direccion);
                        $('#celular').val(value.celular);
                        $('#email').val(value.email);
                        var form = $('#nombres').parents("#form");
                        var check = checkCampos(form);
                        if(check) {
                            $("#boton_pago").prop("disabled", false);
                        }
                        else {
                            $("#boton_pago").prop("disabled", true);
                        }
                    }
                },
                error: function(data){
                }
            });
        }else{
            $('#nombres').val("");
            $('#cedula').val("");
            $('#direccion').val("");
            $('#celular').val("");
            $('#email').val("");
            $("#boton_pago").prop("disabled", true);
        }
}

function direccion_envio(id){
        var aux = $('#datos_direccion').is(":checked");
        //$('#check_' + id).prop('checked', true).triggerHandler('click');
        if(aux){
            $.ajax({
                type:'GET',
                url: "{{ url('api/datos-factura')}}",
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.status == 'success'){
                        value = data.data;
                        $('#nombres_envio').val(value.nombres + " " + value.apellidos);
                        $('#documento_envio').val(value.cedula);
                        $('#direccion_envio').val(value.direccion);
                        $('#telefono').val(value.celular);
                        $('#mail_envio').val(value.email);
                        var form = $('#nombres').parents("#form");
                        var check = checkCampos(form);
                        if(check) {
                            $("#boton_pago").prop("disabled", false);
                        }
                        else {
                            $("#boton_pago").prop("disabled", true);
                        }
                    }
                },
                error: function(data){
                }
            });
        }else{
            $('#nombres_envio').val("");
            $('#documento_envio').val("");
            $('#direccion_envio').val("");
            $('#telefono').val("");
            $('#mail_envio').val("");
            $("#boton_pago").prop("disabled", true);
        }
}
function terminos(){
    if( !$('#terms_accept').is(":checked") ){
        $("#boton_pago").prop("disabled", true);
    }else{
        var form = $('#nombres').parents("#form");
        var check = checkCampos(form);
        if(check) {
            $("#boton_pago").prop("disabled", false);
        }
        else {
            $("#boton_pago").prop("disabled", true);
        }
    }
}
</script>
<script>
    function aplicarCupon(){
        var cupon = $('#cupon').val();
        if(cupon != ''){
            $.ajax({
                type:'GET',
                url: "/api/cupon/" + cupon,
                cache:false,
                contentType: false,
                processData: false,
                success: (respuesta) => {
                var total = parseFloat( $('#total').val() );

                    if(respuesta.status == 'success'){
                        if(parseFloat(respuesta.data.cupon.monto) < total){
                            $("#boton_cupon").prop("disabled", true);


                            var precio = $('#costo_envio').val()
                            if(precio == NaN || precio == '' || precio == undefined){
                                precio = 0;
                            }else{
                                precio = $('#costo_envio').val()
                                precio = parseFloat(precio)
                           
                            }
                            

                            var cupon = parseFloat( respuesta.data.cupon.monto )
                            console.log(cupon)
                            var sub_total = parseFloat( $('#sub_total').val() ).toFixed(2)
                            sub_total = sub_total - cupon;
                            sub_total2 = parseFloat(sub_total).toFixed(2)
                            $('#sub_total').val( sub_total )
                            $('#sub_total_text').text( "$ " + sub_total2 )

                            var iva = ( sub_total + precio ) * 0.12;
                            console.log(iva)
                            iva = parseFloat( iva ).toFixed(2)
                            var total = parseFloat(sub_total + iva + precio).toFixed(2);

                            $('#iva_text').text("$ " + iva)
                            $('#iva').val(iva)
                            $('#total_text').text("$ " + total)
                            $('#total').val(parseFloat(sub_total + iva + precio).toFixed(2))
                            $('#cupon_aplicado').val("1")
                        }else{
                            $(".cupon_error").text('Error! el monto del cupon es superior al monto total de la orden');
                            $('#cupon').addClass("is-invalid");
                            setTimeout(function(){
                                $('#cupon').removeClass("is-invalid");
                            }, 3000);
                        }


                    }else{
                        $(".cupon_error").text('Error! cupon no encontrado');
                        $('#cupon').addClass("is-invalid");
                        setTimeout(function(){
                            $('#cupon').removeClass("is-invalid");
                        }, 3000);

                    }
                },
                error: function(data){
                }
            });
        }
    }


</script>
@endsection