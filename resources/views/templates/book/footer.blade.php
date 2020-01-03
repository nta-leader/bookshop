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
										<h3>Các từ khóa hot</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="javascript:void(0);">Sách hay</a></li>
											<li><a href="javascript:void(0);">Sách Toán</a></li>
											<li><a href="javascript:void(0);">Sách Tiếng Anh</a></li>
											<li><a href="javascript:void(0);">Sách Hóa Học</a></li>
											<li><a href="javascript:void(0);">Sác Luyện thi HSG</a></li>
											<li><a href="javascript:void(0);">Sách Luyện thi đại học</a></li>
										</ul>
										<ul>
											<li><a href="javascript:void(0);">Sách Lich sử</a></li>
											<li><a href="javascript:void(0);">Sách Ngữ Văn</a></li>
											<li><a href="javascript:void(0);">Sách Dịa lý</a></li>
											<li><a href="javascript:void(0);">Sách ôn thi lên lớp 10</a></li>
											<li><a href="javascript:void(0);">Sách tham khảo</a></li>
										</ul>
										
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgettopsellingauthors">
									<div class="tg-widgettitle">
										<h3>Có sách là có ước mơ !</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Sách luyện thi THPTQG</a></h4>
												</div>
											</li>
											<li>
												
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Sách Luyện Thi HSG</a></h4>
													
												</div>
											</li>
											<li>
												
												<div class="tg-authornamebooks">
													<h4><a href="javascript:void(0);">Sách Luyện Thi Lên Lớp 10</a></h4>
													
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