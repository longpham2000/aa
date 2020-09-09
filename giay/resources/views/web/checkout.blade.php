@include('core/header');

		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<form action="{{asset('cart/order_complete')}}" method="post" class="colorlib-form">
				@csrf
				<div class="row">
					<div class="col-lg-8">
						
							<h2>Billing Details</h2>
		              	<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">Tên</label>
										<input type="text" id="fname" class="form-control" placeholder="Tên chính của bạn" name="ten">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lname">Họ</label>
										<input type="text" id="lname" class="form-control" placeholder="Hộ và tên đệm chủa bạn" name="ho">
									</div>
								</div>

			               <div class="col-md-12">
									<div class="form-group">
										<label for="fname">Địa chỉ</label>
			                    	<input type="text" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn" name="address">
			                  </div>
			               </div>
			            
			               <div class="col-md-12">
									<div class="form-group">
										<label for="companyname">Số Nhà, Tên đường</label>
			                    	<input type="text" id="towncity" class="form-control" placeholder="Số Nhà, Tên đường" name="sonha">
			                  </div>
			               </div>
			            


							
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">Địa chỉ Email</label>
										<input type="email" id="email" class="form-control" placeholder="Địa chỉ email" name="email">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="Phone">Số điện thoại của bạn</label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="Số điện thoại" name="phonenumber">
									</div>
								</div>

		               </div>
		            
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>thanh toán</h2>
									<ul>
										<li>
											<ul>
												<li><span>1 x Product Name</span> <span>$99.00</span></li>
												<li><span>1 x Product Name</span> <span>$78.00</span></li>
											</ul>
										</li>
										<li><span>Vận chuyển</span> <span>$0.00</span></li>
										<li><span>Tổng</span> <span>$180.00</span></li>
									</ul>
								</div>
						   </div>

						   <div class="w-100"></div>

						   <div class="col-md-12">
								<div class="cart-detail">
									<h2>Phương thức thanh toán</h2>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio"> Chuyển khoản trực tiếp</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio">Thanh toán khi nhận hàng</label>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p><input type="submit" name="submit" class="btn btn-primary" value="Đặt hàng"> </p>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>

		@include('core/footer');

