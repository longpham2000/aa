<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Chăm sóc khách hàng</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Phiếu quà tặng</a></li>
								<li><a href="#">Danh sách dành cho bạn</a></li>
								<li><a href="#">Đặc biệt</a></li>
								<li><a href="#">Dịch vụ khách hàng</a></li>
								<li><a href="#">Bản đồ</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Thông tin </h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Thông tin giao hàng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Hỗ trợ</a></li>
								<li><a href="#">Theo dõi đơn hàng</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>Thông tin liên lạc</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br>Tây Mỗ, Nam Từ Liêm, Hà Nội, Việt Nam</li>
							<li><a href="tel://+842437653568">+ +842437653568</a></li>
							<li><a href="mailto:info@giấyng.com">info@giaysang.com</a></li>
							<li><a href="#">giaysang.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('web/js/jquery.min.js')}}"></script>
   <!-- popper -->
   <script src="{{asset('web/js/popper.min.js')}}"></script>
   <!-- bootstrap 4.1 -->
   <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
   <!-- jQuery easing -->
   <script src="{{asset('web/js/jquery.easing.1.3.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('web/js/jquery.waypoints.min.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{asset('web/js/jquery.flexslider-min.js')}}"></script>
	<!-- Owl carousel -->
	<script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('web/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('web/js/magnific-popup-options.js')}}"></script>
	<!-- Date Picker -->
	<script src="{{asset('web/js/bootstrap-datepicker.js')}}"></script>
	<!-- Stellar Parallax -->
	<script src="{{asset('web/js/jquery.stellar.min.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('web/js/main.js')}}"></script>

	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

	@stack('scripts')

	</body>
</html>



