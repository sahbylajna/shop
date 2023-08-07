@extends('layouts.appfrent')

@section('content')


    @php
        $produitslider = App\Models\produit::orderBy('created_at','desc')->take(4)->get();

    @endphp

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
                            @foreach ($produitslider as $key => $slider)
                            @if ($key == 0)
                            <li data-target="#slider-carousel" data-slide-to="{{ $key }}" class="active"></li>
                            @else
                            <li data-target="#slider-carousel" data-slide-to="{{ $key }}" ></li>
                            @endif

                            @endforeach


						</ol>

						<div class="carousel-inner">
                            @foreach ($produitslider as $key => $slider)

                            @if ($key == "0")
                            <div class="item active">
								<div class="col-sm-6">
									<h1><span>ELEGENT</span> Baby</h1>
									<h2>{{ $slider->name }} <br>{{ $slider->name_ar }}</h2>

									<a type="button" href="{{ route('produit.show',$slider->id) }}" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('public/'.$slider->photo) }}" class="girl img-responsive" alt="" />
								</div>
							</div>
                            @else
                            <div class="item">
								<div class="col-sm-6">
									<h1><span>ELEGENT</span> Baby</h1>
									<h2>{{ $slider->name }} <br>{{ $slider->name_ar }}</h2>

									<a type="button" href="{{ route('produit.show',$slider->id) }}" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('public/'.$slider->photo) }}" class="girl img-responsive" alt="" />

								</div>
							</div>
                            @endif

                            @endforeach






						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->


                            <div class="panel panel-default col-sm-2" style="    margin-top: 5px;
                            border: #615d5d47 solid 2px;
                            border-radius: 34px;
                            background-color: #615d5d47!important;
    margin-left: 10px;
    margin-right: 10px;">
								<div class="panel-heading" style="   background-color: #615d5d00!important;">
									<h4 class="panel-title"><a href="{{ asset('/') }}">Home</a></h4>
								</div>
							</div>

							@foreach (App\Models\category::all() as $category)
                            <div class="panel panel-default col-sm-2" style="    margin-top: 5px;
                            border: #615d5d47 solid 2px;
                            border-radius: 34px;
                            background-color: #615d5d47!important;
    margin-left: 10px;
    margin-right: 10px;">
								<div class="panel-heading" style="   background-color: #615d5d00!important;">
									<h4 class="panel-title"><a href="{{ asset('/') }}?category={{ $category->id }}">{{  $category->name }}</a></h4>
								</div>
							</div>
                            @endforeach



						</div><!--/category-products-->




					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>



                        @foreach ($produitas as $item)
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ asset('public/'. $item->photo) }}" style="min-height: 256px;min-width: 265px;max-height: 256px;" alt="" />
										<h2>{{ $item->price }} QAR</h2>
										<p>{{ $item->name }}<br>{{ $item->name_ar }}</p>
										<a href="{{ route('produit.show',$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{ $item->price }} QAR</h2>
											<p>{{ $item->name }}<br>{{ $item->name_ar }}</p>
											<a href="{{ route('produit.show',$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>

							</div>
						</div>

                        @endforeach

					</div><!--features_items-->




				</div>
			</div>
		</div>
	</section>

    @endsection
