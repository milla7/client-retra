<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <title>La Retratería</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="theme-color" content="#FFFFFF">
      <meta name="description" content="Revela tus fotografías para verlas una y otra vez." />
      <meta name="keywords" content="fotos, impresion digital, retratos, imanes decorativos, retrateria." />
      <meta property="og:title" content="La Retratería" />
      <meta property="og:image" content="https://laretrateriaec.com/assets/img/retrateria.png" />
      <meta property="og:type" content="article" />
      <meta property="og:description" content="Revela tus fotografías para verlas una y otra vez." />
      <meta property="og:site_name" content="La Retratería" />
      <link href="https://laretrateriaec.com/" rel="canonical"/>
      <link href="/assets/img/favicon.ico" rel="icon">
      <link href="/assets/img/favicon.ico" rel="apple-touch-icon">
      <link href="/assets/img/favicon.ico" rel="shortcut icon">
      <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css" />
      <link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
      <link href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css" rel="stylesheet" type="text/css" />
      <link href="/assets/css/magnific-popup.css" rel="stylesheet" type="text/css" />
      <link href="/assets/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
      <link rel="stylesheet" href="/assets/css/owl.carousel.min.css"/>
      <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css"/>
      <link href="/assets/css/animate.css" rel="stylesheet" />
      <link href="/assets/css/animations-delay.css" rel="stylesheet" />
      <script src="/assets/js/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.paymentez.com/ccapi/sdk/payment_checkout_stable.min.js"></script>
   </head>
   <body>
    <style>
      
/*# sourceMappingURL=style.css.map */
/* CSS Whatsapp Chat */
#whatsapp-chat {
    position: fixed;
    background: #fff;
    width: 350px;
    border-radius: 10px;
    box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
    bottom: 90px;
    right: 30px;
    overflow: hidden;
    z-index: 99;
    animation-name: showchat;
    animation-duration: 1s;
    transform: scale(1);
}

a.blantershow-chat {
    background: #fff;
    color: #404040;
    position: fixed;
    display: flex;
    font-weight: 400;
    justify-content: space-between;
    z-index: 98;
    bottom: 70px;
    right: 22px;
    font-size: 15px;
    padding: 15px 11px;
    border-radius: 30px;
    box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
}

a.blantershow-chat svg {
    transform: scale(1.2);
    margin: 0 0 0 6px;
}

.header-chat {
    background: #095e54;
    color: #fff;
    padding: 20px;
}
.header-chat h3 {
    margin: 0 0 10px;
}
.header-chat p {
    font-size: 14px;
    line-height: 1.7;
    margin: 0;
}
.info-avatar {
    position: relative;
}
.info-avatar img {
    border-radius: 100%;
    width: 50px;
    float: left;
    margin: 0 10px 0 0;
}
.info-avatar:before {
    z-index: 1;
    background: #23ab23;
    color: #fff;
    padding: 4px 5px;
    border-radius: 100%;
    position: absolute;
    top: 30px;
    left: 30px;
}

.info-chat span {
    display: block;
}
#get-label,
span.chat-label {
    font-size: 12px;
    color: #888;
}
#get-nama,
span.chat-nama {
    margin: 5px 0 0;
    font-size: 15px;
    font-weight: 700;
    color: #222;
}
#get-label,
#get-nama {
    color: #fff;
}
span.my-number {
    display: none;
}
.blanter-msg {
    color: #444;
    padding: 20px;
    font-size: 12.5px;
    text-align: center;
    border-top: 1px solid #ddd;
}
textarea#chat-input {
    border: none;
    font-family: "Arial", sans-serif;
    width: 100%;
    height: 20px;
    outline: none;
    resize: none;
}
a#send-it {
    color: #555;
    width: 40px;
    margin: -5px 0 0 5px;
    font-weight: 700;
    padding: 8px;
    border-radius: 10px;
}
.first-msg {
    background: #f5f5f5;
    padding: 30px;
    text-align: center;
}
.first-msg span {
    background: #e2e2e2;
    color: #333;
    font-size: 14.2px;
    line-height: 1.7;
    border-radius: 10px;
    padding: 15px 20px;
    display: inline-block;
}
.start-chat .blanter-msg {
    display: flex;
}
#get-number {
    display: none;
}
a.close-chat {
    position: absolute;
    top: 5px;
    right: 15px;
    color: #fff;
    font-size: 30px;
}
@keyframes showhide {
    from {
        transform: scale(0.5);
        opacity: 0;
    }
}
@keyframes showchat {
    from {
        transform: scale(0);
        opacity: 0;
    }
}
@media screen and (max-width: 480px) {
    #whatsapp-chat {
        width: auto;
        left: 5%;
        right: 5%;
        font-size: 80%;
    }
}
.hide {
    display: none;
    animation-name: showhide;
    animation-duration: 1.5s;
    transform: scale(1);
    opacity: 1;
}
.show {
    display: block;
    animation-name: showhide;
    animation-duration: 1.5s;
    transform: scale(1);
    opacity: 1;
}
    </style>
  
    <!-- START Bootstrap-Cookie-Alert -->
    <div class="alert text-center cookiealert" role="alert">
        <b>Aviso de cookies</b> &#x1F36A; Esta web utiliza cookies propias y de terceros para ofrecer nuestros
        servicios,obtener información estadística sobre el uso del sitio web y permitir su interacción con redes
        sociales. Si continua navegando consideramos que acepta su uso. Puede cambiar la configuración u obtener más
        información en nuestra <a href="/politicas" target="_blank">Política de Privacidad</a>

        <button type="button" class="btn btn-dark btn-sm acceptcookies">
            Aceptar
        </button>
    </div>
    <header id="topnav" class="defaultscroll sticky bg-white">
         <div class="container">
            <div><a class="logo" href="/">
               <img src="/assets/img/logo.png" height="50">
               </a>
            </div>
            <div class="buy-button">
                   <a href="/pagar" class="btn btn-icon btn-sm btn-dark mt-2"><i class="fas fa-shopping-cart"></i></a>
                </div>
            <div class="menu-extras">
               <div class="menu-item">
                  <a class="navbar-toggle">
                     <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                     </div>
                  </a>
               </div>
            </div>
            <div id="navigation">
               <ul class="navigation-menu nav-right">
                  <li><a href="/">INICIO</a></li>
                  <li><a href="/productos/2/categoria">REVELADOS </a></li>
                  <li><a href="/productos/1/categoria">CAJAS </a></li>
                  <li><a href="/productos/3/categoria">IMANES </a></li>
                  <li><a href="/productos/4/categoria">SEPARADORES</a></li>
                  <li><a href="/#contacto">CONTACTO </a></li>
                  @if( Auth::user() )
                  <li class="has-submenu">
                    <a href="#"><span style="color:#d47f7f;">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</span></a><span class="menu-arrow">
                    </span>
                    <ul class="submenu">
                        <li><a href="/perfil"><i data-feather="user" class="fea icon-sm"> </i> Mi Perfil</a></li>
                        <li><a href="/mis-pedidos"><i data-feather="package" class="fea icon-sm"> </i> Mis Pedidos</a></li>
                        <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i data-feather="log-out" class="fea icon-sm"></i> Salir</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                  </li>
                  @else
                  <li><a href="/login">Registro/Entrar </a></li>
                  @endif

               </ul>
               <div class="buy-menu-btn d-none">
                    <a href="/pagar" class="btn btn-icon btn-sm btn-dark mt-2"><i class="fas fa-shopping-cart"></i></a>
               </div>
            </div>
         </div>
      </header>

      <!-- CONTENT -->
      @yield('content')
      <div id='whatsapp-chat' class='hide'>
      <div class='header-chat'>
      <div class='head-home'><h3 style="color: white;">La Retratería</h3>
        <div class='info-avatar'><img src='/assets/img/soporte.png'/></div>
      </div>
      <div class='get-new'>
        <div id='get-label'>Soporte</div>
        <div id='get-nama'>Servicio al cliente</div>
        
        </div>
      </div>
      <div class='start-chat'>
      <div class='first-msg'><span>¡Hola! ¿Qué puedo hacer por ti?</span></div>
      <div class='blanter-msg'><textarea id='chat-input' placeholder='Escribe un mensaje' maxlength='120' row='1'></textarea>
      <a href='#' onclick="enviar_mensaje();" id='send-it'>Enviar</a></div></div>
      <div id='get-number'>593994625268</div><a class='close-chat' onclick="cerrar_chat();" href='#'>×</a>
      </div>
      <a class='blantershow-chat' onclick="mostrar_chat();" href='#' title='Show Chat'>
        <svg width="30" viewBox="0 0 24 24"><defs></defs><path fill="#eceff1" d="M20.5 3.4A12.1 12.1 0 0012 0 12 12 0 001.7 17.8L0 24l6.3-1.7c2.8 1.5 5 1.4 5.8 1.5a12 12 0 008.4-20.3z"></path><path fill="#4caf50" d="M12 21.8c-3.1 0-5.2-1.6-5.4-1.6l-3.7 1 1-3.7-.3-.4A9.9 9.9 0 012.1 12a10 10 0 0117-7 9.9 9.9 0 01-7 16.9z"></path><path fill="#fafafa" d="M17.5 14.3c-.3 0-1.8-.8-2-.9-.7-.2-.5 0-1.7 1.3-.1.2-.3.2-.6.1s-1.3-.5-2.4-1.5a9 9 0 01-1.7-2c-.3-.6.4-.6 1-1.7l-.1-.5-1-2.2c-.2-.6-.4-.5-.6-.5-.6 0-1 0-1.4.3-1.6 1.8-1.2 3.6.2 5.6 2.7 3.5 4.2 4.2 6.8 5 .7.3 1.4.3 1.9.2.6 0 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.3-.6-.4z"></path></svg>
      </a>
      <section id="contacto" style="background:#E7E7E8;padding-top:30px;padding-bottom:20px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6" align="center">
                        <img src="/assets/img/logo_foot.png" width="300" class="img-fluid"><br><br>
                        <a href="https://goo.gl/maps/yqmpbpC426KzF1GD6" target="_blank" class="text-dark"><i class="fas fa-map-marker-alt" style="font-size:17px;"></i> Fernando de Aragón 373 Cuenca-Ecuador</a><br><br>
                        <a href="tel:+593994625268" class="text-dark"><i class="fa fa-phone" style="font-size:17px;"></i> (099) 462 52 68</a><br><br>
                        <a href="mailto:info@laretrateriaec.com" class="text-dark"><i class="fa fa-envelope" style="font-size:17px;"></i> info@laretrateriaec.com</a><br><br>
                        <a href="https://laretrateriaec.com/" target="_blank" class="text-dark"><i class="fas fa-globe" style="font-size:17px;"></i> www.laretrateriaec.com</a><br><br>
                        <a href="https://es-la.facebook.com/laretrateriaec/" target="_blank" class="btn btn-icon btn-dark"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/laretrateriaec/" target="_blank" class="btn btn-icon btn-dark"><i class="fab fa-instagram"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=593994625268&text=Quiero%20imprimir%20mis%20fotos" target="_blank" class="btn btn-icon btn-dark"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    <div class="col-lg-6 col-md-6">
                       <h4 class="title text-center">CONTÁCTANOS</h4>
                    <p class="text-dark text-center">y cuentanos en que podemos ayudarte</p>
                    @if(\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Felicitaciones!</strong> {!! session()->get('success') !!}.
                        </div>
                    @endif
                          <form class="p-4" id="contac" action="/api/contacto" method="post" enctype="multipart/form-data">
                            @csrf
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group mb-0">
                                      <label>Tu Correo Electrónico</label>
                                      <input name="email_contacto" id="email_contacto" type="email" class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group mb-0">
                                      <label>¿Cómo podemos ayudar? </label>
                                      <select class="form-control custom-select" name="como_contacto" id="como_contacto">
                                         <option value="Entrega - ¿Dónde está mi pedido?">Entrega - ¿Dónde está mi pedido?</option>
                                         <option value="Email de confirmación no recibido">Email de confirmación no recibido</option>
                                         <option value="Necesito ayuda para hacer mi orden">Necesito ayuda para hacer mi orden </option>
                                         <option value="Mi orden no satisface mis expectativas">Mi orden no satisface mis expectativas </option>
                                         <option value="Modificación O Cancelación del pedido">Modificación O Cancelación del pedido </option>
                                         <option value="Comentarios y sugerencias">Comentarios y sugerencias</option>
                                         <option value="Promociones, códigos y/o problemas de pago">Promociones, códigos y/o problemas de pago</option>
                                         <option value="Otras consultas">Otras consultas</option>
                                      </select>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group mb-0">
                                      <label>Tema</label>
                                      <input name="tema_contacto" id="tema_contacto" type="text" class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group mb-0">
                                      <label>Número de Orden</label>
                                      <input name="orden_contacto" id="orden_contacto" type="text" class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group mb-0">
                                      <label>Descripción</label>
                                      <input name="descripcion_contacto" id="descripcion_contacto" type="text" class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group mb-0">
                                      <label>Plataforma </label>
                                      <select class="form-control custom-select" name="plataforma_contacto" id="plataforma_contacto">
                                         <option value="iOS">iOS</option>
                                         <option value="Android">Android</option>
                                         <option value="Web">Web</option>
                                      </select>
                                   </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group position-relative">
                                      <label>Adjuntar Archivo</label>
                                      <input type="file" class="form-control-file" name="archivo_contacto" id="archivo_contacto">
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-sm-12 text-center">
                                   <input type="submit" id="submit" name="submit" class="btn btn-dark btn-block" value="Enviar">
                                   <div id="simple-msg"></div>
                                </div>
                       </form>
                    </div>
                 </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="envia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
          <div class="modal-content">
            <div class="modal-body">
             <div align="center"><img src="/assets/img/bien.png"><br><br>Su informaci&oacute;n fue enviada</div>

            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
            </div>
          </div>
        </div>
      </div>
        <script>
$("#contacs").submit(function(e) {

                e.preventDefault();
                console.log($('#archivo_contacto').val())
                var formData = new FormData();
                formData.append('email', $('#email_contacto').val());
                formData.append('como', $('#como_contacto').val());
                formData.append('tema', $('#tema_contacto').val());
                formData.append('orden', $('#orden_contacto').val());
                formData.append('descripcion', $('#descripcion_contacto').val());
                formData.append('plataforma', $('#plataforma_contacto').val());
                formData.append('archivo', $('#archivo_contacto').val());


                $.ajax('api/contacto', {

                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                      /*
                            $('#email_contacto').val('');
                            $('#como_contacto').val('');
                            $('#tema_contacto').val('');
                            $('#orden_contacto').val('');
                            $('#descripcion_contacto').val('');
                            $('#plataforma_contacto').val('');
                            $('#archivo_contacto').val('');
                            $("#envia").modal('show');
                          */
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
});
</script>
        <footer class="footer footer-bar">
       <div class="container text-center">
          <div class="row align-items-center">
             <div class="col-sm-12">
                <div class="text-sm-center" style="font-size: 14px;">
                   © Copyright 2020  La Retratería, Todos los derechos reservados | <a href="/terminos" target="_blank" class="text-reset">Términos y Condiciones</a> | <a href="/politicas" target="_blank" class="text-reset">Políticas de Privacidad</a>
                </div>
             </div>
          </div>
       </div>
    </footer>

        <a href="#" class="btn btn-icon btn-light back-to-top"><i data-feather="arrow-up" class="icons"></i></a>

        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/jquery.easing.min.js"></script>
        <script src="/assets/js/scrollspy.min.js"></script>
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/js/magnific.init.js"></script>
        <script src="/assets/js/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
        <script src="/assets/js/owl.carousel.min.js "></script>
        <script src="/assets/js/owl.init.js "></script>
        <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <script src="/assets/js/app.js"></script>
        <script>
          function enviar_mensaje(){
            var a = document.getElementById("chat-input");
            if ("" != a.value) {
              var b = document.getElementById("get-number").innerHTML,c = document.getElementById("chat-input").value, d = "https://web.whatsapp.com/send", e = b,  f = "&text=" + c;
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) var d = "whatsapp://send";  var g = d + "?phone=" + e + f;  window.open(g, "_blank");
            }
          }
          const whatsapp_chat =document.getElementById("whatsapp-chat");

          function cerrar_chat(){
            whatsapp_chat.classList.add("hide");
            whatsapp_chat.classList.remove("show");
          }
          function mostrar_chat(){
            whatsapp_chat.classList.add("show");
            whatsapp_chat.classList.remove("hide");
          }
        </script> 
        @yield('js')
    </body>
</html>