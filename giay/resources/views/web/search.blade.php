@include('core/header');
		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="{{asset('home')}}">Home</a><span>/</span></span>@php
								$a= empty($datas) ? "Không tồn tại" : $datas[0]->name;
								echo $a;
							@endphp</p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url({{asset('web/images/cover-img-1.jpg')}}">
							@php
								$a= empty($datas)? "<h2>Không tồn tại</h2>" : "<h2>".$datas[0]->name.'</h2>';
								echo $a;
							@endphp
							
						</div>
						<div class="menu text-center">
							<p><a href="#">Sản Phẩm HOT</a> <a href="#">Sản Phẩm Bán Chạy Nhất</a><a href="#">Giá khuyến mại</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Tất cả sản phẩm</h2>
					</div>
				</div>
				<div class="row row-pb-md">
						@forelse ($datas as $d)
						<div class="col-lg-3 mb-4 text-center">
							<div class="product-entry border">
								<a href="{{asset('product_detail/'.$d->id_giay)}}" class="prod-img">
									<img src="{{asset('storage/img/'.$d->anh_giay[0]->url)}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
								</a>
								<div class="desc">
									<h2><a href="{{asset('product_detail/'.$d->id_giay)}}">{{$d->giayname}}</a></h2>
									<span class="price">{{$d->cost}} Đ</span>
								</div>
							</div>
						</div>
						@empty
						<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
						<h2>Không có kết quả</h2>
						</div>
					</div>
						@endforelse

					
					
				</div>
				
			</div>
		</div>

		<!-- partner -->
		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Các thương hiệu</h2>
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
