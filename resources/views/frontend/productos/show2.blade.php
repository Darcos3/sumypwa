@extends('frontend.layouts.app2')

@section('titulo', $producto->nombre)

@section('content')

<main id="content" role="main">
	<!-- breadcrumb -->
	<div class="bg-gray-13 bg-md-transparent">
		<div class="container">
			<!-- breadcrumb -->
			<div class="my-md-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
						@if ($producto->categoria->parent)
							@include('frontend.categorias.parcial.breadcrumb-li', ['categoria' => $producto->categoria->parent])
						@endif
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($producto->categoria) ) }}">{{ $producto->categoria->nombre }}</a></li>
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $producto->nombre }}</li>
					</ol>
				</nav>
			</div>
			<!-- End breadcrumb -->
		</div>
	</div>
	<!-- End breadcrumb -->
	<div class="container">
		<!-- Single Product Body -->
		<div class="mb-xl-14 mb-6">
			<div class="row">
				<div class="col-md-5 mb-4 mb-md-0">
					<div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
						data-infinite="true"
						data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
						data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
						data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
						data-nav-for="#sliderSyncingThumb">
						<div class="js-slide">
							<img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$producto->imagen) }}" alt="Image Description">
						</div>
						@foreach ($producto->imagenes as $imagen)
							<div class="js-slide">
								<img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$imagen->nombre) }}" alt="Image Description">
							</div>
						@endforeach
					</div>

					<div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
						data-infinite="true"
						data-slides-show="5"
						data-is-thumbs="true"
						data-nav-for="#sliderSyncingNav">
						<div class="js-slide">
							<img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$producto->imagen) }}" alt="Image Description">
						</div>
						@foreach ($producto->imagenes as $imagen)
							<div class="js-slide" style="cursor: pointer;">
								<img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$imagen->nombre) }}" alt="Image Description">
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-md-7 mb-md-6 mb-lg-0">
					<div class="mb-2">
						<div class="border-bottom mb-3 pb-md-1 pb-3">
							<a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($producto->categoria) ) }}" class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $producto->categoria->nombre }}</a>
							<h2 class="font-size-25 text-lh-1dot2">{{ $producto->nombre }}</h2>
							<div class="mb-2">
								<a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#opiniones">
									<div class="text-warning mr-2">
										<small class="fas fa-star"></small>
										<small class="fas fa-star"></small>
										<small class="fas fa-star"></small>
										<small class="fas fa-star"></small>
										<small class="far fa-star text-muted"></small>
									</div>
									<span class="text-secondary font-size-13">(3 opiniones de clientes)</span>
								</a>
							</div>
							<div class="d-md-flex align-items-center">
								{{-- <a href="#" class="max-width-150 ml-n2 mb-2 mb-md-0 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/img/200X60/img1.png') }}" alt="Image Description"></a> --}}
								<div class="ml-md-3 text-gray-9 font-size-14">Cantidad: <span class="{{ $producto->cantidad < 10 ? 'text-red' : 'text-green' }} font-weight-bold">{{ $producto->cantidad }} disponibles</span></div>
							</div>
						</div>
						<div class="flex-horizontal-center flex-wrap mb-4">
							<a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
							{{-- <a href="#" class="text-gray-6 font-size-13 ml-2"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a> --}}
						</div>
						<div class="mb-2 font-size-14 pl-3 ml-1 text-gray-110">
							{!! $producto->descripcion_corta !!}
							{{-- <ul class="font-size-14 pl-3 ml-1 text-gray-110">
								<li>4.5 inch HD Touch Screen (1280 x 720)</li>
								<li>Android 4.4 KitKat OS</li>
								<li>1.4 GHz Quad Core™ Processor</li>
								<li>20 MP Electro and 28 megapixel CMOS rear camera</li>
							</ul> --}}
						</div>
						{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p> --}}
						<p><strong>SKU</strong>: {{ $producto->sku }}</p>
						<div class="mb-4">
							<div class="d-flex align-items-baseline">
								@if( auth()->user()->rol_user == null )

									@if ($producto->precio_descuento)
										<ins class="font-size-36 text-decoration-none">${{$producto->precio_descuento}}</ins>
										<del class="font-size-20 ml-2 text-gray-6">${{$producto->precio}}</del>
									@else
										<ins class="font-size-36 text-decoration-none">${{$producto->precio}}</ins>
									@endif
								@endif
								@if( auth()->user()->rol_user == 3 )
										<ins class="font-size-36 text-decoration-none">${{$producto->precio_ferretero}}</ins>
								@endif

							</div>
						</div>
						{{-- <div class="border-top border-bottom py-3 mb-4">
							<div class="d-flex align-items-center">
								<h6 class="font-size-14 mb-0">Color</h6>
								<!-- Select -->
								<select class="js-select selectpicker dropdown-select ml-3"
									data-style="btn-sm bg-white font-weight-normal py-2 border">
									<option value="one" selected>White with Gold</option>
									<option value="two">Red</option>
									<option value="three">Green</option>
									<option value="four">Blue</option>
								</select>
								<!-- End Select -->
							</div>
						</div> --}}
						<div class="d-md-flex align-items-end mb-3">
							<div class="max-width-150 mb-4 mb-md-0">
								<h6 class="font-size-14">Cantidad</h6>
								<!-- Quantity -->
								<div class="border rounded-pill py-2 px-3 border-color-1">
									<div class="js-quantity row align-items-center">
										<div class="col">
											<input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1">
										</div>
										<div class="col-auto pr-1">
											<a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
												<small class="fas fa-minus btn-icon__inner"></small>
											</a>
											<a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
												<small class="fas fa-plus btn-icon__inner"></small>
											</a>
										</div>
									</div>
								</div>
								<!-- End Quantity -->
							</div>
							<div class="ml-md-3">
								<a href="#" class="btn px-5 btn-primary-dark transition-3d-hover"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Añadir al Carrito</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Product Body -->
		<!-- Single Product Tab -->
		<div class="mb-8">
			<div class="position-relative position-md-static px-md-6">
				<ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">
					<li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
						<a class="nav-link active" id="combos-tab" data-toggle="pill" href="#combos" role="tab" aria-controls="combos" aria-selected="true">Combos</a>
					</li>
					<li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
						<a class="nav-link" id="descripcion-tab" data-toggle="pill" href="#descripcion" role="tab" aria-controls="descripcion" aria-selected="false">Descripción</a>
					</li>
					<li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
						<a class="nav-link" id="especificaciones-tab" data-toggle="pill" href="#especificaciones" role="tab" aria-controls="especificaciones" aria-selected="false">Especificaciones</a>
					</li>
					<li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
						<a class="nav-link" id="opiniones-tab" data-toggle="pill" href="#opiniones" role="tab" aria-controls="opiniones" aria-selected="false">Opiniones</a>
					</li>
				</ul>
			</div>
			<!-- Tab Content -->
			<div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
				<div class="tab-content" id="Jpills-tabContent">
					<div class="tab-pane fade active show" id="combos" role="tabpanel" aria-labelledby="combos-tab">
						<div class="row no-gutters">
							<div class="col mb-6 mb-md-0">
								<ul class="row list-unstyled products-group no-gutters border-bottom border-md-bottom-0">
									<li class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down border-0">
										<div class="product-item__outer h-100">
											<div class="remove-prodcut-hover product-item__inner px-xl-4 p-3">
												<div class="product-item__body pb-xl-2">
													<div class="mb-2 d-none d-md-block"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">{{ $producto->categoria->nombre}}</a></div>
													<h5 class="mb-1 product-item__title d-none d-md-block"><a href="#" class="text-blue font-weight-bold">{{ $producto->nombre }}</a></h5>
													<div class="mb-2">
														<a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="{{ asset('imagenes_productos/700x700/sin-imagen.png') }}" alt="Image Description"></a>
													</div>
													<div class="flex-center-between mb-1 d-none d-md-block">
														<div class="prodcut-price d-flex align-items-center position-relative">
															@if( auth()->user()->rol_user == null )

																@if ($producto->precio_descuento)
																	<ins class="font-size-20 text-red text-decoration-none">${{$producto->precio_descuento}}</ins>
																	<del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{$producto->precio}}</del>
																@else
																	<ins class="font-size-36 text-decoration-none">${{$producto->precio}}</ins>
																@endif
															@endif

	                                                        @if( auth()->user()->rol_user == 3 )
																<ins class="font-size-36 text-decoration-none">${{$producto->precio_ferretero}}</ins>
															@endif

														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down">
										<div class="product-item__outer h-100">
											<div class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
												<div class="product-item__body pb-xl-2">
													<div class="mb-2 d-none d-md-block"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">{{ $producto->categoria->nombre}}</a></div>
													<h5 class="mb-1 product-item__title d-none d-md-block"><a href="#" class="text-blue font-weight-bold">{{ $producto->nombre }}</a></h5>
													<div class="mb-2">
														<a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="{{ asset('imagenes_productos/700x700/sin-imagen.png') }}" alt="Image Description"></a>
													</div>
													<div class="flex-center-between mb-1 d-none d-md-block">
														<div class="prodcut-price d-flex align-items-center position-relative">
                                                        	@if( auth()->user()->rol_user == null )
														
																@if ($producto->precio_descuento)
																	<ins class="font-size-20 text-red text-decoration-none">${{$producto->precio_descuento}}</ins>
																	<del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{$producto->precio}}</del>
																@else
																	<ins class="font-size-36 text-decoration-none">${{$producto->precio}}</ins>
																@endif
															@endif

	                                                        @if( auth()->user()->rol_user == 3 )
																<ins class="font-size-36 text-decoration-none">${{$producto->precio_ferretero}}</ins>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down remove-divider">
										<div class="product-item__outer h-100">
											<div class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
												<div class="product-item__body pb-xl-2">
													<div class="mb-2 d-none d-md-block"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">{{ $producto->categoria->nombre}}</a></div>
													<h5 class="mb-1 product-item__title d-none d-md-block"><a href="#" class="text-blue font-weight-bold">{{ $producto->nombre }}</a></h5>
													<div class="mb-2">
														<a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="{{ asset('imagenes_productos/700x700/sin-imagen.png') }}" alt="Image Description"></a>
													</div>
													<div class="flex-center-between mb-1 d-none d-md-block">
														<div class="prodcut-price d-flex align-items-center position-relative">
                                                        	@if( auth()->user()->rol_user == null )

																@if ($producto->precio_descuento)
																	<ins class="font-size-20 text-red text-decoration-none">${{$producto->precio_descuento}}</ins>
																	<del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{$producto->precio}}</del>
																@else
																	<ins class="font-size-36 text-decoration-none">${{$producto->precio}}</ins>
																@endif
															@endif

	                                                        @if( auth()->user()->rol_user == 3 )
																<ins class="font-size-36 text-decoration-none">${{$producto->precio_ferretero}}</ins>
															@endif
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
								{{-- <div class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
									<input class="form-check-input" type="checkbox" value="" id="inlineCheckbox1" checked disabled>
									<label class="form-check-label mb-1" for="inlineCheckbox1">
										<strong>Este producto: </strong> Ultra Wireless S50 Headphones S50 with Bluetooth - <span class="text-red font-size-16">$35.00</span>
									</label>
								</div>
								<div class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
									<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1" checked>
									<label class="form-check-label mb-1 text-blue" for="inlineCheckbox2">
										<span class="text-decoration-on cursor-pointer-on">Universal Headphones Case in Black</span> - <span class="text-red font-size-16">$159.00</span>
									</label>
								</div>
								<div class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
									<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2" checked>
									<label class="form-check-label mb-1 text-blue" for="inlineCheckbox3">
										<span class="text-decoration-on cursor-pointer-on">Headphones USB Wires</span> - <span class="text-red font-size-16">$50.00</span>
									</label>
								</div> --}}
							</div>
							<div class="col-md-auto">
								<div class="mr-xl-15">
									<div class="mb-3">
										<div class="text-red font-size-26 text-lh-1dot2">$150000.00</div>
										<div class="text-gray-6">Por los 3 productos</div>
									</div>
									<a href="#" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Añadir Combo</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="descripcion" role="tabpanel" aria-labelledby="descripcion-tab">
						{!! $producto->descripcion !!}
					</div>
					<div class="tab-pane fade" id="especificaciones" role="tabpanel" aria-labelledby="especificaciones-tab">
						{!! $producto->especificaciones !!}
					</div>
					<div class="tab-pane fade" id="opiniones" role="tabpanel" aria-labelledby="opiniones-tab">
						<div class="row mb-8">
							<div class="col-md-6">
								<div class="mb-3">
									<h3 class="font-size-18 mb-6">Promedio de 287 opiniones</h3>
									<h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
									<div class="text-lh-1">promedio</div>
								</div>

								<!-- Ratings -->
								<ul class="list-unstyled">
									<li class="py-1">
										<a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
											<div class="col-auto mb-2 mb-md-0">
												<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
													<small class="fas fa-star"></small>
													<small class="fas fa-star"></small>
													<small class="fas fa-star"></small>
													<small class="fas fa-star"></small>
													<small class="far fa-star text-muted"></small>
												</div>
											</div>
											<div class="col-auto mb-2 mb-md-0">
												<div class="progress ml-xl-5" style="height: 10px; width: 200px;">
													<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-auto text-right">
												<span class="text-gray-90">205</span>
											</div>
										</a>
									</li>
									<li class="py-1">
										<a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
											<div class="col-auto mb-2 mb-md-0">
												<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
													<small class="fas fa-star"></small>
													<small class="fas fa-star"></small>
													<small class="fas fa-star"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
												</div>
											</div>
											<div class="col-auto mb-2 mb-md-0">
												<div class="progress ml-xl-5" style="height: 10px; width: 200px;">
													<div class="progress-bar" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-auto text-right">
												<span class="text-gray-90">55</span>
											</div>
										</a>
									</li>
									<li class="py-1">
										<a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
											<div class="col-auto mb-2 mb-md-0">
												<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
													<small class="fas fa-star"></small>
													<small class="fas fa-star"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
												</div>
											</div>
											<div class="col-auto mb-2 mb-md-0">
												<div class="progress ml-xl-5" style="height: 10px; width: 200px;">
													<div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-auto text-right">
												<span class="text-gray-90">23</span>
											</div>
										</a>
									</li>
									<li class="py-1">
										<a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
											<div class="col-auto mb-2 mb-md-0">
												<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
													<small class="fas fa-star"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
												</div>
											</div>
											<div class="col-auto mb-2 mb-md-0">
												<div class="progress ml-xl-5" style="height: 10px; width: 200px;">
													<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-auto text-right">
												<span class="text-muted">0</span>
											</div>
										</a>
									</li>
									<li class="py-1">
										<a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
											<div class="col-auto mb-2 mb-md-0">
												<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
													<small class="fas fa-star"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
												</div>
											</div>
											<div class="col-auto mb-2 mb-md-0">
												<div class="progress ml-xl-5" style="height: 10px; width: 200px;">
													<div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-auto text-right">
												<span class="text-gray-90">4</span>
											</div>
										</a>
									</li>
								</ul>
								<!-- End Ratings -->
							</div>
							<div class="col-md-6">
								<h3 class="font-size-18 mb-5">Añade una opinión</h3>
								<!-- Form -->
								<form class="js-validate">
									<div class="row align-items-center mb-4">
										<div class="col-md-4 col-lg-3">
											<label for="rating" class="form-label mb-0">Tu calificación</label>
										</div>
										<div class="col-md-8 col-lg-9">
											<a href="#" class="d-block">
												<div class="text-warning text-ls-n2 font-size-16">
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
													<small class="far fa-star text-muted"></small>
												</div>
											</a>
										</div>
									</div>
									<div class="js-form-message form-group mb-3 row">
										<div class="col-md-4 col-lg-3">
											<label for="descriptionTextarea" class="form-label">Tu opinión</label>
										</div>
										<div class="col-md-8 col-lg-9">
											<textarea class="form-control" rows="3" id="descriptionTextarea"
											data-msg="Please enter your message."
											data-error-class="u-has-error"
											data-success-class="u-has-success"></textarea>
										</div>
									</div>
									{{-- <div class="js-form-message form-group mb-3 row">
										<div class="col-md-4 col-lg-3">
											<label for="inputName" class="form-label">Name <span class="text-danger">*</span></label>
										</div>
										<div class="col-md-8 col-lg-9">
											<input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required
											data-msg="Please enter your name."
											data-error-class="u-has-error"
											data-success-class="u-has-success">
										</div>
									</div>
									<div class="js-form-message form-group mb-3 row">
										<div class="col-md-4 col-lg-3">
											<label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
										</div>
										<div class="col-md-8 col-lg-9">
											<input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="alexhecker@pixeel.com" required
											data-msg="Please enter a valid email address."
											data-error-class="u-has-error"
											data-success-class="u-has-success">
										</div>
									</div> --}}
									<div class="row">
										<div class="offset-md-4 offset-lg-3 col-auto">
											<button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Añadir opinión</button>
										</div>
									</div>
								</form>
								<!-- End Form -->
							</div>
						</div>
						<!-- Review -->
						<div class="border-bottom border-color-1 pb-4 mb-4">
							<!-- Review Rating -->
							<div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
								<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="far fa-star text-muted"></small>
									<small class="far fa-star text-muted"></small>
								</div>
							</div>
							<!-- End Review Rating -->

							<p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>

							<!-- Reviewer -->
							<div class="mb-2">
								<strong>Pedro Perez</strong>
								<span class="font-size-13 text-gray-23">- Abril 3, 2021</span>
							</div>
							<!-- End Reviewer -->
						</div>
						<!-- End Review -->
						<!-- Review -->
						<div class="border-bottom border-color-1 pb-4 mb-4">
							<!-- Review Rating -->
							<div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
								<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
								</div>
							</div>
							<!-- End Review Rating -->

							<p class="text-gray-90">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.</p>

							<!-- Reviewer -->
							<div class="mb-2">
								<strong>Maria Martínez</strong>
								<span class="font-size-13 text-gray-23">- Marzo 1, 2020</span>
							</div>
							<!-- End Reviewer -->
						</div>
						<!-- End Review -->
						<!-- Review -->
						<div class="pb-4">
							<!-- Review Rating -->
							<div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
								<div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="fas fa-star"></small>
									<small class="far fa-star text-muted"></small>
								</div>
							</div>
							<!-- End Review Rating -->

							<p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus accumsan tellus, nec ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum porttitor sagittis.</p>

							<!-- Reviewer -->
							<div class="mb-2">
								<strong>Alberto Arciniegas</strong>
								<span class="font-size-13 text-gray-23">- Diciembre 23, 2019</span>
							</div>
							<!-- End Reviewer -->
						</div>
						<!-- End Review -->
					</div>
				</div>
			</div>
			<!-- End Tab Content -->
		</div>
		<!-- End Single Product Tab -->
		<!-- Related products -->
		<div class="mb-6">
			<div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
				<h3 class="section-title mb-0 pb-2 font-size-22">Productos Relacionados</h3>
			</div>
			<ul class="row list-unstyled products-group no-gutters">
				@for ($i=0; $i < 6; $i++)
					<li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
						<div class="product-item__outer h-100">
							<div class="product-item__inner px-xl-4 p-3">
								<div class="product-item__body pb-xl-2">
									<div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">{{ $producto->categoria->nombre}}</a></div>
									<h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold">{{ $producto->nombre}}</a></h5>
									<div class="mb-2">
										<a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/sin-imagen.png') }}" alt="Image Description"></a>
									</div>
									<div class="flex-center-between mb-1">
										<div class="prodcut-price">
											<div class="text-gray-100">$685,00</div>
										</div>
										<div class="d-none d-xl-block prodcut-add-cart">
											<a href="../shop/single-product-fullwidth.html" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
										</div>
									</div>
								</div>
								<div class="product-item__footer">
									<div class="border-top pt-2 flex-center-between flex-wrap">
										{{-- <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a> --}}
										<a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
									</div>
								</div>
							</div>
						</div>
					</li>
				@endfor
			</ul>
		</div>
		<!-- End Related products -->
		<!-- Brand Carousel -->
		{{-- <div class="mb-8">
			<div class="py-2 border-top border-bottom">
				<div class="js-slick-carousel u-slick my-1"
					data-slides-show="5"
					data-slides-scroll="1"
					data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
					data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
					data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
					data-responsive='[{
						"breakpoint": 992,
						"settings": {
							"slidesToShow": 2
						}
					}, {
						"breakpoint": 768,
						"settings": {
							"slidesToShow": 1
						}
					}, {
						"breakpoint": 554,
						"settings": {
							"slidesToShow": 1
						}
					}]'>
					<div class="js-slide">
						<a href="#" class="link-hover__brand">
							<img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/img/200X60/img1.png') }}" alt="Image Description">
						</a>
					</div>
					<div class="js-slide">
						<a href="#" class="link-hover__brand">
							<img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/img/200X60/img2.png') }}" alt="Image Description">
						</a>
					</div>
					<div class="js-slide">
						<a href="#" class="link-hover__brand">
							<img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/img/200X60/img3.png') }}" alt="Image Description">
						</a>
					</div>
					<div class="js-slide">
						<a href="#" class="link-hover__brand">
							<img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/img/200X60/img4.png') }}" alt="Image Description">
						</a>
					</div>
					<div class="js-slide">
						<a href="#" class="link-hover__brand">
							<img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/img/200X60/img5.png') }}" alt="Image Description">
						</a>
					</div>
					<div class="js-slide">
						<a href="#" class="link-hover__brand">
							<img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/img/200X60/img6.png') }}" alt="Image Description">
						</a>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Brand Carousel -->
	</div>
</main>
@endsection
