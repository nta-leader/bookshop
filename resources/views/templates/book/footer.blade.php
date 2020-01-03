<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">
						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<strong class="tg-logo"><a href="javascript:void(0);"><img src="{{ $urlTemplateBook }}/images/flogo.png" alt="image description"></a></strong>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>{{ $boot_about->address }}</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>
												@php
													$arrPhone = explode('|',$boot_about->phone);
												@endphp
												@foreach($arrPhone as $phone)
												<em>{{ $phone }}</em>
												@endforeach
											</span>
										</li>
										<li>
											<i class="icon-clock"></i>
											<span>{{ $boot_about->work_time }}</span>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												@php
													$arrEmail = explode('|',$boot_about->email);
												@endphp
												@foreach($arrEmail as $email)
												<em><a href="mailto:{{ $email }}">{{ $email }}</a></em>
												@endforeach
											</span>
										</li>
										<li>
											<i class="icon-facebook"></i>
											<span>
												<em><a href="{{ $boot_about->facebook }}">{{ $boot_about->facebook }}</a></em>
											</span>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Shipping And Help Information</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="javascript:void(0);">Terms of Use</a></li>
											<li><a href="javascript:void(0);">Terms of Sale</a></li>
											<li><a href="javascript:void(0);">Returns</a></li>
											<li><a href="javascript:void(0);">Privacy</a></li>
											<li><a href="javascript:void(0);">Cookies</a></li>
											<li><a href="javascript:void(0);">Contact Us</a></li>
										</ul>
										<ul>
											<li><a href="javascript:void(0);">Our Story</a></li>
											<li><a href="javascript:void(0);">Meet Our Team</a></li>
											<li><a href="javascript:void(0);">FAQ</a></li>
											<li><a href="javascript:void(0);">Testimonials</a></li>
											<li><a href="javascript:void(0);">Join Our Team</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgettopsellingauthors">
									<div class="tg-widgettitle">
										<h3>Top Selling Authors</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Jude Morphew</a></h4>
													<p>21,658 Published Books</p>
												</div>
											</li>
											<li>
												
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Shaun Humes</a></h4>
													<p>20,257 Published Books</p>
												</div>
											</li>
											<li>
												
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Kathrine Culbertson</a></h4>
													<p>15,686 Published Books</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-copyright">Website được thiết kết bởi Theanhit</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
		
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="{{$urlTemplateBook}}/js/vendor/jquery-library.js"></script>
	<script src="{{$urlTemplateBook}}/js/vendor/bootstrap.min.js"></script>
	<script src="{{$urlTemplateBook}}/js/owl.carousel.min.js"></script>
	<script src="{{$urlTemplateBook}}/js/jquery.vide.min.js"></script>
	<script src="{{$urlTemplateBook}}/js/countdown.js"></script>
	<script src="{{$urlTemplateBook}}/js/jquery-ui.js"></script>
	<script src="{{$urlTemplateBook}}/js/parallax.js"></script>
	<script src="{{$urlTemplateBook}}/js/countTo.js"></script>
	<script src="{{$urlTemplateBook}}/js/appear.js"></script>
	<script src="{{$urlTemplateBook}}/js/gmap3.js"></script>
	<script src="{{$urlTemplateBook}}/js/main.js"></script>
	<script src="{{ $urlTemplateBook }}/sweetalert-dev.js"></script>
	<script src="{{ $urlTemplateBook }}/js/jquery.validate.min.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			let cart = document.getElementsByClassName('tg-minicart-o');
			for(let i=0; i<cart.length; i++){
				cart[i].onclick = function(){
					let show = document.getElementById('view-cart');
					show.classList.toggle('cart-show');
				}
			}
		},false)
	</script>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			$.ajax({
				type: "get",
				url: "{{ route('book.cart.index') }}",
				success: function(data){
					showCart(data.data);
				},
				error: function (){
					alert('Có lỗi xảy ra');
				}
			});			
		},false);
	</script>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			let addProduct = document.getElementById('add-product');
			
			addProduct.onclick = function(){
				let quantity = document.getElementById('quantity').value;
				let id_product = this.getAttribute('data-id_product');

				$.ajax({
					type: "get",
					url: "{{ route('book.cart.addProduct') }}",
					data: {
						"id_product":id_product,
						"quantity":quantity
					},
					success: function(data){
						swal({   
							title: data.message,
							text: "",         
							type: "success",   
							showCancelButton: false,   
							confirmButtonColor: "red",   
							closeOnConfirm: false,
							showConfirmButton: false,  
							timer: 1000 
							}
						);
						showCart(data.data);
					},
					error: function (){
						alert('Có lỗi xảy ra');
					}
				});
			}
		},false);
	</script>
	<script>
		function update(id_product,value,quantity=2){
			if(quantity > 1){
				$.ajax({
					type: "get",
					url: "{{ route('book.cart.update') }}",
					data: {
						"id_product":id_product,
						"value":value
					},
					success: function(data){
						showCart(data.data);
					},
					error: function (){
						alert('Có lỗi xảy ra');
					}
				});
			}
		}
	</script>
	<script>
		function delCart(){
			$.ajax({
				type: "get",
				url: "{{ route('book.cart.delCart') }}",
				success: function(data){
					showCart(data.data);
				},
				error: function (){
					alert('Có lỗi xảy ra');
				}
			});
		}
	</script>
	<script>
		$(document).ready(function() {
		//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
			$("#order_form").validate({
				rules: {
					name: "required",
					address: "required",
					phone: {
						required: true,
						number:true,
						minlength: 10,
						maxlength:10
					}
				},
				messages: {
					name: "Vui lòng nhập họ tên !",
					address: "Vui lòng nhập địa chỉ ! ",
					phone: {
						required: "Vui lòng nhập số điện thoại !",
						number: "Vui lòng nhập số !",
						minlength: "SDT tối thiểu 10 số !",
						maxlength: "SDT tối đa 10 số !"
					}
				},
				submitHandler: function (form) {
				
					var name = document.getElementById('name').value;
					var phone = document.getElementById('phone').value;
					var address = document.getElementById('address').value;

					$.ajax({
						url: '{{ route('book.cart.checkout') }}',
						type: 'get',
						cache: false,
						data: {
							name:name,
							phone:phone,
							address:address
						},
						success: function(data){
							showCart(data.data);
							swal(data.message,"","success");
						},
						error: function (){
							alert('Có lỗi xảy ra');
						}
					});
				}
			});
		});
	</script>
</body>
</html>