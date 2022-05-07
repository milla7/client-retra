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
                        <a class="nav-link py-2 active rounded-0" id="Driver-login" data-toggle="pill" href="#driver" role="tab" aria-controls="driver" aria-selected="false"> 
                           <div class="text-center pt-1 pb-1">
                              <h4 class="title font-weight-normal mb-0">Mi Perfil</h4>
                           </div>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="tab-content" id="pills-tabContent">
                  <div class="card border-0 tab-pane fade show active" id="driver" role="tabpanel" aria-labelledby="Driver-login">
                     <form class="card-body" id="registro" method="post" action="/perfil">
                      @if (\Session::has('success'))
                          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>Felicitaciones!</strong> {!! session()->get('success') !!}
                          </div>
                      @endif
                     	@method('put')
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Nombres </label>
                                 <input type="text" value="{{$usuario->nombres}}" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres">
                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Apellidos </label>
                                 <input type="text" value="{{$usuario->apellidos}}" class="form-control @error('apellidos') is-invalid @enderror"  id="apellidos" name="apellidos" >
                                 @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                 <label>Celular </label>
                                 <input type="tel" value="{{$usuario->celular}}" class="form-control @error('celular') is-invalid @enderror"  id="celular" name="celular" >
                                 @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                 <label>Cedula / RUC </label>
                                 <input type="tel" value="{{$usuario->cedula}}" class="form-control @error('cedula') is-invalid @enderror"  id="cedula" name="cedula" >
                                 @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                 <label>Dirección </label>
                                 <input type="text" value="{{$usuario->direccion}}" class="form-control @error('direccion') is-invalid @enderror"  id="direccion" name="direccion" >
                                 @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Email </label>
                                 <input type="email" value="{{$usuario->email}}" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" >
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Contraseña </label>
                                 <input type="password" class="form-control @error('clave') is-invalid @enderror"  id="clave" name="clave" >
                                 @error('clave')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <button type="submit" class="btn btn-dark w-100">Actualizar Mi Perfil</button>
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
@endsection