@extends('templates.book.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('content')
<!--************************************
		Inner Banner Start
*************************************-->
<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ $urlTemplateBook }}/images/parallax/bgparallax-07.jpg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="tg-innerbannercontent">
					<h1>Liên hệ với chúng tôi</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!--************************************
		Inner Banner End
*************************************-->
<!--************************************
		Main Start
*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
	<!--************************************
			Contact Us Start
	*************************************-->
	<div class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-contactus">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2><span>Chào bạn!</span>Có gì thắc mắc hãy phản hồi ngay cho chúng tôi !</h2>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div id="tg-locationmap" class="tg-locationmap tg-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6447.725377577119!2d108.14629357274487!3d16.073763188957543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218d68dff9545%3A0x714561e9f3a7292c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBLaG9hIC0gxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1571147085725!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<form class="tg-formtheme tg-formcontactus">
							<fieldset>
								<div class="form-group">
									<input type="text" name="first-name" class="form-control" placeholder="Họ tên*">
								</div>
								<div class="form-group">
									<input type="text" name="last-name" class="form-control" placeholder="Số điện thoại*">
								</div>
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email*">
								</div>
								<div class="form-group">
									<input type="text" name="subject" class="form-control" placeholder="Chủ đề*">
								</div>
								<div class="form-group tg-hastextarea">
									<textarea placeholder="Nội dung*"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="tg-btn tg-active">Gửi</button>
								</div>
							</fieldset>
						</form>
						<div class="tg-contactdetail">
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
				</div>
			</div>
		</div>
	</div>
	<!--************************************
			Contact Us End
	*************************************-->
</main>
<!--************************************
		Main End
*************************************-->
@endsection