<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('web/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('web/css/icomoon.css')}}">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{asset('web/css/ionicons.min.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('web/css/magnific-popup.css')}}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('web/css/flexslider.css')}}">
	
	
	
	<link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('web/css/owl.theme.default.min.css')}}">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('web/css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('web/fonts/flaticon/font/flaticon.css')}}">
	
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('web/css/style.css')}}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>




	</head>
	<body>
		<!-- header -->
	<div class="colorlib-loader"></div>

	<div id="page">
		<!-- header -->
		<nav class="colorlib-nav" role="navigation">
			<!-- menu -->
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.html">Giày Sang</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="{{asset('search')}}" class="search-wrap" method="post">
			            	@csrf
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search" name="search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="{{asset('home')}}">Home</a></li>
								@foreach($menu as $value)
								<li class="has-dropdown">
									<a href="{{asset('theloai/'.$value->mota)}}">{{$value->name}}</a>
									<ul class="dropdown">
										@foreach($value->loaigiay as $value1)
										<li><a href="{{asset('theloai/'.$value->mota.'/'.$value1->mota)}}">{{$value1->name}}</a></li>
										@endforeach
									</ul>
								</li>
								
								@endforeach
								<li><a href="{{asset('about')}}">Giới Thiệu</a></li>
								<li><a href="{{asset('contact')}}">Liên Hệ</a></li>
								<li class="cart"><a href="{{asset('/cart/getcart')}}"><i class="icon-shopping-cart"></i> <p > Cart [<span class="cart_total">{{Cart::getTotalQuantity()}}</span>]</p></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- end menu -->
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">Giảm 25% các sản phẩm mùa hè: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Giảm lớn nhất lên tới 50% sản phẩm mùa hè: Summer Sale</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>