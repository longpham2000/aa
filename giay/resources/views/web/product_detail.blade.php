
@include('core/header');

</nav>

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="bread"><span><a href="index.html">Home</a></span> / <span>{{$sp->name}}</span></p>
			</div>
		</div>
	</div>
</div>


<div class="colorlib-product">
	<div class="container">
		<div class="row row-pb-lg product-detail-wrap">
			<div class="col-sm-8">
				<div class="owl-carousel">

					<div class="item">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="{{asset('storage/img/'.$anh[0]->url)}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
						</div>
					</div>
					@for($i=1; $i<count($anh); $i++)
					<div class="item">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="{{asset('storage/img/'.$anh[$i]->url)}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
						</div>
					</div>
					@endfor

				</div>
			</div>
			<div class="col-sm-4">
				<div class="product-desc">
					<h3>Women's Boots Shoes Maca</h3>
					<p class="price">
						<span>{{$sp->cost}}</span> 
						<span class="rate">
							<i class="icon-star-full"></i>
							<i class="icon-star-full"></i>
							<i class="icon-star-full"></i>
							<i class="icon-star-full"></i>
							<i class="icon-star-half"></i>
							(74 Rating)
						</span>
					</p>
					<p>{{$sp->mota_ngan}}</p>
				</div>
				<div class="input-group mb-4">
					<span class="input-group-btn">
						<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
							<i class="icon-minus2"></i>
						</button>
					</span>
					<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
					<span class="input-group-btn ml-1">
						<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
							<i class="icon-plus2"></i>
						</button>
					</span>
				</div>

				<div class="row">
					<div class="col-sm-12 text-center">
						<p class="addtocart"><a href="cart.html" class="btn btn-primary btn-addtocart" 
							data-product-id="{{ $sp->id_giay }}"
							data-product-cost="{{$sp->cost}}"><i class="icon-shopping-cart"></i> Thêm vào giỏ hàng</a></p>
					</div>
					</div>
				</div>
			</div>

			<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								<li class="nav-item">
									<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Mô Tả</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Thương Hiệu</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Đánh Giá</a>
								</li>
							</ul>

							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
									<p>{{$sp->mota_dai}}</p>
								</div>

								<div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
									<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
								</div>

								<div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
									<div class="row">
										<div class="col-md-8">
											<h3 class="head">23 Reviews</h3>
											<div class="review">
												<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
												<div class="desc">
													<h4>
														<span class="text-left">Jacob Webb</span>
														<span class="text-right">14 March 2018</span>
													</h4>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-half"></i>
															<i class="icon-star-empty"></i>
														</span>
														<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
													</p>
													<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
												</div>
											</div>
											<div class="review">
												<div class="user-img" style="background-image: url(images/person2.jpg)"></div>
												<div class="desc">
													<h4>
														<span class="text-left">Jacob Webb</span>
														<span class="text-right">14 March 2018</span>
													</h4>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-half"></i>
															<i class="icon-star-empty"></i>
														</span>
														<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
													</p>
													<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
												</div>
											</div>
											<div class="review">
												<div class="user-img" style="background-image: url(images/person3.jpg)"></div>
												<div class="desc">
													<h4>
														<span class="text-left">Jacob Webb</span>
														<span class="text-right">14 March 2018</span>
													</h4>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-half"></i>
															<i class="icon-star-empty"></i>
														</span>
														<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
													</p>
													<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="rating-wrap">
												<h3 class="head">Give a Review</h3>
												<div class="wrap">
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															(98%)
														</span>
														<span>20 Reviews</span>
													</p>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-empty"></i>
															(85%)
														</span>
														<span>10 Reviews</span>
													</p>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-empty"></i>
															<i class="icon-star-empty"></i>
															(70%)
														</span>
														<span>5 Reviews</span>
													</p>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-full"></i>
															<i class="icon-star-empty"></i>
															<i class="icon-star-empty"></i>
															<i class="icon-star-empty"></i>
															(10%)
														</span>
														<span>0 Reviews</span>
													</p>
													<p class="star">
														<span>
															<i class="icon-star-full"></i>
															<i class="icon-star-empty"></i>
															<i class="icon-star-empty"></i>
															<i class="icon-star-empty"></i>
															<i class="icon-star-empty"></i>
															(0%)
														</span>
														<span>0 Reviews</span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
	
		
	</div>
	</div>







@push('scripts')
<script>
	$(document).ready(function() {
		$(".btn-addtocart").on('click', function(e) {
			e.preventDefault()
			const product_id = $(this).data('product-id');
			const cost = $(this).data('product-cost');
			const size = $("input[type='radio'][name='option2']:checked").val();
			const quantity = $("input[type='text'][name='quantity']").val();
			        // const quantity = $("input[name=quantity]").val()

			        $.ajax({
			        	url: '{{asset('/cart/add')}}',
			        	data: {
			        		_token: "{{ csrf_token() }}",
			        		product_id: product_id,
			        		size: size,
			        		cost: cost,
			        		quantity: quantity
			        	},
			        	method: "POST",
			        	success: function(response) {
			        		$(".cart_total").text(response.cartTotalQuantity)
			        	}


			        })
			    })
	})
</script>
@endpush

@include('core/footer');
