@include('core/header');

		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>thanh toán</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Danh sách sản phẩm</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Thanh toán</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Thanh toán thành công</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Sản phẩm chi tiết</span>
							</div>
							<div class="one-eight text-center">
								<span>Giá</span>
							</div>
							<div class="one-eight text-center">
								<span>Số lượng</span>
							</div>
							<div class="one-eight text-center">
								<span>Tổng</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Hủy</span>
							</div>
						</div>
						@if(!empty($data))
						@foreach($data as $d)
							<div class="product-cart d-flex">
								<div class="one-forth">
									<div class="product-img" style="background-image: url('{{asset('/storage/img/'.$d['anh_giay'])}}');">
									</div>
									<div class="display-tc">
										<h3>{{$d['value']->name}}</h3>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">{{$d['value']->price}}</span>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<input type="number" id="quantity" name="quantity" class="form-control input-number text-center" value="{{$d['value']->quantity}}" min="1" max="100" data-product-id="{{$d['value']->id}}" data-price="{{$d['value']->price}}">
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">{{ number_format($d['value']->quantity * $d['value']->price) }} đ</span>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
{{-- xoa gio hang --}}
										<a href="" class="closed" data-product-id="{{$d['value']->id}}"></a>
									</div>
								</div>
							</div>
							
						@endforeach
						@endif
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-8">
									
								</div>
								<div class="col-sm-4 text-center">
									<div class="total">
										
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span class="cart-total">{{Cart::getTotal()}}</span></p>
										</div>
									</div>
								</div>
							</div>
						</div>

										<div class="row form-group">
											
											<div class="col-sm-3">
												<a href="{{asset('cart/checkout')}}" class="btn btn-primary">Thanh toán</a>
											</div>
										</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Related Products</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-1.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Boots Shoes Maca</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-2.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Women's Minam Meaghan</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-3.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Men's Taja Commissioner</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-4.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="#">Russ Men's Sneakers</a></h2>
								<span class="price">$139.00</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		

@push('scripts')
    <script>
    	$(document).ready(function() {

		    $(".closed").on('click', function(e) {
		        e.preventDefault()
		        const _this = $(this)
		        // const quantity = $("input[name=quantity]").val()

		        $.ajax({
		            url: '{{asset('/cart/remove')}}',
		            data: {
		                _token: "{{ csrf_token() }}",
		                product_id: _this.data('product-id'),
		            },
		            method: "POST",
		            success: function(response) {
		            	_this.parents('.product-cart').remove()
		                $(".cart_total").text(response.cartTotalQuantity)
		            }
		        })
		    })
		})

		$("#quantity").on("change", _.debounce(function() {
        const quantity = $(this).val()
        const product_id = $(this).data('product-id')
        const _input_quantity_context = $(this)
        $.ajax({
            url: '{{asset('/cart/update')}}',
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                product_id: product_id,
                quantity: quantity
            },
            success: function(response) {
                _input_quantity_context
                    .parents('.product-cart')
                    .find('.price')
                    .text(response.itemSubTotal + ' đ')

                $(".cart-total").text(response.total + ' đ')
            }
        })
    }, 1000))
    </script>
@endpush
@include('core/footer');