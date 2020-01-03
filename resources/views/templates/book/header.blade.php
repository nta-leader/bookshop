
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="{{$urlTemplateBook}}/apple-touch-icon.png">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/normalize.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/icomoon.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/jquery-ui.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/owl.carousel.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/transitions.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/main.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/color-purple.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/responsive.css">
	<link rel="stylesheet" href="{{ $urlTemplateBook }}/sweetalert.css">
	<link rel="stylesheet" href="{{$urlTemplateBook}}/css/style.css">
	<script src="{{$urlTemplateBook}}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="tg-home tg-homevtwo">
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-headervtwo tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addnav">
								<li>
									<a href="javascript:void(0);">
										<i class="fa fa-phone" aria-hidden="true"></i>
										@php
											$arrPhone = explode('|',$boot_about->phone);
										@endphp
										@foreach($arrPhone as $phone)
										<em>{{ $phone }}</em>
										@endforeach
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										@php
											$arrEmail = explode('|',$boot_about->email);
										@endphp
										@foreach($arrEmail as $email)
										<em>{{ $email }}</em>
										@endforeach
									</a>
								</li>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="{{ route('book.home.index') }}"><img src="{{$urlTemplateBook}}/images/logo.png" alt="company name here"></a></strong>
							<div class="tg-searchbox">
								<form action="" method="get" class="tg-formtheme tg-formsearch">
									<fieldset>
										<input type="text" name="search" class="typeahead form-control" placeholder="Tìm sách...">
										<button type="submit" class="tg-btn">Tìm</button>
									</fieldset>
									<a href="javascript:void(0);">Tìm sách nào</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-navigationholder">
								<nav id="tg-nav" class="tg-nav">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
										<ul>
											<li class="menu-item-has-children menu-item-has-mega-menu">
												<a href="javascript:void(0);">DANH MỤC SÁCH</i></a>
												@php indanhmuc_menu_public($boot_category); @endphp
											</li>
											<li class="{{ Request::is('/') ? 'current-menu-item':''}}">
												<a href="{{ route('book.home.index') }}">Trang chủ</a>
											</li>
											<li class="{{ Request::is('su-kien-sale') ? 'current-menu-item' : '' }}">
												<a href="{{ route('book.sale.index') }}">Sự kiện Sale</a>
											</li>
											<li class="{{ Request::is('gioi-thieu.html') ? 'current-menu-item' : '' }}">
												<a href="{{ route('book.about.index') }}">Giới thiệu</a>
											</li>
											<li class="{{ Request::is('huong-dan-mua-sach.html') ? 'current-menu-item' : '' }}">
												<a href="{{ route('book.about.shopping_guide') }}">Hướng dẫn</a>
											</li>
											<li class="{{ Request::is('chinh-sach-mua-hang.html') ? 'current-menu-item' : '' }}">
												<a href="{{ route('book.about.guarantee') }}">Chính sách</a>
											</li>
											<li class="{{ Request::is('tin-tuc') ? 'current-menu-item' : '' }}">
												<a href="{{ route('book.news.index') }}">Tin tức</a>
											</li>
											<li class="{{ Request::is('lien-he.html') ? 'current-menu-item' : '' }}">
												<a href="{{ route('book.contact.index') }}">Liên hệ</a>
											</li>
										</ul>
									</div>
								</nav>
								<div class="tg-wishlistandcart">
									<div class="dropdown tg-themedropdown tg-minicartdropdown">
										<a href="{{ route('book.cart.checkwaybillcode') }}"  class="tg-btnthemedropdown" title="Kiểm tra tình trạng đơn hàng">
											<i class="fa fa-check-circle-o" aria-hidden="true"></i>
										</a>
									</div>
									<div class="dropdown tg-themedropdown tg-minicartdropdown">
										<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown tg-minicart-o">
											<span class="tg-themebadge" id="tg-themebadge">0</span>
											<i class="icon-cart"></i>
										</a>
										<div class="dropdown-menu tg-themedropdownmenu" id="view-cart" aria-labelledby="tg-minicart">
											<div class="tg-minicartbody">
												<div class="tg-minicarproduct">
													<figure style="width:100%">
														<span>Giỏ hàng</span><span style="position: absolute;right: -30px;"><a class="tg-minicart-o" href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></span>													
													</figure>
												</div>
												
											</div>
											<div class="tg-minicartbody" id="tg-minicartbody">
												<div class="tg-minicarproduct">
													<figure>
														<img src="{{$urlTemplateBook}}/images/products/img-01.jpg" alt="image description">
														
													</figure>
													<div class="tg-minicarproductdata">
														<h5><a href="javascript:void(0);">Our State Fair Is A Great Function</a></h5>
														<h6><a href="javascript:void(0);">$ 12.15</a></h6>
													</div>
												</div>
												
											</div>
											<div class="tg-minicartfoot">
												<a class="tg-btnemptycart" onclick="delCart()" href="javascript:void(0);">
													<i class="fa fa-trash-o"></i>
													<span>Hủy giỏ hàng</span>
												</a>
												<span class="tg-subtotal">Tổng: <strong id="tg-subtotal">35.78</strong></span>
												<form action="javascript:void(0)" id="order_form">
													<input type="text" id="name" name="name" value="" class="form-control input-cart" placeholder="Họ tên*">
													<input type="text" id="phone" name="phone" value="" class="form-control input-cart" placeholder="Số điện thoại*">
													<input type="text" id="address"" name="address"" value="" class="form-control input-cart" placeholder="Địa chỉ*">
													<div class="tg-btns">
														<button type="submit" class="tg-btn" href="javascript:void(0);">Đặt hàng</button>
													</div>
												</form>												
											</div>
										</div>
									</div>
									<div class="dropdown tg-themedropdown tg-wishlistdropdown">
										<a href="javascript:void(0);" class="tg-btnthemedropdown mobile-search">
											<i class="fa fa-search" aria-hidden="true"></i>
										</a>
										<div class="book-search">
											<form action="" method="get">
												<a href="javascript:void(0);" class="mobile-search"><i class="fa fa-times" aria-hidden="true"></i></a>
												<input type="text" name="search" placeholder="Tìm sách...">
												<button><i class="fa fa-search" aria-hidden="true"></i></button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->