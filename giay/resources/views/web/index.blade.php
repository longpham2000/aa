
	@include('core/header');
			<!-- sale -->

			
			<!-- end sale -->
		</nav>
		<!-- end header -->
		<aside id="colorlib-hero">
			<div class="flexslider">
				<!-- slides -->
				<ul class="slides">
			   	<li style="background-image: url({{asset('web/images/img_bg_1.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Nam</h1>
					   					<h2 class="head-2">Giày</h2>
					   					<h2 class="head-3">Bộ sưu tập</h2>
					   					<p class="category"><span>Xu hướng</span></p>
					   					<p><a href="#" class="btn btn-primary">Tất cả các sản phẩm</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url({{asset('web/images/img_bg_2.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">KHủng</h1>
					   					<h2 class="head-2">Giảm giá</h2>
					   					<h2 class="head-3"><strong class="font-weight-bold">50%</strong> Off</h2>
					   					<p class="category"><span>giảm giá mạnh</span></p>
					   					<p><a href="#" class="btn btn-primary">Tất cả các sản phẩm</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url({{asset('web/images/img_bg_3.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Đã nhập </h1>
					   					<h2 class="head-2">hàng mới</h2>
					   					<h2 class="head-3">Giảm tới<strong class="font-weight-bold">30%</strong> off</h2>
					   					<p class="category"><span>stylish mới cho đấng mầy râu</span></p>
					   					<p><a href="#" class="btn btn-primary">Tất cả các sản phẩm</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
			  	<!-- end slides -->
		  	</div>
		</aside>
		<!-- intro -->
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">Bắt đầu với một ý tưởng đơn giản: Tạo ra những sản phẩm chất lượng, được thiết kế tốt nhất.</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- end intro -->

		<!-- product lớn -->
		<div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url({{asset('web/images/men.jpg')}});"></a>
							<div class="desc">
								<h2><a href="#">Bộ sưu tập cho Nam</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url({{asset('web/images/women.jpg')}});"></a>
							<div class="desc">
								<h2><a href="#">Bộ sưu tập cho Nữ</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end product lớn -->

		<!-- product nhỏ -->
		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>Bán chạy nhất</h2>
					</div>
				</div>

				{{-- product --}}
				<div class="row row-pb-md">
					@foreach($data as $d)
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="{{asset('product_detail/'.$d->id_giay)}}" class="prod-img">
								<img src="{{asset('storage/img/'.$d->anh_giay[0]->url)}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">{{$d->name}}</a></h2>
								<span class="price">đ{{$d->cost}}</span>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
				{{-- endproduct --}}

				<div class="row">
					<div class="col-md-12 text-center">
						<p><a href="#" class="btn btn-primary btn-lg">Xem thêm sản phẩm</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- end product nhỏ -->

		<!-- partner -->
		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="{{asset('web/images/brand-1.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('web/images/brand-2.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('web/images/brand-3.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('web/images/brand-4.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('web/images/brand-5.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>
		<!-- endpartner -->



		@include('core/footer');
	}
		

