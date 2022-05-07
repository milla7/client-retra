@extends('layouts.app')

@section('content')




<section class="bg-half-170 d-table w-100">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-4 col-md-5 order-2 order-md-1 mt-4 pt-2 mt-sm-0 pt-sm-0">
            <div class="bg-white shadow rounded position-relative overflow-hidden">
               <div class="text-center">
                  <ul class="nav nav-pills nav-justified flex-sm-row mb-0" id="pills-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link py-2 active rounded-0" id="User-login" data-toggle="pill" href="#user" role="tab" aria-controls="user" aria-selected="false">
                           <div class="text-center pt-1 pb-1">
                              <h4 class="title font-weight-normal mb-0">Iniciar Sesión</h4>
                           </div>
                       </a>
                     </li>

                  </ul>
               </div>
               <div class="tab-content" id="pills-tabContent">
                  <div class="card border-0 tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="User-login">
                     <form class="card-body" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email_login" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Contraseña</label>
                                 <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="clave_login" >
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                 <label class="w-100 d-flex justify-content-center"><a href="/password/reset" class="text-primary">¿Olvido su Contraseña?</a></label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <button class="btn btn-dark w-100">Entrar</button>
                           </div>
                           <div class="col-md-12 mt-3">
                              <div class="form-group">
                                 <label class="w-100 d-flex justify-content-center">
                                  <a href="/register" class="w-100 text-primary text-center">¿Aún no tienes cuentra? Registrate</a>
                                </label>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-7 offset-lg-1 col-md-7 order-1 order-md-2">
            <img src="assets/img/logo_top.png">
            <div class="title-heading mt-4">
               <p class="para-desc text-muted text-center">Regístrate y sé el primero en conocer de todas nuestras promociones y nuevos productos.</p>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="modal fade" id="no-paso" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
          <div class="modal-content">
            <div class="modal-body">
             <div align="center"><img src="assets/img/mal.png"><br><br>Usuario o Clave Invalida</div>

            </div>
            <div class="modal-footer">
              <a href="" onclick="javascript:window.location='index.php?page=login'" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
            </div>
          </div>
        </div>
      </div>

<div class="modal fade" id="paso" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
          <div class="modal-content">
            <div class="modal-body">
             <div align="center"><img src="assets/img/bien.png"><br><br>Felicidades se registro Correctamente<br>Ya puedes iniciar sesión</div>

            </div>
            <div class="modal-footer">
              <a href="" onclick="javascript:window.location='index.php?page=login'" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
            </div>
          </div>
        </div>
      </div>
<script>
$("#login").submit(function(e) {

                e.preventDefault();
                 var formData = new FormData();
                formData.append('email', $('#email_login').val());
                formData.append('clave', $('#clave_login').val());

                $.ajax('inicia.php', {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data === 'true'){
                            window.location.href = 'index.php?page=home'
                        }else{
                            $("#no-paso").modal('show');
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
});

</script>
@endsection
