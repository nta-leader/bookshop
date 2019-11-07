
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BootStrap HTML5 CSS3 Theme</title>
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
										<em>09.194.194.96</em>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<em>Theanhit.com@gmail.com</em>
									</a>
								</li>
							</ul>
							<div class="tg-userlogin">
								<figure><a href="javascript:void(0);"><img src="{{$urlTemplateBook}}/images/users/img-01.jpg" alt="image description"></a></figure>
								<span>Hi, Melonie</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="index.html"><img src="{{$urlTemplateBook}}/images/logo.png" alt="company name here"></a></strong>
							<div class="tg-searchbox">
								<form class="tg-formtheme tg-formsearch">
									<fieldset>
										<input type="text" name="search" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN...">
										<button type="submit" class="tg-btn">Search</button>
									</fieldset>
									<a href="javascript:void(0);">+  Advanced Search</a>
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
												@php indanhmuc_menu_public($category); @endphp
											</li>
											<li class="{{ Request::is('/') ? 'current-menu-item':''}}">
												<a href="javascript:void(0);">Trang chủ</a>
											</li>
											<li><a href="products.html">Sự kiện Sale</a></li>
											<li class="menu-item-has-children">
												<a href="javascript:void(0);">Giới thiệu</a>
											</li>
											<li><a href="products.html">Hướng dẫn</a></li>
											<li><a href="products.html">Chính sách</a></li>
											<li class="menu-item-has-children">
												<a href="javascript:void(0);">Tin tức</a>
												<ul class="sub-menu">
													<li><a href="newslist.html">News List</a></li>
													<li><a href="newsgrid.html">News Grid</a></li>
													<li><a href="newsdetail.html">News Detail</a></li>
												</ul>
											</li>
											<li><a href="contactus.html">Liên hệ</a></li>
										</ul>
									</div>
								</nav>
								<div class="tg-wishlistandcart">
									<div class="dropdown tg-themedropdown tg-minicartdropdown">
										<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="tg-themebadge">3</span>
											<i class="icon-cart"></i>
										</a>
										<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
											<div class="tg-minicartbody">
												<div class="tg-minicarproduct">
													<figure>
														<img src="{{$urlTemplateBook}}/images/products/img-01.jpg" alt="image description">
														
													</figure>
													<div class="tg-minicarproductdata">
														<h5><a href="javascript:void(0);">Our State Fair Is A Great Function</a></h5>
														<h6><a href="javascript:void(0);">$ 12.15</a></h6>
													</div>
												</div>
												<div class="tg-minicarproduct">
													<figure>
														<img src="{{$urlTemplateBook}}/images/products/img-02.jpg" alt="image description">
														
													</figure>
													<div class="tg-minicarproductdata">
														<h5><a href="javascript:void(0);">Bring Me To Light</a></h5>
														<h6><a href="javascript:void(0);">$ 12.15</a></h6>
													</div>
												</div>
												<div class="tg-minicarproduct">
													<figure>
														<img src="{{$urlTemplateBook}}/images/products/img-03.jpg" alt="image description">
														
													</figure>
													<div class="tg-minicarproductdata">
														<h5><a href="javascript:void(0);">Have Faith In Your Soul</a></h5>
														<h6><a href="javascript:void(0);">$ 12.15</a></h6>
													</div>
												</div>
											</div>
											<div class="tg-minicartfoot">
												<a class="tg-btnemptycart" href="javascript:void(0);">
													<i class="fa fa-trash-o"></i>
													<span>Clear Your Cart</span>
												</a>
												<span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
												<div class="tg-btns">
													<a class="tg-btn tg-active" href="javascript:void(0);">View Cart</a>
													<a class="tg-btn" href="javascript:void(0);">Checkout</a>
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
		</header>
		<!--************************************
				Header End
		*************************************-->