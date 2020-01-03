/* -------------------------------------
		CUSTOM FUNCTION WRITE HERE
-------------------------------------- */
jQuery(document).on('ready', function() {
	"use strict";
	jQuery('.tg-themetabnav > li > a').hover(function() {
		jQuery(this).tab('show');
	});
	/*--------------------------------------
			SCROLL TO TOP					
	--------------------------------------*/
	var _tg_btnscrolltop = jQuery("#tg-btnbacktotop");
	_tg_btnscrolltop.on('click', function(){
		var _scrollUp = jQuery('html, body');
		_scrollUp.animate({ scrollTop: 0 }, 'slow');
	})
	/* -------------------------------------
			COLLAPSE MENU SMALL DEVICES
	-------------------------------------- */
	function collapseMenu(){
		jQuery('.menu-item-has-children, .menu-item-has-mega-menu').prepend('<span class="tg-dropdowarrow"><i class="fa  fa-angle-right"></i></span>');
		jQuery('.menu-item-has-children span, .menu-item-has-mega-menu span').on('click', function() {
			jQuery(this).next().next().slideToggle(300);
			jQuery(this).parent('.menu-item-has-children, .menu-item-has-mega-menu').toggleClass('tg-open');
		});
	}
	collapseMenu();
	/*--------------------------------------
			HOME SLIDER						
	--------------------------------------*/
	var _tg_homeslider = jQuery('#tg-homeslider');
	_tg_homeslider.owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		dots: true,
		autoplay:false,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev slide-ba',
					'owl-next tg-btnround tg-btnnext slide-ba'
				],
	});
	$(document).ready(function() {
 
		$("#123tg-homeslider").owlCarousel({
	   
			navigation : true, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true
	   
			// "singleItem:true" is a shortcut for:
			// items : 1, 
			// itemsDesktop : false,
			// itemsDesktopSmall : false,
			// itemsTablet: false,
			// itemsMobile : false
	   
		});
	   
	  });
	/*--------------------------------------
			BEST BOOK SLIDER				
	--------------------------------------*/
	var _tg_bestsellingbooksslider = jQuery('.slider-product-home');
	_tg_bestsellingbooksslider.owlCarousel({
		nav: true,
		loop: true,
		margin: 30,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
		responsive: {
			0: { items:2 },
			480: { items:3 },
			600: { items:3 },
			1000: { items:5 },
			1200: { items:6 },
		}
	});
	/*--------------------------------------
			RELATED PRODUCT SLIDER			
	--------------------------------------*/
	var _tg_relatedproductslider = jQuery('#tg-relatedproductslider');
	_tg_relatedproductslider.owlCarousel({
		nav: true,
		loop: true,
		margin: 30,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
		responsive: {
			0: { items:2 },
			568: { items:2 },
			768: { items:2 },
			992: { items:3 },
			1200: { items:5 },
		}
	});
	/* -------------------------------------
			COLLECTION COUNTER
	-------------------------------------- */
	try {
		var _tg_collectioncounters = jQuery('#tg-collectioncounters');
		_tg_collectioncounters.appear(function () {
			
			var _tg_collectioncounter = jQuery('.tg-collectioncounter h3');
			_tg_collectioncounter.countTo({
				formatter: function (value, options) {
					return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
				}
			});
		});
	} catch (err) {}
	/*--------------------------------------
			PICKED BY AUTHOR SLIDER			
	--------------------------------------*/
	var _tg_pickedbyauthorslider = jQuery('#tg-pickedbyauthorslider');
	_tg_pickedbyauthorslider.owlCarousel({
		nav: true,
		loop: true,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
		responsive: {
			0: { items:1 },
			768: { items:2 },
			992: { items:3 },
		}
	});
	/*--------------------------------------
			TESTIMONIALS SLIDER				
	--------------------------------------*/
	var _tg_testimonialsslider = jQuery('#tg-testimonialsslider');
	_tg_testimonialsslider.owlCarousel({
		items:1,
		nav: true,
		loop: true,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
	});
	/*--------------------------------------
			PICKED BY AUTHOR SLIDER			
	--------------------------------------*/
	var _tg_authorsslider = jQuery('#tg-authorsslider');
	_tg_authorsslider.owlCarousel({
		nav: true,
		loop: true,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
		responsive: {
			0: { items:1 },
			600: { items:4 },
			1000: { items:5 },
			1200: { items:6 },
		}
	});
	/*--------------------------------------
			TEAMS SLIDER					
	--------------------------------------*/
	var _tg_teamsslider = jQuery('#tg-teamsslider');
	_tg_teamsslider.owlCarousel({
		nav: true,
		loop: true,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
		responsive: {
			0: { items:1 },
			600: { items:3 },
			1000: { items:4 },
		}
	});
	/*--------------------------------------
			NEWS AND ARTICLE SLIDER			
	--------------------------------------*/
	var _tg_postslider = jQuery('#tg-postslider');
	_tg_postslider.owlCarousel({
		nav: true,
		loop: true,
		dots: true,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
		responsive: {
			0: { items:2 },
			600: { items:2 },
			992: { items:3 },
			1200: { items:5 },
		}
	});
	/*--------------------------------------
			HOME SLIDER						
	--------------------------------------*/
	var _tg_successslider = jQuery('#tg-successslider');
	_tg_successslider.owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		dots: true,
		autoplay:false,
		navText: [
					'<i class="icon-chevron-left"></i>',
					'<i class="icon-chevron-right"></i>'
				],
		navClass: [
					'owl-prev tg-btnround tg-btnprev',
					'owl-next tg-btnround tg-btnnext'
				],
	});
	/* -------------------------------------
			Google Map
	-------------------------------------- */
	jQuery("#tg-locationmap").gmap3({
		marker: {
			address: "1600 Elizabeth St, Melbourne, Victoria, Australia",
			options: {
				title: "Books Library",
			}
		},
		map: {
			options: {
				zoom: 16,
				scrollwheel: false,
				disableDoubleClickZoom: true,
			}
		}
	});
	/*------------------------------------------
			PRODUCT INCREASE
	------------------------------------------*/
	jQuery('em.minus').on('click', function () {
		let quantity = jQuery('#quantity').val();
		if(quantity > 1){
			jQuery('#quantity').val(parseInt(jQuery('#quantity').val(), 10) - 1);
		}
	});
	jQuery('em.plus').on('click', function () {
		jQuery('#quantity').val(parseInt(jQuery('#quantity').val(), 10) + 1);
	});

	

});

document.addEventListener("DOMContentLoaded",function(){
	let search = document.getElementsByClassName('mobile-search');
	for(let i=0; i<search.length; i++){
		search[i].onclick = function(){
			let show = document.querySelector('.book-search');
			show.classList.toggle('display-block');
		}
	}
},false)

function number_format( number, decimals, dec_point, thousands_sep ) {
	var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
	var d = dec_point == undefined ? "," : dec_point;
	var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
	var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
							
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function showCart(data){
	let price = 0; 
	let div ="";
	let about_bottom = document.getElementsByClassName('tg-minicartfoot');
	if(data.length == 0){
		div = '<div class="tg-minicarproduct">'+
				'<span class="cart-null">Giỏ hàng rỗng !</span>'
			'</div>';
		
		about_bottom[0].style.display = 'none';
	}else{
		data.forEach(function (item) {
			price += item.price*item.quantity;
			div += '<div class="tg-minicarproduct">'+
					'<figure>'+
						'<img style="height:70px" src="/storage/app/files/product/'+ item.picture +'" alt="'+ item.name +'">'+
					'</figure>'+
					'<div class="tg-minicarproductdata">'+
						'<h5><a href="javascript:void(0);">'+ item.name +'</a></h5>'+
						'<h6><a href="javascript:void(0);">'+ number_format(item.price,0,'.',',') +'đ</a> <a href="javascript:void(0);" class="btn-quantity" onclick="update('+ item.id_product +',-1,'+item.quantity+')">-</a><a class="btn-quantity">'+item.quantity+'</a><a href="javascript:void(0);" class="btn-quantity" onclick="update('+ item.id_product +',1)">+</a> <a href="javascript:void(0);" onclick="update('+ item.id_product +',0)"><i class="fa fa-trash-o"></i> xóa</a></h6>'+
					'</div>'+
				'</div>';
		});

		about_bottom[0].style.display = 'block';
	}
	
	document.querySelector('#tg-themebadge').innerHTML=data.length;
	document.querySelector('#tg-minicartbody').innerHTML=div;
	document.querySelector('#tg-subtotal').innerHTML= number_format(price,0,'.',',') + 'đ';
}