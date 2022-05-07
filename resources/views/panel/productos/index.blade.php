@extends('layouts.app')

@section('content')
<section class="section mt-60 mt-60">
        <div class="container">
		<h4 class="title mb-4 text-center">
		{{$nombre}}
		</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 pt-2 mt-sm-0 pt-sm-0">
                    <div class="row">
						@foreach($productos as $data)
						<div class="col-lg-4 col-md-6 mt-4 pt-2">
							<div class="card catagories overflow-hidden rounded shadow border-0">
								<img src="/assets/productos/<?=$data['img_4'];?>" class="img-fluid">
								<div class="card-body">
									<ul class="list-unstyled d-flex justify-content-between mb-0">
										<li><a href="/productos/<?=$data['id'];?>/detalle" class="stretched-link title h6 text-dark"><?=$data['nombre'];?></a></li>
										<li class="mb-0 jobs" style="font-family: 'Gotham-Light'; font-size: 12px; color: #41548a; font-weight: 600;">Desde $<?=$data['precio'];?></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection