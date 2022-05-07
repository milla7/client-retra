@extends('layouts.app')

@section('content')
<section class="home-slider position-relative">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item align-items-center active" style="background-image:url('assets/img/slide2.jpg');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="title-heading mt-4">
                                <img src="assets/img/texto_slide.png" class="img-fluid mb-3 animated fadeInDownBig animation-delay-1">
                                <!--div class="mt-4 pt-2 animated fadeInUpBig animation-delay-7">
                                    <a href="#" class="btn btn-lg btn-dark mt-2 mr-2"><i class="mdi mdi-apple"></i> App Store</a>
                                    <a href="#" class="btn btn-lg btn-dark mt-2"><i class="mdi mdi-google-play"></i> Play Store</a>
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item align-items-center" style="background-image:url('assets/img/slide3.jpg');">
               <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                                <img src="assets/img/texto_slide2.png" style="padding-top:150px;" class="img-fluid animated fadeInUpBig animation-delay-1">
                        </div>
                    </div>
                </div>
            </div>

             <div class="carousel-item align-items-center" style="background-image:url('assets/img/slide4.jpg');">
               <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="title-heading mt-4">
                                <img src="assets/img/texto_slide3.png" class="img-fluid mb-3 animated fadeInDownBig animation-delay-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="carousel-item align-items-center" style="background-image:url('assets/img/slide.jpg');">
               <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="title-heading mt-4">
                                <img src="assets/img/texto-slide5.png" class="img-fluid mb-3 animated fadeInDownBig animation-delay-1"><br>
                                <img src="assets/img/texto-slide6.png" class="img-fluid mb-3 animated fadeInUpBig animation-delay-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
</section>
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h2 class="title-dark">¡Diviértete crea y comparte tus mejores momentos!</h2>
                    <p class="text-dark mb-0 mx-auto">Revela tus fotografías para verlas una y otra vez, escoge una caja en la que puedas almacenarlas o dar un regalo especial …o qué tal si le das vida a tu refri con nuestros imanes.</p>

                </div>
            </div>
        </div>

       <div class="row">
                    <div class="col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="assets/img/revelados.jpg" class="card-img-top rounded-top">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="/productos/2/categoria" class="stretched-link card-title title text-dark">
                                <img src="assets/img/round.png" class="rounded-pill"> Revelados
                                </a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="assets/img/cajas.jpg" class="card-img-top rounded-top">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="/productos/1/categoria" class="stretched-link card-title title text-dark">
                                <img src="assets/img/round.png" class="rounded-pill"> Cajas
                                </a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="assets/img/imanes.jpg" class="card-img-top rounded-top">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="/productos/3/categoria" class="stretched-link card-title title text-dark">
                                <img src="assets/img/round.png" class="rounded-pill"> Imanes
                                </a></h5>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="assets/img/separadores.jpg" class="card-img-top rounded-top">
                            <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="/productos/4/categoria" class="stretched-link card-title title text-dark">
                                <img src="assets/img/round.png" class="rounded-pill"> Separadores de Hojas
                                </a></h5>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</section>

<section class="section" style="background: url('assets/img/bg-app.jpg') center center;">
    <div class="container">
        <div class="row align-items-center">
           <div class="col-lg-6 col-md-6 col-12 text-center text-md-center">
                <img src="assets/img/app.png" width="250" class="img-fluid">
            </div>
             <div class="col-lg-6 col-md-6">
                <div class="title-heading mt-4">
                    <h1 class="heading mb-3">Descubre nuestra App</h1>
                    <p class="para-desc text-muted">Imprime tus fotos desde tu teléfono con nuestra<br> app compatible con IOS y Android </p>
                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-dark mt-2 mr-2"><i class="mdi mdi-apple"></i> App Store</a>
                        <a href="javascript:void(0)" class="btn btn-outline-dark mt-2"><i class="mdi mdi-google-play"></i> Play Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <section class="section">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-5 col-md-5">
                <div class="title-heading mt-4">
                    <h1 class="heading mb-3 text-center">Regala memorias</h1>
                    <p class="para-desc text-muted text-center">No importa la ocasión, regalar recuerdos siempre será una buena idea, y lo mejor de todo es que su valor aumentará con el paso de tiempo. No dudes más, y chequea todas las opciones que te ofrecemos. </p>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12 text-center text-md-center">
                <img src="assets/img/foto.png" width="450" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Nuestros productos son parte de tu historia</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->
         <div class="row">
            <div class="col-md-4 col-12 p-4 text-center">
                 <img src="assets/img/t-1.png" height="50">
                <h5 class="mt-2">Calidad</h5>
            </div><!--end col-->
             <div class="col-md-4 col-12 p-4 text-center">
                 <img src="assets/img/t-2.png" height="60">
                <h5 class="mt-2">Personalizados</h5>
            </div><!--end col-->
             <div class="col-md-4 col-12 p-4 text-center">
                <img src="assets/img/t-3.png" height="60">
                <h5 class="mt-2">Originales</h5>
            </div><!--end col-->
            </div>
             <div class="row">
              <div class="col-md-6 col-12 p-4 text-justify">
              <p class="para-desc text-dark">En La Retratería sabemos que es lo que buscas al momento de imprimir tus recuerdos, por ello hemos creado la forma para que los tengas a tu alcance con la mejor calidad y de la manera más sencilla.
              <p class="para-desc text-dark">A través de nuestro editor tendrás a la mano todas las herramientas para que tus fotografías causen sensación y que tus imagines sobrevivan y perduren en el tiempo.  Podrás escoger el formato que más se ajuste a tu estilo partiendo de tamaño clásico hasta formatos único que solo La Retratería te puede ofrecer.</p>
               </div>
               <div class="col-md-6 col-12 p-4 text-justify">
              <p class="para-desc text-dark">Ideal para regalar un detalle personal, sencillo y económico que seguro encantará si lo complementas con nuestras encantadoras cajas, que se ajustaran tanto al estilo de quien recibe el detalle, como a tu presupuesto.</p>
              <p class="para-desc text-dark">Ya no más celulares llenos de fotografías que nunca las ves, ya no más recuerdos perdidos, ya no más pretextos para dejar de imprimir tus fotos. ¡Anímate ya! </p>
               </div>
             </div>
             <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title">Reviews</h4>
                    <p class="text-dark para-desc mb-0 mx-auto">¿Que opinan nuestros clientes?</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-12 mt-4">
                <div id="customer-testi" class="owl-carousel owl-theme">
                    @foreach(App\Orden::whereHas('pago')->whereHas('direccion')->get() as $orden)
                    @if(strlen($orden->direccion->comentario) > 0)
                    <div class="media customer-testi m-2">
                        <div class="media-body content p-3 shadow rounded bg-white position-relative">
                            <p class="text-muted mt-2">{{$orden->direccion->comentario}}</p>
                            <h6 class="text-dark">{{$orden->usuario->nombres}} {{$orden->usuario->apellidos}}</h6>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $('document').ready( function(){
        mostrar_chat();
    });
</script>
@endsection