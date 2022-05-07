@extends('layouts.app')

@section('content')
<section class="mt-60 mt-60" style="align-items: center; padding: 150px 0;">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-lg-6 col-md-8">
                <table style="box-sizing: border-box; width: 100%; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                    <tbody>
                        <tr>
                            <td class="text-center" style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                               Recuperar Contraseña
                            </td>
                        </tr>

                        @if (session('status'))
                        <tr>
                            <td class="pt-4" style="padding: 15px 24px 15px; padding-top: 0px;padding-bottom: 0px;">
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <div class="alert alert-success" role="alert">
                                           {{ session('status') }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td style="padding: 15px 24px 15px; padding-top: 0px; color: #8492a6;">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="col-md-12">
                                       <div class="form-group mb-0">
                                            <label>Tu Correo Electrónico</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <input type="submit" id="submit" name="submit" class="btn btn-dark btn-block" value="Recuperar">
                                    </div>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
@endsection
