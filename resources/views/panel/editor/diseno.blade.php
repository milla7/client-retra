@extends('layouts.app')

@section('content')
<style>
.im {
  width: 100px;
  height: 100px;
  padding:3px;
}

input[type=radio] {
  display: none;
}

.im:hover {
  opacity:0.6;
  cursor: pointer;
}

.im:active {
  opacity:0.4;
  cursor: pointer;
}

input[type=radio]:checked + label > .im {
  border: 2px solid #333333;
}
</style>

<form id="personaliza" action="guardarDiseno" method="post">
	@csrf
  <input type="hidden" name="id" value="{{$suborden->id}}">
<section class="bg-light" style="padding: 30px 0;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-4" style="padding-top:80px;">
            <a href="/productos/{{$suborden->id_producto}}/detalle" class="btn btn-dark btn-sm" >Atras</a>
         </div>
         <div class="col-4" style="padding-top:80px;" align="center">
            <small>Selecciona Arte</small>
         </div>
         <div class="col-4" style="padding-top:80px;" align="right">
			<button type="submit" class="btn btn-dark btn-sm">Siguiente</button>
         </div>
      </div>
   </div>
</section>
<section style="padding: 20px 0;">
   <div class="container">
      <div class="row">
         <div class="col-12" align="center">
            <h4 class="title-2">Selecciona Diseño Favorito</h4>
            @if($suborden->id_producto == 11)
              <h4 class="title-1" style="font-size: 16px;">Separador 1:</h4>
            @endif
			<?php if($suborden->id_producto == '1' OR $suborden->id_producto == '11'){ ?>
            <input type="radio" name="fondo" id="fondo-1" value="Marron" checked="" />
            <label for="fondo-1">
            <img src="assets/img/fondo_1.jpg" class="im"/>
            </label>
			<?php } ?>
			<?php if($suborden->id_producto == '1' OR $suborden->id_producto == '2'){ ?>
            <input type="radio" name="fondo" id="fondo-2" value="Rojo" checked/>
            <label for="fondo-2">
            <img src="assets/img/fondo_2.jpg" class="im"/>
            </label>
			<?php } ?>
			<?php if($suborden->id_producto == '1' OR $suborden->id_producto == '3' OR $suborden->id_producto == '11'){ ?>
            <input type="radio" name="fondo" id="fondo-3" value="Verde" checked/>
            <label for="fondo-3">
            <img src="assets/img/fondo_3.jpg" class="im"/>
            </label>
			<?php } ?>
			<?php if($suborden->id_producto == '3' OR $suborden->id_producto == '11'){ ?>
            <input type="radio" name="fondo" id="fondo-4" value="Morado" checked/>
            <label for="fondo-4">
            <img src="assets/img/fondo_4.jpg" class="im"/>
            </label>
			<?php } ?>
			<?php if($suborden->id_producto == '2'){ ?>
            <input type="radio" name="fondo" id="fondo-5" value="Amarillo" checked/>
            <label for="fondo-5">
            <img src="assets/img/fondo_5.jpg" class="im"/>
            </label>
			<?php } ?>
      <br>
      @if($suborden->id_producto == 11)
            <h4 class="title-1" style="font-size: 16px;">Separador 2:</h4>
            <input type="radio" name="fondo_2" id="fondo_1" value="Marron" checked/>
            <label for="fondo_1">
            <img src="assets/img/fondo_1.jpg" class="im"/>
            </label>

            <input type="radio" name="fondo_2" id="fondo_3" value="Verde" checked/>
            <label for="fondo_3">
            <img src="assets/img/fondo_3.jpg" class="im"/>
            </label>
            <input type="radio" name="fondo_2" id="fondo_4" value="Morado" checked/>
            <label for="fondo_4">
            <img src="assets/img/fondo_4.jpg" class="im"/>
            </label>


      @endif

			<?php if($suborden->id_producto == '1'){ ?>
            <h4 class="title-2">Selecciona Motivo</h4>
            <div class="row">
               <div class="col-4">&nbsp;</div>
               <div class="col-4" align="center">
                  <div class="form-group mb-0">
                     <select class="form-control custom-select" name="motivo" id="motivo" required onchange="cambioMotivo()">
                        <option value="Feliz Cumpleaños">Feliz Cumpleaños</option>
						            <option value="Navidad">Navidad</option>
                        <option value="San Valentin">San Valentin</option>
                        <option value="Día del Padre">Día del Padre</option>
                        <option value="Día de la Madre">Día de la Madre</option>
                     </select>
                  </div>

				    <input class="navidad motivo" type="radio" name="motivo_img" id="motivo-1" value="motivo-1" />
  					<label class="navidad" for="motivo-1">
  					<img src="assets/img/motivo_1.jpg" class="im"/>
  					</label>

  					<input class="navidad motivo" type="radio" name="motivo_img" id="motivo-2" value="motivo-2" />
  					<label class="navidad" for="motivo-2">
  					<img src="assets/img/motivo_2.jpg" class="im"/>
  					</label>

  					<input class="cumpleanos motivo" type="radio" name="motivo_img" id="motivo-3" value="motivo-3" checked="" />
  					<label class="cumpleanos" for="motivo-3">
  					<img src="assets/img/motivo_3.jpg" class="im"/>
  					</label>

  					<input class="amor motivo" type="radio" name="motivo_img" id="motivo-4" value="motivo-4" />
  					<label class="amor" for="motivo-4">
  					<img src="assets/img/motivo_4.jpg" class="im"/>
  					</label>

  					<input class="amor motivo" type="radio" name="motivo_img" id="motivo-5" value="motivo-5" />
  					<label class="amor" for="motivo-5">
  					<img src="assets/img/motivo_5.jpg" class="im"/>
  					</label>

            <input class="amor motivo" type="radio" name="motivo_img" id="motivo-6" value="motivo-6" />
            <label class="amor" for="motivo-6">
            <img src="assets/img/motivo_6.jpg" class="im"/>
            </label>

            <input class="papa motivo" type="radio" name="motivo_img" id="motivo-7" value="motivo-7" />
            <label class="papa" for="motivo-7">
            <img src="assets/img/motivo_7.jpg" class="im"/>
            </label>

            <input class="papa motivo" type="radio" name="motivo_img" id="motivo-8" value="motivo-8" />
            <label class="papa" for="motivo-8">
            <img src="assets/img/motivo_8.jpg" class="im"/>
            </label>

            <input class="mama motivo" type="radio" name="motivo_img" id="motivo-9" value="motivo-9" />
            <label class="mama" for="motivo-9">
            <img src="assets/img/motivo_9.jpg" class="im"/>
            </label>

            <input class="mama motivo" type="radio" name="motivo_img" id="motivo-10" value="motivo-10" />
            <label class="mama" for="motivo-10">
            <img src="assets/img/motivo_10.jpg" class="im"/>
            </label>

            <input class="mama motivo" type="radio" name="motivo_img" id="motivo-11" value="motivo-11" />
            <label class="mama" for="motivo-11">
            <img src="assets/img/motivo_11.jpg" class="im"/>
            </label>

            <input class="mama motivo" type="radio" name="motivo_img" id="motivo-12" value="motivo-12" />
            <label class="mama" for="motivo-12">
            <img src="assets/img/motivo_12.jpg" class="im"/>
            </label>
			
			<input class="mama motivo" type="radio" name="motivo_img" id="motivo-13" value="motivo-13" />
            <label class="mama" for="motivo-13">
            <img src="assets/img/motivo_13.jpg" class="im"/>
            </label>
			

  			<input class="cumpleanos motivo" type="radio" name="motivo_img" id="motivo-14" value="motivo-14" />
  		    <label class="cumpleanos" for="motivo-14">
			<img src="assets/img/motivo_14.jpg" class="im"/>
  			</label>	
            
			<input class="cumpleanos motivo" type="radio" name="motivo_img" id="motivo-15" value="motivo-15"  />
  		    <label class="cumpleanos" for="motivo-15">
			<img src="assets/img/motivo_15.jpg" class="im"/>
  			</label>


               </div>
               <div class="col-4">&nbsp;</div>
            </div>
            <h4 class="title-2">Escribe Mensaje</h4>
            <div class="row">
               <div class="col-4">&nbsp;</div>
               <div class="col-md-4">
                  <div class="form-group">
                     <textarea name="mensaje" id="mensaje" rows="4" maxlength="250" class="form-control" placeholder="Escribe tu Mensaje" required></textarea>
					<div id="count"></div>
				  </div>
               </div>
               <div class="col-4">&nbsp;</div>
            </div>
			<?php } ?>
         </div>
      </div>
   </div>
</section>
</form>
<script>
$("#mensaje").keyup(function(){
  $("#count").text("Caracteres restantes: " + (250 - $(this).val().length));
});
/*
<option value="Feliz Cumpleaños">Feliz Cumpleaños</option>
<option value="Navidad">Navidad</option>
<option value="San Valentin">San Valentin</option>
<option value="Día del Padre">Día del Padre</option>
<option value="Día de la Madre">Día de la Madre</option>
*/
$('document').ready(function(){
  cambioMotivo();
});
  function cambioMotivo(){
    var val = $("#motivo").val();
    $(".motivo").prop("checked",false);
    if( val == "Feliz Cumpleaños"){
      $(".cumpleanos").attr("hidden", false);
      $(".cumpleanos").prop("checked",true);
      $(".amor").attr("hidden", "hidden");
      $(".mama").attr("hidden", "hidden");
      $(".papa").attr("hidden", "hidden");
      $(".navidad").attr("hidden", "hidden");
    }else if(val == "Navidad"){
      $(".cumpleanos").attr("hidden", "hidden");
      $(".amor").attr("hidden", "hidden");
      $(".mama").attr("hidden", "hidden");
      $(".papa").attr("hidden", "hidden");
      $(".navidad").attr("hidden", false);
      $(".navidad").prop("checked",true);
    }else if(val == "San Valentin"){
      $(".cumpleanos").attr("hidden", "hidden");
      $(".amor").attr("hidden", false);
      $(".amor").prop("checked",true);
      $(".mama").attr("hidden", "hidden");
      $(".papa").attr("hidden", "hidden");
      $(".navidad").attr("hidden", "hidden");
    }else if(val == "Día del Padre"){
      $(".cumpleanos").attr("hidden", "hidden");
      $(".amor").attr("hidden", "hidden");
      $(".mama").attr("hidden", "hidden");
      $(".papa").attr("hidden", false);
      $(".papa").prop("checked",true);
      $(".navidad").attr("hidden", "hidden");
    }else if(val == "Día de la Madre"){
      $(".cumpleanos").attr("hidden", "hidden");
      $(".amor").attr("hidden", "hidden");
      $(".mama").attr("hidden", false);
      $(".mama").prop("checked",true);
      $(".papa").attr("hidden", "hidden");
      $(".navidad").attr("hidden", "hidden");
    }


  }


</script>
@endsection