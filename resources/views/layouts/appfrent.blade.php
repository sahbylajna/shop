<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ELEGANT BABY</title>
    <link href="{{ asset('Front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Front/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Front/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('Front/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('Front/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('Front/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('Front/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('Front/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('Front/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('Front/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('Front/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('Front/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <style>
        .product-information span {
    display: block;
}
    input[type='checkbox']:checked:after {
  content: '✔';
  color: white;
}


.panel ,.panel-heading ,.left-sidebar h2:before ,h2.title:before {
    background-color: #fff7df!important;
}


    </style>
    @yield('css')
</head><!--/head-->
@php
     $setting = App\Models\setting::latest()->first();
@endphp
<body style="    background: #fff7df;">
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">

								<li><a href="#"><i class="fa fa-phone"></i> {{ $setting->phone }}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> {{ $setting->email }}</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> {{ $setting->whatsapp }}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							{{-- <ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul> --}}
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->


		 <div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                        <div class="logo pull-left">
							<a href="{{ url('/') }}"><img src="{{ asset('Front/images/home/logo1.png') }}" alt="" width=" 175px"  style="    width: -webkit-fill-available;"/></a>
						</div>
						{{-- <div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<a href="index.html"><img src="images/home/1" alt="" /></a>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div> --}}
					</div>
					{{-- <div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> --}}
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->





@yield('content')











    <footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>elegant</span> Baby</h2>

						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">



				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2023  BELLAGHA. All rights reserved.</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="{{ asset('Front/js/jquery.js') }}"></script>
	<script src="{{ asset('Front/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Front/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('Front/js/price-range.js') }}"></script>
    <script src="{{ asset('Front/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('Front/js/main.js') }}"></script>
</body>
</html>

